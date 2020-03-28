<?php 
namespace App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {     
	protected $fillable = ['name', 'description'];
	protected $dates = [];
 	public static $rules = [
 		'name' => 'required',
 		'description' => 'required',     
 	];
} 