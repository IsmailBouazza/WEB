<?php

namespace App\Http\Controllers;

use \App\Favorite;
use Auth;
use App\Item;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
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
    
}
