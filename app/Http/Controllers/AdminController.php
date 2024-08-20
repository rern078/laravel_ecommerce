<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('layouts.pages.index');
    }

    public function products()
    {
        return view('layouts.pages.add-products');
    }

    public function listProducts()
    {
        $products = Product::select('product_image', 'product_code', 'product_name', 'brand', 'category', 'product_unit', 'product_price', 'prodcut_sale_unit', 'stock', 'discount')->get();
        return view('layouts.pages.list-products', compact('products'));
    }

    public function addProducts(Request $request)
    {
        $validatedData = $request->validate([
            'product_type' => 'required|string|max:50',
            'product_name' => 'required|string|max:200',
            'product_code' => 'required|string|max:20|unique:products',
            'brand' => 'nullable|string|max:50',
            'category' => 'required|string|max:200',
            'sub_category' => 'nullable|string|max:200',
            'product_unit' => 'required|string|max:200',
            'prodcut_sale_unit' => 'nullable|numeric',
            'product_purchase_unit' => 'nullable|numeric',
            'product_weight' => 'nullable|numeric',
            'product_price' => 'required|numeric',
            'discount' => 'required|numeric',
            'stock' => 'required|numeric',
            'alert_stock' => 'nullable|numeric',
            'product_image' => 'nullable|image|max:2048',
            'product_gallery_image.*' => 'nullable|image|max:2048',
            'product_details' => 'nullable|string',
            'product_details_invoice' => 'nullable|string',
            'status' => 'nullable|in:active,inactive,out of stock',
        ]);

        // image store in storage folder

        if ($request->hasFile('product_image')) {
            $validatedData['product_image'] = $request->file('product_image')->store('images/products', 'public');
        }

        if ($request->hasFile('product_gallery_image')) {
            $galleryImages = [];
            foreach ($request->file('product_gallery_image') as $image) {
                $galleryImages[] = $image->store('images/gallery', 'public');
            }
            $validatedData['product_gallery_image'] = json_encode($galleryImages);
        }

        $validatedData['status'] = $request->has('status') ? 'active' : 'inactive';

        Product::create($validatedData);

        return redirect('/list-products')->with('success', 'Product added successfully!');
    }
}
