@extends('layouts.app')
@section('content')
@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">
      <div class="pagetitle">
            <h1>Categories List</h1>
            <nav>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Categories</a></li>
                        <li class="breadcrumb-item active">List Categoriess</li>
                  </ol>
            </nav>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
      </div>
      <!-- End Page Title -->
      <section class="section">
            <div class="row">
                  <div class="col-lg-12">
                        <div class="card">
                              <div class="card-body">
                                    <h5 class="card-title">List Categories</h5>
                                    <table id="datatable" class="table table-striped display nowrap" style="width:100%">
                                          <thead>
                                                <tr>
                                                      <th>Image</th>
                                                      <th>Name</th>
                                                      <th>Slug</th>
                                                      <th>Title</th>
                                                      <th>Des</th>
                                                      <th>Keyword</th>
                                                      <th>Author</th>
                                                      <th>Actions</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach($categories as $category)
                                                <tr>
                                                      <td>
                                                            <img src="{{ asset('storage/' . $category->category_image) }}" alt="" width="30px" height="30px">
                                                      </td>
                                                      <td>{{ $category->category_name }}</td>
                                                      <td>{{ $category->category_slug }}</td>
                                                      <td>{{ $category->meta_title }}</td>
                                                      <td>{{ $category->meta_description }}</td>
                                                      <td>{{ $category->meta_keyword }}</td>
                                                      <td>{{ $category->meta_author }}</td>
                                                      <td>
                                                            <div class="btn-group">
                                                                  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuClickableOutside" data-bs-toggle="dropdown" data-bs-auto-close="inside" aria-expanded="false">
                                                                        Actions
                                                                  </button>
                                                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableOutside">
                                                                        <li class="actions-drop"><a class="dropdown-item" href="#">Category Details</a></li>
                                                                        <li class="actions-drop"><a class="dropdown-item" href="#">Duplicate Category</a></li>
                                                                        <li class="actions-drop"><a class="dropdown-item" href="{{ route('editCategory', ['id' => $category->id]) }}">Edit Category</a></li>
                                                                        <li class="actions-drop"><a class="dropdown-item" href="">View Category</a></li>
                                                                        <li class="actions-drop"><a class="dropdown-item" href="#">Print Category</a></li>
                                                                        <!-- <li class="actions-drop"><a class="dropdown-item" href="{{ route('deleteCategory', ['id' => $category->id]) }}">Delete Category</a></li> -->
                                                                        <form action="{{ route('deleteCategory', ['id' => $category->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                                              @csrf
                                                                              @method('DELETE')
                                                                              <li class="actions-drop"><button type="submit" class="dropdown-item">Delete Category</button></li>
                                                                        </form>

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