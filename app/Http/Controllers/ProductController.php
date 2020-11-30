<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index ()
    {
        $products = Product::all();
        $deliveries = Delivery::all();

        return view('product.index', [
            'deliveries' => $deliveries,
            'products' => $products
        ]);
    }


}
