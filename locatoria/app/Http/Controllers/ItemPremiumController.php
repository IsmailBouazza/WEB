<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemPremium;
use App\Item;


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
}
