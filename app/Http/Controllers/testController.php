<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class productController extends Controller
{
    public function getEvents(Request $request)
	{
		$Product = new Product();

		$all_Products = $Product->Products();
		//return $all_Products;
		return response()->json($all_Products);
	}
}