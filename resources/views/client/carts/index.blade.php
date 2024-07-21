@extends('client.layout.app')
@section('title', 'Cart')
@section('content')
    @if (isset($cart))
        @if (session('message'))
            <h2 class="" style="text-align: center; width:100%; color:red"> {{ session('message') }}</h2>
        @endif
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Cart</h2>
            <div class="checkout-steps">
                <a href="{{ route('client.carts.index') }}" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">01</span>
                    <span class="checkout-steps__item-title">
                        <span>Shopping Bag</span>
                        <em>Manage Your Items List</em>
                    </span>
                </a>
                <a href="{{ route('client.checkout.index') }}" class="checkout-steps__item">
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
            <div class="shopping-cart">
                <div class="cart-table__wrapper">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th></th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cart->products as $item)
                                <tr id="row-{{ $item->id }}">
                                    <td>
                                        <div class="shopping-cart__product-item">
                                            <a href="">
                                                @if ($item->images()->first())
                                                    <img loading="lazy" class="pc__img" width="330" height="330"
                                                        src="{{ $item->images()->first()->url }}" alt="Product Image" />
                                                @else
                                                    <img loading="lazy" class="pc__img" width="330" height="330"
                                                        src="{{ asset('placeholder-image.jpg') }}" alt="No Image" />
                                                @endif
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="shopping-cart__product-item__detail">
                                            <h4><a
                                                    href="{{ route('client.products.productdetail', $item->product->id) }}">{{ $item->product->name }}</a>
                                            </h4>
                                            <ul class="shopping-cart__product-item__options">
                                                <li>Size: {{ $item->product_size }}</li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="shopping-cart__product-price">${{ $item->product->price }}</span>
                                    </td>
                                    <td>
                                        <div class="qty-control position-relative">
                                            <input type="number" name="quantity"
                                                id='productQuantityInput-{{ $item->id }}'
                                                value="{{ $item->product_quantity }}"
                                                class="qty-control__number text-center border-0 p-0">
                                            <div class="qty-control__reduce btn-update-quantity"
                                                data-action="{{ route('client.carts.update_product_quantity', $item->id) }}"
                                                data-id="{{ $item->id }}">-</div>
                                            <div class="qty-control__increase btn-update-quantity"
                                                data-action="{{ route('client.carts.update_product_quantity', $item->id) }}"
                                                data-id="{{ $item->id }}">+</div>
                                        </div><!-- .qty-control -->
                                    </td>
                                    <td>
                                        <span class="shopping-cart__subtotal" id="cartProductPrice{{ $item->id }}">
                                            ${{ $item->product->price * $item->product_quantity }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="#" class="remove-cart"
                                            data-action="{{ route('client.carts.remove_product', $item->id) }}">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                                <path
                                                    d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="cart-table-footer">
                        <form action="{{ route('client.carts.apply_coupon') }}" class="position-relative bg-body"
                            method="POST">
                            @csrf
                            <input class="form-control" type="text" name="coupon_code" placeholder="Coupon Code"
                                value="{{ Session::get('coupon_code') }}">
                            <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4" type="submit"
                                value="APPLY COUPON">
                        </form>
                        <button class="btn btn-light">UPDATE CART</button>
                    </div>
                </div>
                <div class="shopping-cart__totals-wrapper">
                    <div class="sticky-content">
                        <div class="shopping-cart__totals">
                            <h3>Cart Totals</h3>
                            <table class="cart-totals">
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td class="total-price" data-price="{{ $cart->total_price }}">
                                            ${{ $cart->total_price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input form-check-input_fill" type="checkbox"
                                                    value="" id="free_shipping">
                                                <label class="form-check-label" for="free_shipping">Free shipping</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input form-check-input_fill" type="checkbox"
                                                    value="" id="local_pickup">
                                                <label class="form-check-label" for="local_pickup">Express shipping</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        @if (session('discount_amount_price'))
                                            <th>Coupon </th>
                                            <td class="coupon-div" data-price="{{ session('discount_amount_price') }}">
                                                ${{ session('discount_amount_price') }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td class="total-price-all"
                                            data-price="{{ $cart->total_price - session('discount_amount_price') }}"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mobile_fixed-btn_wrapper">
                            <div class="button-wrapper container">
                                <a href='{{ route('client.checkout.index') }}'
                                    class="btn btn-primary btn-checkout">PROCEED
                                    TO CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="mb-5 pb-xl-5"></div>
        <script>
            function confirmDelete() {
                return new Promise((resolve, reject) => {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            resolve(true);
                        } else {
                            reject(false);
                        }
                    });
                });
            }
        </script>
        <script>
            $(document).ready(() => {
                const freeShippingElement = document.getElementById("free_shipping");
                const localPickupElement = document.getElementById("local_pickup");
                freeShippingElement.checked = localStorage.getItem("shipmentMethod") === "Free shipping";
                localPickupElement.checked = localStorage.getItem("shipmentMethod") === "Express shipping";
            })
            const EXPRESS_SHIP_PRICE = 8;
            const discountClientSide = discount => {
                const totalPrice = Number(document.getElementsByClassName("total-price")[0].innerText.replace("$", ""));
                const finalPrice = totalPrice - discount; //price after apply coupon
                $(".total-price-all").text(`$${finalPrice}`);
            }
            $(function() {
                getTotalValue();

                function getTotalValue() {
                    let total = $(".total-price").data("price");
                    let couponPrice = $(".coupon-div")?.data("price") ?? 0;
                    const totalPriceElements = [...document.getElementsByClassName("total-price-all"), ...document
                        .getElementsByClassName("total-price")
                    ];
                    // loop for each element
                    for (let i = 0; i < totalPriceElements.length; i++) {
                        // add total price
                        totalPriceElements[i].textContent = `$${total - couponPrice}`;
                    }
                    // $(".total-price-all").text(`$${total - couponPrice}`);
                }

                $(document).on("click", ".remove-cart", function(e) {
                    let url = $(this).data("action");
                    confirmDelete()
                        .then(function() {
                            $.ajax({
                                url,
                                type: "DELETE",
                                success: (res) => {
                                    let cart = res.cart;
                                    let cartProductId = res.product_cart_id;
                                    $("#productCountCart").text(cart.product_count);
                                    $(".total-price")
                                        .text(`$${cart.total_price}`)
                                        .data("price", cart.product_count);
                                    $(`#row-${cartProductId}`).remove();
                                    getTotalValue();
                                }
                            })
                        })
                        .catch(console.log);
                });
                const TIME_TO_UPDATE = 1000;

                $(document).on(
                    "click",
                    ".btn-update-quantity",
                    _.debounce(function(e) {
                        let url = $(this).data("action");
                        let id = $(this).data("id");
                        var cartProductPrice;
                        let data = {
                            product_quantity: $(`#productQuantityInput-${id}`).val(),
                        };
                        $.post(url, data, (res) => {
                            let cartProductId = res.product_cart_id;
                            let cart = res.cart;
                            $("#productCountCart").text(cart.product_count);
                            if (res.remove_product) {
                                $(`#row-${cartProductId}`).remove();
                            } else {
                                $(`#cartProductPrice${cartProductId}`).html(
                                    `$${res.cart.total_price}`
                                );
                            }
                            getTotalValue();
                            const totalPrice = cart.total_price;
                            $(".total-price").text(`$${totalPrice}`);
                            discountClientSide(document.getElementById("local_pickup").checked ?
                                -EXPRESS_SHIP_PRICE : 0);
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "success",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        });
                    }, TIME_TO_UPDATE)
                );
            });
            $(document).on("change", "#local_pickup", e => {
                const price = Number(document.getElementsByClassName("total-price")[0].innerText.replace("$", ""));
                const totalPriceAllElement = document.getElementsByClassName("total-price-all")[0];
                totalPriceAllElement.innerText = `$${price + (e.target.checked ? EXPRESS_SHIP_PRICE : 0)}`;
                const freeShipElement = document.getElementById("free_shipping");
                if (e.target.checked) {
                    freeShipElement.checked = false;
                    localStorage.setItem("shipmentMethod", "Express shipping");
                }
            })

            $(document).on("change", "#free_shipping", e => {
                const price = Number(document.getElementsByClassName("total-price")[0].innerText.replace("$", ""));
                discountClientSide(0);
                const localPickupElement = document.getElementById("local_pickup");
                if (e.target.checked) {
                    localPickupElement.checked = false;
                    localStorage.setItem("shipmentMethod", "Free shipping");
                }
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
    @else
        <h1 style="text-align: center">Cart is empty</h1>
    @endif
@endsection
