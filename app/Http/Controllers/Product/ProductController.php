<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\Product\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {
        if (!Gate::allows('product_list')) {
            return abort('401');
        }

        $products = Product::orderBy('name','desc')->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        if (!Gate::allows('product_create')) {
            return abort('401');
        }
        return view('product.create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        $image = $request->file('image');
        $imgName = time().'.'.$data['image']->getClientOriginalExtension();

        $image->move('uploadedImages/', $imgName);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $imgName,
            'price' => $request->price,
        ]);
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        if (!Gate::allows('product_edit')) {
            return abort('401');
        }

        $product = Product::where('id', $id)->first();
        return view('product.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->validated();

        $image = $request->file('image');
        // $imgName = time().'.'.$data['image']->getClientOriginalExtension();
        $imgName = time().'.'.$request->image->getClientOriginalExtension();

        $image->move('uploadedImages/', $imgName);

        $product = Product::where('id', $id)->first();

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $imgName,
            'price' => $request->price,
        ]);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        if (!Gate::allows('product_delete')) {
            return abort('401');
        }

        Product::find($id)->delete();
        return redirect()->route('products.index');
    }
}
