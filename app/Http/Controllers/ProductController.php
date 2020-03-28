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

	public function index() {
    	return $this->service->getAll();
    }

    public function store(Request $request) {
    	return $this->service->save($request->all());
    }

    public function show($id) {
    	return $this->service->getById($id);
    }
    public function update(Request $request, $id) {
    	return $this->service->update($request->all(), $id);
    }
    public function delete($id) {
    	return $this->service->delete($id);
    }
}