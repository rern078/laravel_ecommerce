@extends('layouts.app')
@section('content')
@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">
      <div class="pagetitle">
            <h1>Brands</h1>
            <nav>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Brands</a></li>
                        <li class="breadcrumb-item active">Update Brands</li>
                  </ol>
            </nav>
      </div>
      <!-- End Page Title -->
      <section class="section">
            <div class="row">
                  <form class="brands" action="{{ route('updateBrands', ['id' => $brand->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-between">
                              <div class="col-lg-12">
                                    <div class="card">
                                          <div class="card-body">
                                                <h5 class="card-title">Update Brands</h5>
                                                <div class="row mb-3">
                                                      <label for="brand_name" class="col-sm-2 col-form-label">Brand Name <span>*</span></label>
                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="brand_name" value="{{ old('brand_name', $brand->brand_name) }}">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="brand_slug" class="col-sm-2 col-form-label">Brands Slug <span>*</span></label>
                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="brand_slug" id="brand_slug" value="{{ old('brand_slug', $brand->brand_slug) }}" oninput="this.value = this.value.toLowerCase().replace(/\s+/g, '-')" pattern="[a-z0-9-]+" title="Only lowercase letters, numbers, and hyphens are allowed">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="brand_code" class="col-sm-2 col-form-label">Brand Code<span>*</span></label>
                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="brand_code" id="brand_code" value="{{ old('brand_code', $brand->brand_code) }}">
                                                      </div>
                                                </div>
                                               
                                                <div class="row mb-3">
                                                      <label for="brand_description" class="col-sm-2 col-form-label">Brands Description</label>
                                                      <div class="col-sm-10">
                                                            <textarea name="brand_description" id="" class="form-control" cols="30" rows="5" value="{{ old('brand_description', $brand->brand_description) }}"></textarea>
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="brand_image" class="col-sm-2 col-form-label">Brand Image</label>
                                                      <div class="col-sm-10">
                                                            <input class="form-control" type="file" id="formFile" name="brand_image">
                                                            @if($brand->brand_image)
                                                            <img src="{{ asset('storage/' . $brand->brand_image) }}" alt="Current Image" width="100">
                                                            @endif
                                                      </div>
                                                </div>
                                                <div class="mb-3 d-flex justify-content-end">
                                                      <button type="submit" class="btn btn-primary">Submit</button>
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