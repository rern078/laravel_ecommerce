@extends('layouts.app')
@section('content')
@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">
      <div class="pagetitle">
            <h1>Product List</h1>
            <nav>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Product</a></li>
                        <li class="breadcrumb-item active">List Products</li>
                  </ol>
            </nav>
      </div>
      <!-- End Page Title -->
      <section class="section">
            <div class="row">
                  <div class="col-lg-12">
                        <div class="card">
                              <div class="card-body">
                                    <h5 class="card-title">List Products</h5>
                                    <table id="datatable" class="table table-striped display nowrap" style="width:100%">
                                          <thead>
                                                <tr>
                                                      <th>Image</th>
                                                      <th>Code</th>
                                                      <th>Name</th>
                                                      <th>Brand</th>
                                                      <th>Category</th>
                                                      <th>Unit</th>
                                                      <th>Price</th>
                                                      <th>Unit Price</th>
                                                      <th>Quantity</th>
                                                      <th>Discount</th>
                                                      <th>Actions</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach($products as $product)
                                                <tr>
                                                      <td>
                                                            <img src="{{ asset('storage/' . $product->product_image) }}" alt="" width="30px" height="30px">
                                                      </td>
                                                      <td>{{ $product->product_code }}</td>
                                                      <td>{{ $product->product_name }}</td>
                                                      <td>{{ $product->brand }}</td>
                                                      <td>{{ $product->category }}</td>
                                                      <td>{{ $product->product_unit }}</td>
                                                      <td>{{ $product->product_price }}</td>
                                                      <td>{{ $product->prodcut_sale_unit }}</td>
                                                      <td>{{ $product->stock }}</td>
                                                      <td>{{ $product->discount }}</td>
                                                      <td>
                                                            <div class="btn-group">
                                                                  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuClickableOutside" data-bs-toggle="dropdown" data-bs-auto-close="inside" aria-expanded="false">
                                                                        Actions
                                                                  </button>
                                                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableOutside">
                                                                        <li class="actions-drop"><a class="dropdown-item" href="#">Product Details</a></li>
                                                                        <li class="actions-drop"><a class="dropdown-item" href="#">Duplicate Product</a></li>
                                                                        <li class="actions-drop"><a class="dropdown-item" href="#">Edit Product</a></li>
                                                                        <li class="actions-drop"><a class="dropdown-item" href="#">View Product</a></li>
                                                                        <li class="actions-drop"><a class="dropdown-item" href="#">Print Barcode</a></li>
                                                                        <li class="actions-drop"><a class="dropdown-item" href="#">Delete Product</a></li>
                                                                  </ul>
                                                            </div>
                                                      </td>
                                                </tr>
                                                @endforeach
                                          </tbody>
                                    </table>
                              </div>
                        </div>
                  </div>
            </div>
      </section>
</main>
@include('layouts.footer')
@endsection