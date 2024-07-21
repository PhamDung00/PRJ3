@extends('admin.layout.app')
@section('title','Product')
@section('content')
<div style="width: 85vw; padding: 50px;">
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-wrapper-2">
                <h1>Orders History</h1>
                <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>History
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
                                            <th>Items</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->customer_name }}</td>
                                            <td>{{ $item->customer_email }}</td>
                                            <td>8</td>
                                            <td>{{ $item->payment }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>${{ $item->total }}</td>
                                            <td></td>
                                        <td>
                                            <div class="btn-group mb-1">
                                                <button type="button"
                                                    class="mdi mdi-pencil dropdown-toggle dropdown-toggle-split"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" data-display="static">
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('orders.show', $item->id) }}">Info</a>
                                                    @if ($item->status == 'pending')
                                                    <form action="{{ route('client.orders.cancel', $item->id) }}" id="form-delete{{ $item->id }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a class="dropdown-item delete-item cursor-pointer" data-id={{ $item->id }}>
                                                            Delete
                                                        </a>
                                                    </form>  
                                                    @endif                   
                                                </div>
                                            </div>
                                        </td>   
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->
@endsection