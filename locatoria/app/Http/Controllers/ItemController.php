<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Notifications\PremiumItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Item;
use App\ItemPhoto;
use App\User;
use App\Reservation;
use App\ItemPremium;
use App\Favorite;
use App\MostViewed;
use App\Comment;
use App\ItemReport;

use DateTime;
use DateInterval;
use DatePeriod;

class ItemController extends Controller
{



     //display user items
    public function index()
    {
        $user_id = Auth::user()->id;
        $items = Item::all()->where('status','1');
        $user = User::find($user_id);
        $user->items()->get();
        return view('items.myitems')->with([
            'items'=>$items,
            'user'=>$user,

        ]);
    }

   //display 3 latest items at home page
    public function showHome(){

            $items = Item::all()->where('status','1')->sortByDesc('created_at')->take(6);

            $mostvieweds = MostViewed::select('item_id', DB::raw('count(*) as total'))->groupBy('item_id')->orderBy('total','DESC')->take(6)->get();
            $id_mostviewed = array();
                foreach ($mostvieweds as $mostviewed){

                    $id_mostviewed[] = $mostviewed->item_id;

                }

            $items_mostvieweds = Item::find($id_mostviewed);


            $perimiums = ItemPremium::all()->where('status','1')->take(4);
            $id_premium = array();
            foreach ($perimiums as $premium ){

            $id_premium[] = $premium->item_id;
            }

            $items_premium = Item::find($id_premium);


            return view('general.home')->with([

                'items_premium' => $items_premium,
                'items' => $items,
                'items_mostvieweds'=>$items_mostvieweds,

            ]);




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(Auth::user()){
            return view('items.create');
        }
        return redirect('/login')->with('error', 'unauthorized page');
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

        // insert to premium

        if($request->premium){
            $item->status = 0;
            $item->save();
            $item_premium = new ItemPremium;
            $item_premium->item_id = $item_id;
            $item_premium->status = 0;
            $item_premium->save();

            $var = $item_premium->id;

            // notify all admins
            Admin::all()->map(function ($admin) use ($var){


                $admin->notify(new PremiumItem($var));

                return $admin;
            });

        }

        return redirect('/items/myitems/'.auth()->user()->id);
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
        $starMoyenne = DB::select("SELECT AVG(rating) total FROM comments where commentable_id =".$id);

            if(Auth::check()){
                $mostviewd = new MostViewed;
                $mostviewd->item_id=$id;
                $mostviewd->user_id=Auth::user()->id;
                $existe=MostViewed::where('user_id',Auth::user()->id)->where('item_id',$id)->count();
                if($existe == 0){
                    $mostviewd->save();
                }
                else{}
            }


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
            // check if this if a user favorite item
           if(Auth::check()){
            $NotFavourite = Favorite::select('*')
            ->where('item_id', '=', $id)
            ->where('user_id', '=', Auth::user()->id)
            ->get()->isEmpty();
               return view('items.show')->with([
                   'comments'=>$item->comments,
                   'starMoyenne' =>$starMoyenne,
                   'item' => $item,
                   'NotFavourite' => $NotFavourite,
                   'item_photos' => $item_photos,
                   'user' => $user,
                   'takendates'=>json_encode($takendates),
               ]);
           }

            return view('items.show')->with([
                'comments'=>$item->comments,
                'item' => $item,
                'starMoyenne' =>$starMoyenne,
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
        $item = Item::find($id);

        // to do

        //Check if post exists before deleting
        /** Check for correct user */

        if(Auth::user()->id !== $item->user_id){
            return redirect('/Item/'.$item->id)->with('error', 'unauthorized page');
        }

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
                $item_photo->photo_path=$path;
                $picture = Image::make(public_path("storage/{$path}"))->resize(500,250);
                $picture->save();
                $item_photo->save();

            }
        }
        //redirect to show items/{id}
        return redirect('/Item/'.$item->id)->with('error', 'unauthorized page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //delete item function
    public function destroy($id)
    {
        $item = Item::find($id);
        $photos = ItemPhoto::Where('item_id', $id);
        $reservation = Reservation::Where('item_id', $id);
        $premium = ItemPremium::Where('item_id', $id);
        $favorites = Favorite::Where('item_id', $id);
        $comments = Comment::Where('commentable_id', $id);
        $most_view = MostViewed::Where('item_id', $id);
        $reported = ItemReport::Where('item_id', $id);
        $photos->delete();
        $reservation->delete();
        $premium->delete();
        $favorites->delete();
        $comments->delete();
        $most_view->delete();
        $reported->delete();
        $item->delete();
        return redirect('/items/myitems/' . auth()->user()->id)->with('success', 'Item deleted');

        }

}
