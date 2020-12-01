<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index ()
    {
        return view('products.index', [
            'products' => Product::all(),
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function show (Product $product)
    {
        $deliveries = Delivery::all();
        return view('products.show', [
            'product' => $product,
            'deliveries' => $deliveries,
        ]);
    }

    public function store(Request $request)
    {
        $product = (new Product)->fill($request->all());

        $product->save();

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', [
           'product' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
