@extends('layouts.app')
@section('content')
@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">
      <div class="pagetitle">
            <h1>Categories</h1>
            <nav>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Categories</a></li>
                        <li class="breadcrumb-item active">Update Categories</li>
                  </ol>
            </nav>
      </div>
      <!-- End Page Title -->
      <section class="section">
            <div class="row">
                  <form class="category" action="{{ route('updateCategories', ['id' => $category->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-between">
                              <div class="col-lg-12">
                                    <div class="card">
                                          <div class="card-body">
                                                <h5 class="card-title">Update Categories</h5>
                                                <div class="row mb-3">
                                                      <label for="category_name" class="col-sm-2 col-form-label">Category Name <span>*</span></label>
                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="category_name" value="{{ old('category_name', $category->category_name) }}">
                                                      </div>
                                                </div>
                                                <div class=" row mb-3">
                                                      <label for="category_slug" class="col-sm-2 col-form-label">Category Slug <span>*</span></label>
                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="category_slug" value="{{ old('category_slug', $category->category_slug) }}" oninput="this.value = this.value.toLowerCase().replace(/\s+/g, '-')" pattern="[a-z0-9-]+" title="Only lowercase letters, numbers, and hyphens are allowed">
                                                      </div>
                                                </div>
                                                <div class=" row mb-3">
                                                      <label for="category_image" class="col-sm-2 col-form-label">Category Image</label>
                                                      <div class="col-sm-10">
                                                            <input class="form-control" type="file" id="formFile" name="category_image">
                                                            @if($category->category_image)
                                                            <img src="{{ asset('storage/' . $category->category_image) }}" alt="Current Image" width="100">
                                                            @endif
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="meta_title" class="col-sm-2 col-form-label">Category Title</label>
                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title', $category->meta_title) }}">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="meta_description" class="col-sm-2 col-form-label">Category Description</label>
                                                      <div class="col-sm-10">
                                                            <textarea name="meta_description" id="" class="form-control" cols="30" rows="5">{{ old('meta_description', $category->meta_description) }}</textarea>
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label for="meta_keyword" class="col-sm-2 col-form-label">Category Keyword</label>
                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="meta_keyword" value="{{ old('meta_keyword', $category->meta_keyword) }}">
                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <label class="col-sm-2 col-form-label">Category Author</label>
                                                      <div class="col-sm-10 tt-select">
                                                            <select class="form-select" name="meta_author" aria-label="Default select example">
                                                                  <option value="author1">Author1</option>
                                                                  <option value="author2">Author2</option>
                                                                  <option value="author3">Author3</option>
                                                            </select>
                                                      </div>
                                                </div>



                                                <div class="mb-3 d-flex justify-content-end">
                                                      <button type="submit" class="btn btn-primary">Update Category</button>
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