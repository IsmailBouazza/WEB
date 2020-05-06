<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ItemsController extends Controller
{

    public function index(){
        
        return view('items.myitems');
    }

    public function create(){
        return view('items.create');
    }

   
    /*public function store(Request $request)
    {
       $data = $request->validate([
            'category_id' => 'required',
            'title_item' => 'required',
            'description' => 'required',
            'status' => 'required',
            'offre' => 'required',
            'thumbnail_path' => ['required','image'],
        ]);

        auth()->user()->items()->create($data);    

        dd(request()->all());
    
    }*/

    
    public function show($id)
    {
       
    }

  
    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
