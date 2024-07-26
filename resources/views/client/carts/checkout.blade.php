@extends('client.layout.app')
@section('title', 'Checkout')
@php
    $subTotal = -session('discount_amount_price') ?? 0;
    if (isset($carts['products'])) {
        foreach ($carts['products'] as $product) {
            $subTotal += $product->product_price * $product->product_quantity +8 ;
        }
    } else {
        $carts['products'] = [];
    }
@endphp
@section('content')
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
        <h2 class="page-title">Shipping and Checkout</h2>
        <div class="checkout-steps">
            <a href="{{ route('client.carts.index') }}" class="checkout-steps__item active">
                <span class="checkout-steps__item-number">01</span>
                <span class="checkout-steps__item-title">
                    <span>Shopping Bag</span>
                    <em>Manage Your Items List</em>
                </span>
            </a>
            <a href="" class="checkout-steps__item active">
                <span class="checkout-steps__item-number">02</span>
                <span class="checkout-steps__item-title">
                    <span>Shipping and Checkout</span>
                    <em>Checkout Your Items List</em>
                </span>
            </a>
            <a style="cursor: pointer;" id="confirmation" class="checkout-steps__item">
                <span class="checkout-steps__item-number">03</span>
                <span class="checkout-steps__item-title">
                    <span>Confirmation</span>
                    <em>Review And Submit Your Order</em>
                </span>
            </a>
        </div>
        <form id="checkout-form" name="checkout-form" action="{{ route('client-orders.store') }}" method="post">
            @csrf
            {{-- hiddened inputs --}}
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="total" value="{{ $subTotal }}" id="total">
            <input type="hidden" name="status" value="Processing">
            <div class="checkout-form">
                <div class="billing-info__wrapper">
                    <h4>BILLING DETAILS</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" name="customer_name"
                                    value="{{ auth()->user()->name }}" id="checkout_company_name" placeholder="">
                                <label for="checkout_company_name">Name</label>
                                @error('customer_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror ()
                            </div>
                        </div>
                        <div class="col-md-12">
                            @component('components.province', [
                                'name' => 'address',
                                'defaultValue' => '',
                                'defautValueDisplay' => 'Country / Region*',
                                'provinces' => $provinces,
                                'label' => 'Country / Region*',
                            ])
                            @endcomponent
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mt-3 mb-3">
                                <input type="text" class="form-control" id="checkout_street_address"
                                    placeholder="Street Address *" name="address-street">
                                <label for="checkout_company_name">Street Address *</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="checkout_phone" placeholder="Phone *"
                                    value="{{ auth()->user()->phone }}" name="customer_phone">
                                <label for="checkout_phone">Phone *</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating my-3">
                                <input type="email" class="form-control" id="checkout_email" placeholder="Your Mail *"
                                    value="{{ auth()->user()->email }}" value="{{ auth()->user()->email }}"
                                    name="customer_email">
                                <label for="checkout_email">Your Mail *</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mt-3">
                            <textarea class="form-control form-control_gray" placeholder="Order Notes (optional)" cols="30" rows="8"
                                name="note"></textarea>
                        </div>
                    </div>
                </div>
                <div class="checkout__totals-wrapper">
                    <div class="sticky-content">
                        <div class="checkout__totals">
                            <h3>Your Order</h3>
                            <table class="checkout-cart-items">
                                <thead>
                                    <tr>
                                        <th>PRODUCT</th>
                                        <th>SUBTOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts['products'] as $index => $product)
                                        <tr>
                                            <td>
                                                {{ $productNames[$index] }} x {{ $product->product_quantity }}
                                            </td>
                                            <td>
                                                ${{ $product->product_price }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="checkout-totals">
                                <tbody>
                                    <tr>
                                        <th>SUBTOTAL</th>
                                        <td>${{ $subTotal }}</td>
                                    </tr>
                                    <tr>
                                        <th>SHIPPING</th>
                                        <td id="shipment_method"></td>
                                    </tr>
                                    <tr>
                                        <th>TOTAL</th>
                                        <td id="total-price">${{ $subTotal }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary btn-checkout">PLACE ORDER</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script>
        $(document).ready(() => {
            document.getElementById("shipment_method").innerText = localStorage.getItem("shipmentMethod");
            // get the totalPrice from localStorage
            document.getElementById("total").value = localStorage.getItem("totalPrice") ?? 0;
            document.getElementById("total-price").innerText = localStorage.getItem("totalPrice") ?? 0;
        })
        $(document).on("click", "#confirmation", e => {
            Swal.fire({
                position: "center",
                icon: "warning",
                title: "Please complete your order information",
                showConfirmButton: true,
                timer: 2000
            })
        })
    </script>
@endsection
