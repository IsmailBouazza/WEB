<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Item;
use App\User;  
use Auth;

class ItemCommentController extends Controller
{

    public function store(Request $request){

      
        $this->validate($request,[
            'comment'=>'required',
            'rating'=>'required'
        ]);
        $item_id = $request->item_id;
        $item = Item::find($item_id);
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->rating  = $request->rating;
        $comment->user_id  = Auth::user()->id;
        $item->comments()->save($comment); 
                
        return back()->withMessage('comment created');

        
    }
}
