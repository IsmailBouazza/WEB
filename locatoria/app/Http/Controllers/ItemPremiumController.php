<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemPremiumController extends Controller
{
    public function index()
    {
        return view('premiums.index');
    }
}
