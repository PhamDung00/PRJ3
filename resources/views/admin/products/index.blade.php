@extends('admin.layout.app')
@section('title','Product')
@section('content')
<div style="width: 85vw; padding: 50px;">
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content" style="padding: 0">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Product</h1>
                    <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Product</p>
                </div>
                <div>
                    <a href="{{ route('products.create') }}" class="btn btn-primary"> Add Product</a>
                </div>
            </div>
            
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="responsive-data-table" class="table"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Offer</th>
                                            <th>Purchased</th>
                                            <th>Stock</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($products as $iprd)
                                        <tr>
                                            <td>
                                                @if ($iprd->images()->first())
                                                    <img class="tbl-thumb" src="{{ $iprd->images()->first()->url }}" alt="Product Image" />
                                                @else
                                                    <img class="tbl-thumb" src="{{ asset('placeholder-image.jpg') }}" alt="No Image" />
                                                @endif
                                            </td>
                                            <td>{{ $iprd->name }}</td>
                                            <td>Price: ${{ $iprd->price }}</td>
                                            <td>20% OFF</td>
                                            <td>120</td>
                                            <td>{{ $iprd->quantity}}</td>
                                            <td>ACTIVE</td>
                                            <td>
                                                <div class="btn-group mb-1">
                                                    <button type="button"
														class="mdi mdi-pencil dropdown-toggle dropdown-toggle-split"
														data-bs-toggle="dropdown" aria-haspopup="true"
														aria-expanded="false" data-display="static">
													</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('products.show', $iprd->id) }}">Info</a>
                                                        <a class="dropdown-item" href="{{ route('products.edit', $iprd->id) }}">Edit</a>
                                                        <form action="{{ route('products.destroy', $iprd->id) }}" id="form-delete{{ $iprd->id }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a class="dropdown-item delete-item cursor-pointer" data-id="{{ $iprd->id }}" onclick="event.preventDefault(); confirmDelete().then(() => { document.getElementById('form-delete{{ $iprd->id }}').submit(); }).catch(() => {});">
                                                                Delete
                                                            </a>
                                                        </form>                     
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $products->links('vendor.pagination.simple-bootstrap-5') }} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->


    <!-- Footer -->
    <footer class="footer mt-auto">
        <div class="copyright bg-white">
            <p>
                Copyright &copy; <span id="ec-year"></span><a class="text-primary"
                href="https://themeforest.net/user/ashishmaraviya" target="_blank"> Ekka Admin Dashboard</a>. All Rights Reserved.
              </p>
        </div>
    </footer>

</div> <!-- End Page Wrapper -->


@endsection