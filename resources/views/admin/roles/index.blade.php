@extends('admin.layout.app')
@section('title','Roles')
<div class="ec-page-wrapper">

    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Role List</h1>
                    <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Role
                    </p>
                </div>
                <div>
                    <a href="{{ route('roles.create') }}"><button type="button" class="btn btn-primary"> Add Role
                    </button></a>
                </div>
            </div>
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="ec-vendor-list card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="responsive-data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>DisplayName</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->display_name }}</td>
                                            <td>
                                                <div class="btn-group mb-1">
                                                    <button type="button"
														class="mdi mdi-pencil dropdown-toggle dropdown-toggle-split"
														data-bs-toggle="dropdown" aria-haspopup="true"
														aria-expanded="false" data-display="static">
													</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                                        <form action="{{ route('roles.destroy', $role->id) }}" id="form-delete{{ $role->id }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a class="dropdown-item delete-item cursor-pointer" data-id="{{ $role->id }}" onclick="event.preventDefault(); confirmDelete().then(() => { document.getElementById('form-delete{{ $role->id }}').submit(); }).catch(() => {});">
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
                                {{ $roles->links('vendor.pagination.simple-bootstrap-5') }} 
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
                    href="https://themeforest.net/user/ashishmaraviya" target="_blank"> Ekka Admin
                    Dashboard</a>. All Rights Reserved.
            </p>
        </div>
    </footer>
</div>
@section('content')

@endsection