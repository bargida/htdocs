<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestControllerr extends Controller
{
    //
    public function index (){
        if(isset($_GET['page'])){
         return view('pages2.' . $_GET['page']);
        }else{
         return view('pages2.index');
        }
     }
}
