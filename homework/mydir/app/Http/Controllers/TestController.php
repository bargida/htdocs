<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public  function loop1($a, $b){
        for($i = 1; $i <= $b; $i++) {
            if($b > 0)
            return view('loop1', compact('a')) ;
        } 
    }
    public  function test($d, $c){
        for ($i = $d; $i <= $c; $i++) {
            return view('test', compact('i')) ;
        }

    }


    public  function get($a, $b, $c){
        
        for ($i = $a; $i < $b; $i--) {
            $c -= 1 ;
            return view('get', compact('a')) ;
        }
    }
    public  function data($n){
        for($i = 1; $i <= 10 ; $i ++) {
            $s = $i * $n ; 
            return view('data', compact('s')) ;
        }
    }

    public  function loop7($a, $b, $c){
        
        for($i = $a ; $i <= $b ; $i ++) {

            $res = ($c + $i) ;
            return view('loop7', compact('res')) ;
        }
    }

    public  function loop8($a, $b, $c){
        
        for($i = $a ; $i <= $b ; $i ++) {

            $res1 = ($c * $i) ;
            return view('loop8', compact('res')) ;
        }
    }

    public  function loop9($m, $n, ){
        
        for($i = 1; $i <= $n ; $i ++) {

            $res2 = $n + pow($i, 2) ;
            return view('loop9', compact('res2')) ;
        }
    }

    public  function loop10($a,){
        for($i = 1; $i <= $a; $i++) {
            $a += (1 / $i) ;
            return view('loop10', compact('a')) ;
        } 
        
    }
    public  function loop11($d, $c){
        for($i = 1; $i <= $d; $i++) {
            $c += pow((2 * $i ), 2 ) ;
            return view('loop10', compact('c')) ;
        } 
        
    }
    public  function loop12($m, ){
        for($i = 1; $i <= $m; $i++) {
            $n = $m * $i ;
            return view('loop10', compact('n')) ;
        } 
        
    }
}