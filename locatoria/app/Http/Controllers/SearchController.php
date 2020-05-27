<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Search;

class SearchController extends Controller
{
    
    public function showResults(Request $request){
        
        $filters = [
            'city'       => $request->input('city'),
            'object'     => $request->input('object'),
            'budget_max' => $request->input('budget_max'),
        ];

        $item = DB::table('items')
                ->join('users','items.user_id','=','users.id')
                ->where(function($query1,$query2,$query3) use ($filters){
                    if($filters['object'])
                    {
                        $query1->where('title','LIKE' ,$filters['object'])
                            //replace orWhereHas with orWhere
                              ->orWhere('description','LIKE',$filters['object']);
                    }
                    if($filters['budget_max'])
                    {
                        $query2->where('price','<', $filters['budget_max']);
                    }
                    if($filters['city'])
                    {
                        $query3->where('city','LIKE',$filters['city']);
                    }
                }) 
                ->get();
        return view('items.search')->with('item', $item);
    }

    public function showItem($id){
         
        $item = Search::find($id);
        //dd($item);
        return view('items.showItem')->with('item',$item);
    }

}
