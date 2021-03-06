<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Notifications\PremiumItem;
use App\ItemPremium;
use App\Item;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;


class ItemPremiumController extends Controller
{
    public function index()
    {
        $perimiums = ItemPremium::all()->where('status','1');
        $id_premium = array();
        foreach ($perimiums as $premium ){

            $id_premium[] = $premium->item_id;

        }

        $items_premium = Item::find($id_premium);
        return view('premiums.index')->with('items_premium',$items_premium);
    }

    //display all premium requests
    public function request(){


        $data = DB::table('item_premia')
                ->join('items', 'items.id', '=', 'item_premia.item_id')
                ->join('users', 'users.id', '=', 'items.user_id')
                ->select('item_premia.status','item_premia.id', 'item_premia.item_id', 'items.title','items.thumbnail_path', 'items.price',
                    'users.name', 'users.email')
                ->get();


        $admin = Auth::guard('admin')->user();


        if ($data->count() > 0){

            $data = $data->map(function ($premium) use ($admin){

                // this is the notification associated with this reservation
                $notification = $admin->notifications()->where('data->premium_id',$premium->id)->first();

                $premium->read = $notification->read() ? true : false;

                $notification->markAsRead();

                return $premium;
            })
                ->sortBy(function($premium){
                    return $premium->read;
                })
                ->values();

        }

            return view('admin/premium', compact('data'));

    }



    //accept premium request
    public function approval($id)
    {
        $premium = ItemPremium::find($id);

        if ($premium->status == 0)
        {
            $premium->status = 1;
            $premium->save();


        } else {

        }
        return redirect()->back()->with('message', 'Request approved');
    }

    //refuse(delete) a premium request
    public function destroy($id){
        $premium = ItemPremium::find($id);
        $premium->delete();
        return redirect()->back();



    }

    // display all premium items for admin
    public function show(){

        $data = DB::table('item_premia')
                ->where('item_premia.status', 1)
                ->join('items', 'items.id', '=', 'item_premia.item_id')
                ->select('item_premia.id', 'item_premia.item_id', 'items.title','items.thumbnail_path', 'items.price',
                'items.dispo_starts', 'items.dispo_ends')
                ->get();
            return view('admin/premiumitems', compact('data'));


}



}
