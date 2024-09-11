@extends('layouts.app')
@section('content')
@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">
      <div class="pagetitle">
            <h1>Brands List</h1>
            <nav>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Brands</a></li>
                        <li class="breadcrumb-item active">List Brands</li>
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
                                    <h5 class="card-title">List Brands</h5>
                                    <table id="datatable" class="table table-striped display nowrap" style="width:100%">
                                          <thead>
                                                <tr>
                                                      <th>Code</th>
                                                      <th>Image</th>
                                                      <th>Name</th>
                                                      <th>Slug</th>
                                                      <th>Des</th>
                                                      <th>Actions</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach($brands as $brand)
                                                <tr>
                                                      <td>{{ $brand->brand_code }}</td>
                                                      <td>
                                                            <img src="{{ asset('storage/' . $brand->brand_image) }}" alt="" width="30px" height="30px">
                                                      </td>
                                                      <td>{{ $brand->brand_name }}</td>
                                                      <td>{{ $brand->brand_slug }}</td>
                                                      <td>{{ $brand->brand_description }}</td>
                                                      <td>
                                                            <div class="btn-group">
                                                                  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuClickableOutside" data-bs-toggle="dropdown" data-bs-auto-close="inside" aria-expanded="false">
                                                                        Actions
                                                                  </button>
                                                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableOutside">
                                                                        <li class="actions-drop"><a class="dropdown-item" href="{{ route('editBrands', ['id' => $brand->id]) }}">Edit Brands</a></li>
                                                                        <li class="actions-drop"><a class="dropdown-item" href="#">Print Brands</a></li>
                                                                        <form action="{{ route('deleteBrands', ['id' => $brand->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this brands?');">
                                                                              @csrf
                                                                              @method('DELETE')
                                                                              <li class="actions-drop"><button type="submit" class="dropdown-item">Delete Brands</button></li>
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