<?php 
namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Providers\Services\ProductService;
use Auth;

class ProductController extends Controller  {
	private $service;

	public function __construct(ProductService $service) {
		// $this->middleware('auth');
		$this->middleware('jwt.auth');
		$this->service = $service;
	}

	public function getAll() {
    	$products = $this->service->getAll();
    	return response()->json($products);
    }

    public function store(Request $request) {
    	$this->service->save($request->all());
        return response()->json(['message' => 'Successfull create new product']);
    }
}