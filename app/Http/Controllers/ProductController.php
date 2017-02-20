<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\SearchProductRequest;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Department;
use App\Models\Group;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

 
    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
    	if(Session::get('isSearchProduct'))
    	{
            $products = Session::pull('searchResultProducts');
            Session::put('isSearchProduct', false);
    	}
        else
        {
            $this->productRepository->pushCriteria(new RequestCriteria($request));
            $products = $this->productRepository->all();
        }
        
        return view('products.index')
            ->with('products', $products)->withData($this->searchData());
    }
	private function searchData()
	{
		$departments = Department::all()->load('groups');
		$groups = ['0' => 'All'];
		$vendors = Vendor::all()->pluck('name','id');
		return array('departments' => $departments,'groups' => $groups,'vendors' => $vendors);
	}
    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
    	
        $departments = Department::all()->load('groups');
        $groups = $departments->first()->groups->pluck('name','id');
        $vendors = Vendor::all()->pluck('name','id');
        return view('products.create')->withData(['departments' => $departments,'groups' => $groups,'vendors' => $vendors]);
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();
        $product = $this->productRepository->create($input);
		
        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }
        $departments = Department::all()->load('groups');
        $groups = $departments->first()->groups->pluck('name','id');
        $vendors = Vendor::all()->pluck('name','id');
        return view('products.edit')->with('product', $product)->withData(['departments' => $departments,'groups' => $groups,'vendors' => $vendors]);;
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $product = $this->productRepository->update($request->all(), $id);

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }

    public function search(SearchProductRequest $request)
    {
    	//xdebug_break();
        $input = $request->all();
        $attrs = [$input['sale_price_from'],$input['sale_price_to'],$input['bay_price_from'],$input['bay_price_to']];
        $query = 'sale_price >= ? and sale_price <= ? and bay_price >= ? and bay_price <= ? ';
        if($input['dept_id'] > 0)
        {
            $query = $query . 'and dept_id = ? ';
            array_push($attrs ,$input['dept_id']);
        }
        if($input['group_id'] > 0)
        {
        	$query = $query . 'and group_id = ? ';
        	array_push($attrs ,$input['group_id']);
        }
        if($input['vandor_id'] > 0)
        {
        	$query = $query . 'and vandor_id = ? ';
        	array_push($attrs ,$input['vandor_id']);
        }
        if($input['barcode'])
        {
        	$query = $query . 'and barcode like ? ';
        	array_push($attrs ,'%'.$input['barcode'].'%');
        }
        if($input['name'])
        {
        	$query = $query . 'and name like ? ';
        	array_push($attrs ,'%'.$input['name'].'%');
        }

        $products = Product::whereRaw($query,$attrs)->get();
		Session::put('isSearchProduct',true);
		Session::put('searchResultProducts',$products);
        return redirect(route('products.index'));
    }
}
