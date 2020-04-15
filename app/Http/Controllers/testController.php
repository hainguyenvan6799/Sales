<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    //
    public function openModal(){
    	return view('tests.modal');
    }
    public function test(){
    	$a = "image1.jpg, image2.jpg";
    	$array = explode(',', $a);
    	var_dump($array);
    }
}
