<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Menu;
use App\Models\DisplayInfo;

class MenuDesignController extends Controller
{
	private $products;
	private $menus;
	private $currentMenu;
    
    public function __construct()
    {
    	xdebug_break();
    	$this->products = Product::all();
    	$this->menus = Menu::all();
    	$this->currentMenu = $this->menus->first()->get();
    }
    public function index()
    {
	    
    	return view('menu_design.index')->withProducts($this->products)->withMenus($this->menus)->withCurrentMenu($this->currentMenu);
    }

    public function productSelected($id)
    {
    	$product = Product::find($id);
        $display = [
        'menu_id' => $this->currentMenu->id,
        'displayable_id' => $id,
        'displayable_type' => 'App\Models\Product',
        'display_name' => $product->name,
        'index_row' => 3,
        'index_column' => 3,
        'number_of_rows' => 4,
        'number_of_columns' =>4];
        $product->displayInfo()->push(new DisplayInfo($display));
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


    }
}
