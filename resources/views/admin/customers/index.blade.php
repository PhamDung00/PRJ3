@extends('admin.layout.app')
@section('title', 'Customers')
@section('content')
    <div style="width: 85vw; padding: 50px;">
        <!-- CONTENT WRAPPER -->
        <div class="ec-content-wrapper">
            <div class="content" style="padding: 0">
                <div class="breadcrumb-wrapper breadcrumb-contacts">
                    <div>
                        <h1>Customer List</h1>
                        <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                            <span><i class="mdi mdi-chevron-right"></i></span>Customer
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('users.create') }}"><button type="button" class="btn btn-primary"> Add
                                Customer</button></a>
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
                        <div class="ec-vendor-list card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="responsive-data-table" class="table">
                                        <thead>
                                            <tr>
                                                <th>Profile</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $iuser)
                                                <tr>
                                                    <td><img src="{{ $iuser->img }}" width="45px" height="45px"
                                                            alt="" /></td>
                                                    <td>{{ $iuser->name }}</td>
                                                    <td>{{ $iuser->email }}</td>
                                                    <td>{{ $iuser->phone }}</td>
                                                    <td>{{ $iuser->role->name }}</td>
                                                    <td>
                                                        <div class="btn-group mb-1">
                                                            <button type="button"
                                                                class="mdi mdi-pencil dropdown-toggle dropdown-toggle-split"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" data-display="static">
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('users.edit', $iuser->id) }}">Edit</a>
                                                                <form action="{{ route('users.destroy', $iuser->id) }}"
                                                                    id="form-delete{{ $iuser->id }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <a class="dropdown-item delete-item cursor-pointer"
                                                                        data-id="{{ $iuser->id }}"
                                                                        onclick="event.preventDefault(); confirmDelete().then(() => { document.getElementById('form-delete{{ $iuser->id }}').submit(); }).catch(() => {});">
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
                                    {{ $users->links('vendor.pagination.simple-bootstrap-5') }}
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
    <script>
        const onSelectImage = e => {
            const n = e.target.value.split("\\").length;
            document.querySelector("#img_name_label").innerText = e.target.value.split("\\")[n - 1];
        }
    </script>
@endsection
