<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetronicController extends Controller
{
    public function index()
    {
    	return view('metronic.index'); 
    }
}
