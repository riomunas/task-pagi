<?php 
namespace App\Providers\Services;

interface ProductService {
	public function getAll();
	public function save($params);
}