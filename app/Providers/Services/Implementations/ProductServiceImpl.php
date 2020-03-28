<?php 
namespace App\Providers\Services\Implementations;

use App\Product;
use App\Providers\Services\ProductService;

class ProductServiceImpl implements ProductService {
	public function getAll() {
		// $rs = app('db')->select("SELECT * FROM products");
		// return $rs;
    	$products = Product::all();
        return response()->json($products);
	}

	public function save($params) {
		Product::create($params);
        return response()->json(['message' => 'Successfull create new product']);
	}

	public function getById($id) {
		$product = Product::find($id);
		return response()->json($product);
	}

    public function update($params, $id) {
    	$product = Product::find($id);
        $product->update($params);
        return response()->json(['message' => 'Successfull update product']);
    }
    
    public function delete($id) {
    	Product::destroy($id);
        return response()->json(['message' => 'Successfull delete product']);
    }
}