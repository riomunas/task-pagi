<?php 
namespace App\Providers\Services\Implementations;

use App\Product;
use App\Providers\Services\ProductService;

class ProductServiceImpl implements ProductService {
	public function getAll() {
		// $rs = app('db')->select("SELECT * FROM products");
		// return $rs;
    	$products = Product::all();
        return $products;
	}

	public function save($params) {
		Product::create($params);
	}
}