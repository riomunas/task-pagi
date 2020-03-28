<?php 
namespace App\Providers\Services;

interface ProductService {
	public function getAll();
	public function save($params);
	public function getById($id);
	public function update($params, $id);
	public function delete($id);
}