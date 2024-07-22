@extends('admin.layout.app')
@section('title', 'Product')
@section('content')
    <div style="width: 85vw; padding: 50px;">

        <!-- CONTENT WRAPPER -->
        <div class="ec-content-wrapper">
            <div class="content">
                <div class="breadcrumb-wrapper breadcrumb-wrapper-2">
                    <h1>New Orders</h1>
                    <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Orders
                    </p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="responsive-data-table" class="table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Customer</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Ship</th>
                                                <th>Note</th>
                                                <th>Payment</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @foreach ($orders as $item)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->customer_name }}</td>
                                                    <td>{{ $item->customer_email }}</td>
                                                    <td>{{ $item->customer_address }}</td>
                                                    <td>${{ $item->ship }}</td>
                                                    <td>{{ $item->note }}</td>
                                                    <td>{{ $item->payment }}</td>
                                                    <td>
                                                        <div class="input-group input-group-static mb-4">
                                                            <select name="status" class="form-control select-status"
                                                                data-action="{{ route('admin.orders.update_status', $item->id) }}">
                                                                @foreach (config('order.status') as $status)
                                                                    <option value="{{ $status }}"
                                                                        {{ $status == $item->status ? 'selected' : '' }}>
                                                                        {{ $status }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                    </td>
                                                    <td>${{ $item->total }}</td>
                                                    <td>
                                                        <div class="btn-group mb-1">
                                                            <button type="button"
                                                                class="mdi mdi-pencil dropdown-toggle dropdown-toggle-split"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" data-display="static">
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin-orders.show', $item->id) }}">Info</a>
                                                                @if ($item->status == 'pending')
                                                                    <form
                                                                        action="{{ route('client.orders.cancel', $item->id) }}"
                                                                        id="form-delete{{ $item->id }}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a class="dropdown-item delete-item cursor-pointer"
                                                                            data-id={{ $item->id }}>
                                                                            Delete
                                                                        </a>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                    {{ $orders->links('vendor.pagination.simple-bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Content -->
        </div> <!-- End Content Wrapper -->
        <script>
            $(function() {
                $(document).on("change", ".select-status", function(e) {
                    e.preventDefault();
                    let url = $(this).data("action");
                    let data = {
                        status: $(this).val(),
                    };
                    $.post(url, data, (res, status) => {
                        console.log(status)
                        if (status == "success")
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "success",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        else Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "error",
                            showConfirmButton: false,
                            timer: 1500,
                            title: "HTTP Status Error: " + status
                        })
                    });
                });
            });
        </script>
    @endsection
