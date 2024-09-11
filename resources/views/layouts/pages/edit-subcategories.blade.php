@extends('layouts.app')
@section('content')
@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">
      <div class="pagetitle">
            <h1>Sub Categories</h1>
            <nav>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Sub Categories</a></li>
                        <li class="breadcrumb-item active">Add Sub Categories</li>
                  </ol>
            </nav>
      </div>
      <!-- End Page Title -->
      <section class="section">
            <div class="row">
                  <form class="subcategory" action="{{ route('updateSubCategories', ['id' => $subcategory->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-between">
                              <div class="col-lg-12">
                                    <div class="card">
                                          <div class="card-body">
                                                <h5 class="card-title">Add Sub Categories</h5>
                                                <div class="row mb-3">
                                                      <label for="subcategory_name" class="col-sm-2 col-form-label">Sub Category Name <span>*</span></label>
                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="subcategory_name" value="{{ old('subcategory_name', $subcategory->subcategory_name) }}">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="subcategory_slug" class="col-sm-2 col-form-label">Sub Category Slug <span>*</span></label>
                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="subcategory_slug" id="subcategory_slug" value="{{ old('subcategory_slug', $subcategory->subcategory_slug) }}" oninput="this.value = this.value.toLowerCase().replace(/\s+/g, '-')" pattern="[a-z0-9-]+" title="Only lowercase letters, numbers, and hyphens are allowed">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="subcategory_code" class="col-sm-2 col-form-label">Sub Category Code <span>*</span></label>
                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="subcategory_code" id="subcategory_code" value="{{ old('subcategory_code', $subcategory->subcategory_code) }}">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="meta_title" class="col-sm-2 col-form-label">Sub Category Title</label>
                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title', $subcategory->meta_title) }}">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="meta_description" class="col-sm-2 col-form-label">Sub Category Description</label>
                                                      <div class="col-sm-10">
                                                            <textarea name="meta_description" id="" class="form-control" cols="30" rows="5" value="{{ old('meta_description', $subcategory->meta_description) }}"></textarea>
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="meta_keyword" class="col-sm-2 col-form-label">Sub Category Keyword</label>
                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="meta_keyword" value="{{ old('meta_keyword', $subcategory->meta_keyword) }}">
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