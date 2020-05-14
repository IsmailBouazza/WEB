<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Item;
use App\ItemPhoto;
use App\User;
use App\Reservation;
use Auth;
use DateTime;
use DateInterval;
use DatePeriod;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //display user items
    public function index()
    {
        $user_id=Auth::user()->id;
        $items = Item::all();
        $user = User::find($user_id);
        $user->items()->get();
        return view('items.myitems')->with([
            'items'=>$items,
            'user'=>$user,

        ]);
    }

   //display 6 latest items at home page
    public function showHome(){

            $items = Item::all()->sortByDesc('created_at')->take(6);
            return view('general.home')->with([
                'items'=>$items,
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // check if is auth
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|max:225',
            'description' => 'required',
            'price' => 'required|numeric',
            'dispo_starts' => 'required|date',
            'dispo_ends' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'category' => 'required'


        ]);
        $item =  new Item;

        $item->user_id=Auth::user()->id;
        $item->title=$request->title;
        $item->description=$request->description;
        $item->price=$request->price;
        $item->category_id=$request->category;
        $item->dispo_starts=$request->dispo_starts;
        $item->dispo_ends=$request->dispo_ends;

        $item->save();

        $item_id=$item->id;
        $id_user=$item->user_id;

        // thumbnail path template (/{user_id}/{item_id}/{item_id}_thumbnail)
        if ($request->file('thumbnail')) {

            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $imageName = $item_id.'_thumbnail'.'.'.$extension;
            $path = $request->file('thumbnail')->storeAs($id_user.'/'.$item_id, $imageName, 'public'); //
            $item->thumbnail_path= $path;
            $thumbnail = Image::make(public_path("storage/{$path}"))->resize(500,250);
            $thumbnail->save();
            $item->save();
        }

        // add images to storage (/{user_id}/{item_id}/)
        // named as {item_id}_image_{i}.png

        if ($request->file('images')) {
            $i = 0;

            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $imageName = $item_id.'_image_'.$i.'_'.time(). '.' . $extension;
                $i++;

                $path=$image->storeAs($id_user.'/'.$item_id, $imageName, 'public');
                $picture = Image::make(public_path("storage/{$path}"))->resize(500,250);
                $picture->save();



                //    $image->move(public_path().'/images/', $imageName);
                $itemphoto = new ItemPhoto;
                $itemphoto->item_id=$item_id;
                $itemphoto->photo_path=$path;
                $itemphoto->save();

            }
        }

        return redirect('/items/myitems/' . auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //to show user item(details)
    public function show($id)
    {
        $item = Item::findOrFail($id);
        $item_photos = ItemPhoto::Where('item_id',$id)->paginate(1);
        $user_id = $item->user_id;
        $user = User::find($user_id);
        $reservations = Reservation::where('item_id',$id)->where('status',1)->get();
        $takendates = array();

        foreach ($reservations as $reservation){

        $begin = new DateTime($reservation->date_start);
        $end = new DateTime($reservation->date_end); // date_end - 1
        $end = $end->modify( '+1 day' );

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval ,$end);

        foreach($daterange as $date){
            $takendates[] = $date->format("Y-m-d");
        }
    }

        //dd($takendates);

        return view('items.show')->with([

            'item' => $item,
            'item_photos' => $item_photos,
            'user' => $user,
            'takendates'=>json_encode($takendates),
        ]);

    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // to do
        //Check if post exists before deleting
        // Check for correct user

        //getting data
        $item = Item::find($id);
        $item_photos_links=app('App\Http\Controllers\ItemPhotoController')->show($id);


        return view('items.edit')->with(['item'=>$item,'item_photos_links'=> $item_photos_links]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'title' => 'required|max:225',
            'description' => 'required',
            'price' => 'required|numeric',
            'dispo_starts' => 'required|date',
            'dispo_ends' => 'required',
            // 'images' => 'required',
            // 'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'category' => 'required'
        ]);


        $item = Item::find($id);

        $item_id=$id;

        $id_user=$item->user_id;

        if($request->hasfile('thumbnail')){
            //deleting the old one
            Storage::disk('public')->delete($item->thumbnail_path);
            //creating the new thumbnail
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $imageName = $item_id.'_thumbnail'.'.'.$extension;

            $path = $request->file('thumbnail')->storeAs($id_user.'/'.$item_id, $imageName, 'public'); //
            $item->thumbnail_path=$path;
        }

        $item->title=$request->title;
        $item->description=$request->description;
        $item->price=$request->price;
        $item->category_id=$request->category;
        $item->dispo_starts=$request->dispo_starts;
        $item->dispo_ends=$request->dispo_ends;

        $item->save();

        // - todo : we have to control the size of the images !
        if ($request->hasfile('images')) {

            // old ones are deleting with ajax
            $i = 0;

            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $imageName = $item_id.'_image_'.$i.'_'.time(). '.' . $extension;
                $i++;

                $path=$image->storeAs($id_user.'/'.$item_id, $imageName, 'public');


                $item_photo = new ItemPhoto;
                $item_photo->item_id=$item_id;
                $item_photo->image_path=$path;
                $item_photo->save();

            }
        }
        //redirect to show items/{id}
        echo 'updated';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $photos = ItemPhoto::Where('item_id', $id);
        $photos->delete();
        $item->delete();

        return redirect('/items/myitems/' . auth()->user()->id)->with('success', 'Item deleted');
    }


}
