<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        return view('products',[
            'products' => Product::all(),
        ]);
    }

  

    public function create()
    {
        return view('product.create');
    }


    public function store(Request $request)
    {
        Product::create($request->all());

        return redirect()->route('products')->with('success', 'Product added successfully');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        return redirect()->route('products')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products')->with('success', 'Product deleted successfully');
    }
}
