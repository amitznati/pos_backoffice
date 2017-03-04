<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Menu;

class MenuDesignController extends Controller
{
    public function index()
    {
    	$products = Product::all();
    	$menus = Menu::all();
    	return view('menu_design.index')->withProducts($products)->withMenus($menus);
    }

    public function selectItem($id)
    {
    	
    }
}
