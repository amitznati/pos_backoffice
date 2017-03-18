<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Menu;
use App\Models\DisplayInfo;
use Illuminate\Http\Request;
use Flash;
use Response;

class MenuDesignController extends Controller
{
	private $products;
	private $menus;
	private $currentMenu;
    
    public function __construct()
    {
    	$this->products = Product::all()->load('group')->load('department');
    	$this->menus = Menu::all();
    	$this->currentMenu = $this->menus[0]->load('containsDisplayInfos');
    }
    public function index()
    {   
    	return view('menu_design.index')->withProducts($this->products)->withMenus($this->menus)->with('currentMenu', $this->currentMenu);
    }

    public function saveMenu(Request $request)
    {
    	xdebug_break();
        //dd($request->all());
        $input = $request->all();
        $menu = Menu::find($input['menu_id']);
        $menu->containsDisplayInfos()->delete();
        $nodes = json_decode($input['nodes'], true);
		foreach($nodes as $node)
		{
			$displayable = new DisplayInfo($node);
			$displayable->menu_id = $input['menu_id'];
			$displayable->save();
		}

        Flash::success('Menu Saved successfully.');

        return 'success';
    }
}
