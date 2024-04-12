<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function form(){
        return view('form');
    }

    public function create(Request $request){

        $name = $request->input('name');
        $quantity = $request->input('quantity');
        $price = $request->input('price');

    }
}
