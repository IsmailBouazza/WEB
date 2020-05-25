<?php

namespace App\Http\Controllers;

use App\ItemReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\User;
use App\ItemPhoto;
use App\ItemPremium;
use App\MostViewed;
use App\Reservation;
use App\Comment;
use App\Favorite;
use DB;

class itemReportController extends Controller
{
    public function report($id,Request $request)
    {
        if(Auth::user()) {
            $report = new ItemReport;
            $report->user_id = Auth::user()->id;
            $report->item_id = $id;
            $report->reason = $request->reason;
            $report->save();
            echo "reported";

        }
    }

    //display reported items
    public function show(){

            $data = DB::table('item_reporteds')
                    ->join('items', 'items.id', '=', 'item_reporteds.item_id')
                    ->join('users', 'users.id', '=', 'items.user_id')
                    ->select('item_reporteds.id', 'item_reporteds.item_id', 'items.title','items.thumbnail_path', 'items.price', 
                    'users.name', 'users.email')
                    ->get();
                return view('admin/reported', compact('data'));
    
        
    }

     //approve report 
     public function approval($id)
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
        return redirect()->back();
     }
 
     //reject a report
     public function destroy($id){

        $reported = ItemReport::find($id);
         $reported->delete();
         return redirect()->back();
 
 
 
     }
 
}
