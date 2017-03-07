<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Menu;
use App\Models\DisplayInfo;
use Illuminate\Http\Request;

class MenuDesignController extends Controller
{
	private $products;
	private $menus;
	private $currentMenu;
    
    public function __construct()
    {
    	$this->products = Product::all();
    	$this->menus = Menu::all();
    	$this->currentMenu = $this->menus[0]->load('containsDisplayInfos');
    }
    public function index()
    {
        //xdebug_break();
        //$this->currentMenu->containsDisplayInfos->push($this->dummyData());
	    
    	return view('menu_design.index')->withProducts($this->products)->withMenus($this->menus)->with('currentMenu', $this->currentMenu);
    }
    
    private function dummyData()
    {
    	$product = new Product();
        $display = [
        'menu_id' => $this->currentMenu->id,
        'displayable_id' => 1,
        'displayable_type' => 'App\Models\Product',
        'display_name' => 'item1',
        'index_row' => 3,
        'index_column' => 3,
        'number_of_rows' => 4,
        'number_of_columns' =>4];
    	$product->displayInfo = new DisplayInfo($display);
        return $display;


    }

    public function saveMenu(Request $request)
    {
        dd($request);
    }
}
