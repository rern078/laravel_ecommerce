@extends('layouts.app')
@section('content')
@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">
      <div class="pagetitle">
            <h1>Sub Categories List</h1>
            <nav>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Sub Categories</a></li>
                        <li class="breadcrumb-item active">List Sub Categoriess</li>
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
                                    <h5 class="card-title">List Sub Categories</h5>
                                    <table id="datatable" class="table table-striped display nowrap" style="width:100%">
                                          <thead>
                                                <tr>
                                                      <th>Code</th>
                                                      <th>Name</th>
                                                      <th>Slug</th>
                                                      <th>Title</th>
                                                      <th>Keyword</th>
                                                      <th>Actions</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach($subcategories as $subcategory)
                                                <tr>
                                                      <td>{{ $subcategory->subcategory_code }}</td>
                                                      <td>{{ $subcategory->subcategory_name }}</td>
                                                      <td>{{ $subcategory->subcategory_slug }}</td>
                                                      <td>{{ $subcategory->meta_title }}</td>
                                                      <td>{{ $subcategory->meta_keyword }}</td>
                                                      <td>
                                                            <div class="btn-group">
                                                                  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuClickableOutside" data-bs-toggle="dropdown" data-bs-auto-close="inside" aria-expanded="false">
                                                                        Actions
                                                                  </button>
                                                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableOutside">
                                                                        <li class="actions-drop"><a class="dropdown-item" href="#">Duplicate Category</a></li>
                                                                        <li class="actions-drop"><a class="dropdown-item" href="{{ route('editSubCategory', ['id' => $subcategory->id]) }}">Edit Sub Category</a></li>
                                                                        <li class="actions-drop"><a class="dropdown-item" href="#">Print Category</a></li>
                                                                        <form action="{{ route('deleteSubCategory', ['id' => $subcategory->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this sub category?');">
                                                                              @csrf
                                                                              @method('DELETE')
                                                                              <li class="actions-drop"><button type="submit" class="dropdown-item">Delete Sub Category</button></li>
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