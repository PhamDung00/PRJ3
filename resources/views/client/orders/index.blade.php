@extends('client.layout.app')
@section('title', 'Order')
@section('content')
    <link id="ekka-css" href="{{ asset('admin/assets/css/ekka.css') }}" rel="stylesheet" />
    <main>
        <section class="shop-checkout container">
            <div class="ec-content-wrapper">
                <div class="content">
                    <div class="breadcrumb-wrapper breadcrumb-wrapper-2">
                        <h1>Orders</h1>
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
                                            @foreach ($orders as $index => $item)
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->customer_name }}</td>
                                                        <td>{{ $item->customer_email }}</td>
                                                        <td>{{ $item->customer_address }}</td>
                                                        <td>${{ $item->ship }}</td>
                                                        <td>{{ $item->note }}</td>
                                                        <td>{{ $item->payment }}</td>
                                                        <td>{{ $item->status }}</td>
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
                                                                        href="{{ route('orders.show', $item->id) }}">Info</a>
                                                                    @if ($item->status == 'pending')
                                                                        <form
                                                                            action="{{ route('client.orders.cancel', $item->id) }}"
                                                                            id="form-delete{{ $item->id }}"
                                                                            method="post">
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
        </section>
    </main>
    <script>
        $(function() {

            $(document).on("click", ".delete-item", function(e) {
                e.preventDefault();
                let id = $(this).data("id");
                confirmDelete()
                    .then(function() {
                        $(`#form-delete${id}`).submit();
                    })
                    .catch();
            });

        });
    </script>

@endsection
