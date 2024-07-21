@extends('admin.layout.app')

@section('content')
<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
    <div class="content">
        <!-- Top Statistics -->
        <div class="row">
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-1">
                    <div class="card-body">
                        <h2 class="mb-1">{{ $userCount }}</h2>
                        <p>User</p>
                        <span class="mdi mdi-account-arrow-left"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-2">
                    <div class="card-body">
                        <h2 class="mb-1">{{ $categoryCount }}</h2>
                        <p>Category</p>
                        <span class="mdi mdi-account-clock"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-2">
                    <div class="card-body">
                        <h2 class="mb-1">{{ $couponCount }}</h2>
                        <p>Coupon</p>
                        <span class="mdi mdi-account-clock"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-3">
                    <div class="card-body">
                        <h2 class="mb-1">{{ $roleCount }}</h2>
                        <p>Role</p>
                        <span class="mdi mdi-package-variant"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-4">
                    <div class="card-body">
                        <h2 class="mb-1">{{ $productCount }}</h2>
                        <p>Product</p>
                        <span class="mdi mdi-currency-usd"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-4">
                    <div class="card-body">
                        <h2 class="mb-1">{{ $orderCount }}</h2>
                        <p>Order</p>
                        <span class="mdi mdi-currency-usd"></span>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Content -->
</div> <!-- End Content Wrapper -->
@endsection