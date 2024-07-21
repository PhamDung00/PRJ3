@extends('admin.layout.app')
@section('title','Category')
@section('content')
<!-- CONTENT WRAPPER -->
<div style="width: 85vw; padding: 50px;">

    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content" style="padding: 0">
            <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
                <div>
                    <h1>Category</h1>
                    <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Category
                    </p>
                </div>    
                <div>
                    <a href="{{ route('categories.create') }}"><button type="button" class="btn btn-primary"> Add Category
                    </button></a>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12">
                    <div class="ec-cat-list card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="responsive-data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Parent Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($categories as $icate)
                                        <tr>
                                            <td>{{ $icate->id }}</td>
                                            <td>{{ $icate->name }}</td>
                                            <td>{{ $icate->parent_name }} </td>
                                            <td><span class="badge badge-success">Top</span></td>
                                            <td>
                                                <div class="btn-group mb-1">
                                                    <button type="button"
														class="mdi mdi-pencil dropdown-toggle dropdown-toggle-split"
														data-bs-toggle="dropdown" aria-haspopup="true"
														aria-expanded="false" data-display="static">
													</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('categories.edit', $icate->id) }}">Edit</a>
                                                        <form action="{{ route('categories.destroy', $icate->id) }}" id="form-delete{{ $icate->id }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a class="dropdown-item delete-item cursor-pointer" data-id="{{ $icate->id }}" onclick="event.preventDefault(); confirmDelete().then(() => { document.getElementById('form-delete{{ $icate->id }}').submit(); }).catch(() => {});">
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
                                {{ $categories->links('vendor.pagination.simple-bootstrap-5') }}
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

</div>
<script>
    const onSelectImage = e=>{
        const n = e.target.value.split("\\").length;
        document.querySelector("#img_name_label").innerText = e.target.value.split("\\")[n-1];
    }
</script>

@endsection