<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function home()
    {
        return view('layouts.pages.index');
    }

    // ******************* Products *****************

    public function products()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        return view('layouts.pages.add-products', compact('categories', 'brands', 'subcategories'));
    }

    public function listProducts()
    {
        $products = Product::all();

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
            'discount' => 'nullable|numeric',
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

    public function editProducts($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $product->product_gallery_image = json_decode($product->product_gallery_image, true);
        return view('/layouts/pages/edit-products', compact('product', 'categories', 'brands', 'subcategories'));
    }

    public function updateProducts(Request $request, $id)
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
            'discount' => 'nullable|numeric',
            'stock' => 'required|numeric',
            'alert_stock' => 'nullable|numeric',
            'product_image' => 'nullable|image|max:2048',
            'product_gallery_image.*' => 'nullable|image|max:2048',
            'product_details' => 'nullable|string',
            'product_details_invoice' => 'nullable|string',
            'status' => 'nullable|in:active,inactive,out of stock',
        ]);

        $product  = Product::findOrFail($id);
        if ($request->hasFile('product_image')) {
            if ($product->product_image && Storage::disk('public')->exists($product->product_image)) {
                Storage::disk('public')->delete($product->product_image);
            }
            $validatedData['product_image'] = $request->file('product_image')->store('images/products', 'public');
        }

        if ($request->hasFile('product_gallery_image')) {
            if ($product->product_gallery_image) {
                $oldGalleryImages = json_decode($product->product_gallery_image, true);
                foreach ($oldGalleryImages as $oldImage) {
                    if (Storage::disk('public')->exists($oldImage)) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }

            $galleryImages = [];
            foreach ($request->file('product_gallery_image') as $image) {
                $galleryImages[] = $image->store('images/gallery', 'public');
            }
            $validatedData['product_gallery_image'] = json_encode($galleryImages);
        }

        if ($request->has('status')) {
            $validatedData['status'] = $request->input('status');
        } else {
            // Optional: Maintain the previous status if no new status is provided
            unset($validatedData['status']);
        }

        $product->update($validatedData);

        return redirect('/list-products')->with('success', 'Product updated successfully!');
    }

    public function deleteProducts($id)
    {
        $product = Product::findOrFail($id);
        // Delete the main product image
        if ($product->product_image && Storage::disk('public')->exists($product->product_image)) {
            Storage::disk('public')->delete($product->product_image);
        }
        // Delete gallery images
        if ($product->product_gallery_image) {
            $galleryImages = json_decode($product->product_gallery_image, true);
            foreach ($galleryImages as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        // Delete the product record
        $product->delete();
        return redirect('/list-products')->with('success', 'Product deleted successfully!');
    }

    // ******************* Category *****************

    public function categories()
    {
        return view('layouts.pages.add-categories');
    }

    public function addCategories(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:50',
            'category_slug' => 'required|string|max:200|regex:/^[a-z0-9-]+$/',
            'category_image' => 'nullable|image|max:2048',
            'meta_title' => 'nullable|string|max:200',
            'meta_description' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
            'meta_author' => 'nullable|string',
            'parent_id' => 'nullable|numeric',
        ]);
        $validatedData['category_slug'] = strtolower(str_replace(' ', '-', $validatedData['category_slug']));

        // image store in storage folder

        if ($request->hasFile('category_image')) {
            $validatedData['category_image'] = $request->file('category_image')->store('images/category', 'public');
        }

        Category::create($validatedData);
        return redirect('/list-categories')->with('success', 'Category added successfully!');
    }

    public function listCategories()
    {
        $categories = Category::all();
        return view('layouts.pages.list-categories', compact('categories'));
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('/layouts/pages/edit-categories', compact('category'));
    }

    public function updateCategories(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:50',
            'category_slug' => 'required|string|max:200|regex:/^[a-z0-9-]+$/',
            'category_image' => 'nullable|image|max:2048',
            'meta_title' => 'nullable|string|max:200',
            'meta_description' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
            'meta_author' => 'nullable|string',
            'parent_id' => 'nullable|numeric',
        ]);

        $validatedData['category_slug'] = strtolower(str_replace(' ', '-', $validatedData['category_slug']));

        $category  = Category::findOrFail($id);
        if ($request->hasFile('category_image')) {
            if ($category->category_image && Storage::disk('public')->exists($category->category_image)) {
                Storage::disk('public')->delete($category->category_image);
            }

            $validatedData['category_image'] = $request->file('category_image')->store('images/category', 'public');
        }

        $category->update($validatedData);

        return redirect('/list-categories')->with('success', 'Category updated successfully!');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        if ($category->category_image && Storage::disk('public')->exists($category->category_image)) {
            Storage::disk('public')->delete($category->category_image);
        }
        $category->delete();
        return redirect('/list-categories')->with('success', 'Category deleted successfully!');
    }

    // ******************* Sub Category *****************

    public function subCategories()
    {
        return view('layouts.pages.add-subcategories');
    }

    public function addSubCategories(Request $request)
    {
        $validatedData = $request->validate([
            'subcategory_name' => 'required|string|max:50',
            'subcategory_slug' => 'required|string|max:200|regex:/^[a-z0-9-]+$/',
            'subcategory_code' => 'required|numeric',
            'meta_title' => 'nullable|string|max:200',
            'meta_description' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
        ]);
        $validatedData['subcategory_slug'] = strtolower(str_replace(' ', '-', $validatedData['subcategory_slug']));
        Subcategory::create($validatedData);
        return redirect('/list-sub-categories')->with('success', 'Sub Category added successfully!');
    }

    public function listSubCategories()
    {
        $subcategories = Subcategory::all();
        return view('layouts.pages.list-subcategories', compact('subcategories'));
    }

    public function editSubCategory($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        return view('/layouts/pages/edit-subcategories', compact('subcategory'));
    }

    public function updateSubCategories(Request $request, $id)
    {
        $validatedData = $request->validate([
            'subcategory_name' => 'required|string|max:50',
            'subcategory_slug' => 'required|string|max:200|regex:/^[a-z0-9-]+$/',
            'subcategory_code' => 'required|numeric',
            'meta_title' => 'nullable|string|max:200',
            'meta_description' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
        ]);
        $validatedData['subcategory_slug'] = strtolower(str_replace(' ', '-', $validatedData['subcategory_slug']));
        $subcategory  = Subcategory::findOrFail($id);
        $subcategory->update($validatedData);
        return redirect('/list-sub-categories')->with('success', 'Sub Category updated successfully!');
    }

    public function deleteSubCategory($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
        return redirect('/list-sub-categories')->with('success', 'Sub Category deleted successfully!');
    }

    // ******************* Brands *****************

    public function brands()
    {
        return view('layouts.pages.add-brands');
    }

    public function addBrands(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|string|max:50',
            'brand_slug' => 'required|string|max:200|regex:/^[a-z0-9-]+$/',
            'brand_code' => 'required|string',
            'brand_description' => 'nullable|string',
            'brand_image' => 'nullable|image|max:2048',
        ]);
        $validatedData['brand_slug'] = strtolower(str_replace(' ', '-', $validatedData['brand_slug']));
        if ($request->hasFile('brand_image')) {
            $validatedData['brand_image'] = $request->file('brand_image')->store('images/brand', 'public');
        }
        Brand::create($validatedData);
        return redirect('/list-brands')->with('success', 'Brand added successfully!');
    }

    public function listBrands()
    {
        $brands = Brand::all();
        return view('layouts.pages.list-brands', compact('brands'));
    }

    public function editBrands($id)
    {
        $brand = Brand::findOrFail($id);
        return view('/layouts/pages/edit-brands', compact('brand'));
    }

    public function updateBrands(Request $request, $id)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|string|max:50',
            'brand_slug' => 'required|string|max:200|regex:/^[a-z0-9-]+$/',
            'brand_code' => 'required|string',
            'brand_description' => 'nullable|string',
            'brand_image' => 'nullable|image|max:2048',
        ]);
        $validatedData['brand_slug'] = strtolower(str_replace(' ', '-', $validatedData['brand_slug']));
        $brand  = Brand::findOrFail($id);
        if ($request->hasFile('brand_image')) {
            if ($brand->brand_image && Storage::disk('public')->exists($brand->brand_image)) {
                Storage::disk('public')->delete($brand->brand_image);
            }

            $validatedData['brand_image'] = $request->file('brand_image')->store('images/brand', 'public');
        }
        $brand->update($validatedData);
        return redirect('/list-brands')->with('success', 'Brand updated successfully!');
    }

    public function deleteBrands($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect('/list-brands')->with('success', 'Brand deleted successfully!');
    }
}
