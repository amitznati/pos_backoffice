<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuDesignController extends Controller
{
    public function index()
    {
    	return view('menu_design.index');
    }
}
