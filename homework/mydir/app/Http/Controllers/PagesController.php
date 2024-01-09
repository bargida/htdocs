<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index (){
       if(isset($_GET['page'])){
        return view('pages.' . $_GET['page']);
       }else{
        return view('pages.index');
       }
    }

    public function form($count){
        return view('form', compact('count'));
    }

    public function forms(Request $request){
        $name1 = $request->nmae1 ;
        $price1 = $request->price1 ;
        $quantity1 = $request->quantity1 ;

        $total1 = ($quantity1 * $price1) ;

        $name2 = $request->nmae2 ;
        $price2 = $request->price2 ;
        $quantity2 = $request->quantity2 ;

        $total2 = ($quantity2 * $price2) ;
        
        $total = $total1 + $total2 ;

        // return "Total:". $total ;
        return "$name1 : $price1 x $quantity1 = ". $total1."<br>"."$name2 : $price2 x $quantity2 = ". $total2."<br>". "<h3> Total = $total</h3>";
    }
}
