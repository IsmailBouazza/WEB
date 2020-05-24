<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addToFavorites(Request $r){
        $faovoriteitem = new Favorite;
        $faovoriteitem->user_id=Auth::user()->id;
        $faovoriteitem->item_id=$r->item_id;
        $check = $faovoriteitem->save();
        return $check;
    }
    /*
     * @ismail
     */
    public function showMyFavorites(){

        if(Auth::user()) {
            $favoritesItems = Favorite::all()->where('user_id',Auth::user()->id);
            $id_favorite = array();
            foreach ($favoritesItems as $favorite ){

                $id_favorite[] = $favorite->item_id;

            }

            $items_favorite = Item::find($id_favorite);
            return view('items.myfavorites')->with('items_favorite',$items_favorite);
        }

    }
    public function destroyfavorite($id){

        $favoritetodelete = Favorite::where('user_id', '=', Auth::user()->id)
         ->where('item_id', '=', $id)->first();
        $favoritetodelete->delete();
        echo "deleted";

    }
}
