@extends('layouts.app')
@section('content')
@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">
      <div class="pagetitle">
            <h1>Product</h1>
            <nav>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Product</a></li>
                        <li class="breadcrumb-item active">Add Products</li>
                  </ol>
            </nav>
      </div>
      <!-- End Page Title -->
      <section class="section">
            <div class="row">
                  <form class="products" action="{{ route('addProducts') }}" method="POST" enctype="multipart/form-data">
                        @if ($errors->any())
                        <div class="alert alert-danger col-lg-8">
                              <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                              </ul>
                        </div>
                        @endif
                        @csrf
                        <div class="d-flex justify-content-between">
                              <div class="col-lg-8">
                                    <div class="card">
                                          <div class="card-body">
                                                <h5 class="card-title">Add Products</h5>
                                                <div class="row mb-3">
                                                      <label class="col-sm-2 col-form-label">Product Type <span>*</span></label>
                                                      <div class="col-sm-10 tt-select">
                                                            <select class="form-select" name="product_type" aria-label="Default select example">
                                                                  <option value="standard">Standard</option>
                                                                  <option value="combo">Combo</option>
                                                                  <option value="service">Service</option>
                                                            </select>
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="product_name" class="col-sm-2 col-form-label">Product Name <span>*</span></label>
                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="product_code" class="col-sm-2 col-form-label">Product Code <span>*</span></label>
                                                      <div class="col-sm-10 randoming">
                                                            {{-- <label class="randam_code"><i class="bi bi-shuffle"></i></label> --}}
                                                            <input type="text" class="form-control product_code" name="product_code" placeholder="Product Code">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label class="col-sm-2 col-form-label">Brand</label>
                                                      <div class="col-sm-10 tt-select">
                                                            <select class="form-select" name="brand" aria-label="Default select example">
                                                                  @foreach($brands as $brand)
                                                                  <option value="{{ $brand->brand_slug }}">
                                                                        {{ $brand->brand_name }}
                                                                  </option>
                                                                  @endforeach
                                                            </select>
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label class="col-sm-2 col-form-label">Category <span>*</span></label>
                                                      <div class="col-sm-10 tt-select">
                                                            <select class="form-select" name="category" aria-label="Default select example">
                                                                  @foreach($categories as $category)
                                                                  <option value="{{ $category->category_slug }}">
                                                                        {{ $category->category_name }}
                                                                  </option>
                                                                  @endforeach
                                                            </select>
                                                      </div>
                                                </div>

                                                <div class="row mb-3">
                                                      <label class="col-sm-2 col-form-label">Sub Category</label>
                                                      <div class="col-sm-10 tt-select">
                                                            <select class="form-select" name="sub_category" aria-label="Default select example">
                                                                  @foreach($subcategories as $subcategory)
                                                                  <option value="{{ $subcategory->subcategory_slug }}">
                                                                        {{ $subcategory->subcategory_name }}
                                                                  </option>
                                                                  @endforeach
                                                            </select>
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label class="col-sm-2 col-form-label">Product Unit <span>*</span></label>
                                                      <div class="col-sm-10 tt-select">
                                                            <select class="form-select" name="product_unit" aria-label="Default select example">
                                                                  <option selected>Select Product Unit</option>
                                                                  <option value="1">Product Unit1</option>
                                                                  <option value="2">Product Unit2</option>
                                                                  <option value="3">Product Unit3</option>
                                                            </select>
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label class="col-sm-2 col-form-label">Product Sale Unit</label>
                                                      <div class="col-sm-10 tt-select">
                                                            <select class="form-select" name="prodcut_sale_unit" aria-label="Default select example">
                                                                  <option selected>Select Product Sale Unit</option>
                                                                  <option value="1">Product Sale Unit1</option>
                                                                  <option value="2">Product Sale Unit2</option>
                                                                  <option value="3">Product Sale Unit3</option>
                                                            </select>
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label class="col-sm-2 col-form-label">Product Purchase Unit <span>*</span></label>
                                                      <div class="col-sm-10 tt-select">
                                                            <select class="form-select" name="product_purchase_unit" aria-label="Default select example">
                                                                  <option selected>Select Product Purchase Unit</option>
                                                                  <option value="1">Product Purchase Unit1</option>
                                                                  <option value="2">Product Purchase Unit2</option>
                                                                  <option value="3">Product Purchase Unit3</option>
                                                            </select>
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label class="col-sm-2 col-form-label">Product Weight <span>*</span></label>
                                                      <div class="col-sm-10 tt-select">
                                                            <select class="form-select" name="product_weight" aria-label="Default select example">
                                                                  <option selected>Select Product Weight</option>
                                                                  <option value="1">Product Weight1</option>
                                                                  <option value="2">Product Weight2</option>
                                                                  <option value="3">Product Weight3</option>
                                                            </select>
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="product_price" class="col-sm-2 col-form-label">Product Price <span>*</span></label>
                                                      <div class="col-sm-10">
                                                            <input type="number" class="form-control" name="product_price" placeholder="Product Price">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="discount" class="col-sm-2 col-form-label">Product Discount</label>
                                                      <div class="col-sm-10">
                                                            <input type="number" class="form-control" name="discount" placeholder="Product Discount">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="stock" class="col-sm-2 col-form-label">Quantity <span>*</span></label>
                                                      <div class="col-sm-10">
                                                            <input type="number" class="form-control" name="stock" placeholder="Quantity">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="alert_stock" class="col-sm-2 col-form-label">Quantity Alert</label>
                                                      <div class="col-sm-10">
                                                            <input type="number" class="form-control" name="alert_stock" placeholder="Quantity Alert">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="product_image" class="col-sm-2 col-form-label">Product Image</label>
                                                      <div class="col-sm-10">
                                                            <input class="form-control" type="file" id="formFile" name="product_image" accept="image/*" onchange="previewImage(event)">
                                                            <img id="imagePreview" src="" alt="Current Image" width="100" style="display:none; margin-top: 10px;">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="product_gallery_image" class="col-sm-2 col-form-label">Product Gallery</label>
                                                      <div class="col-sm-10">
                                                            <input class="form-control" type="file" id="formFile" name="product_gallery_image[]" multiple accept="image/*" onchange="previewImages(event)">
                                                            <img id="imagePreviewContainer" src="" width="100" style=" margin-top: 10px;">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="product_details" class="col-sm-2 col-form-label">Product Description</label>
                                                      <div class="col-sm-10">
                                                            <div class="container">
                                                                  <div class="row">
                                                                        <div class="col-md-12">
                                                                              <div id="editor-container" style="height: 200px;"></div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            <input type="hidden" name="product_details" id="product-description">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="product_details_invoice" class="col-sm-2 col-form-label">Product Description For Invoice</label>
                                                      <div class="col-sm-10">
                                                            <div class="container">
                                                                  <div class="row">
                                                                        <div class="col-md-12">
                                                                              <div id="editor-container-invoice" style="height: 100px;"></div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            <input type="hidden" name="product_details_invoice" id="product-description-invoice">
                                                      </div>
                                                </div>
                                                <div class="mb-3 d-flex justify-content-end">
                                                      <button type="submit" class="btn btn-primary">Submit Form</button>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="px-4 col-lg-4">
                                    <div class="card">
                                          <div class="card-body">
                                                <h5 class="card-title">Product Status</h5>
                                          </div>
                                          <div class="row mb-5">
                                                <div class="col-sm-12">
                                                      <div class="form-check form-switch mx-4 h5">
                                                            <input class="form-check-input" type="checkbox" name="status" id="flexSwitchCheckChecked" value="active" {{ old('status') === 'active' ? 'checked' : '' }}>
                                                            <label class="form-check-label mt-1" for="flexSwitchCheckChecked">Public</label>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </form>
            </div>
      </section>
</main>
@include('layouts.footer')
@endsection