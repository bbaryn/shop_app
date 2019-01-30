<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products', $products));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:1',
            'price' => 'required|min:1',
        ]);

        $product = Product::create(['name' => $request->name, 'description' => $request->description,'price' => $request->price]);
        return redirect('/products/'.$product->id);
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product', $product));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product', $product));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:1',
            'price' => 'required|min:1',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        $request->session()->flash('message', 'Successfully modified data!');
        return redirect('products');
    }

    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        $request->session()->flash('message', 'Successfully deleted data!');
        return redirect('products');
    }
}
