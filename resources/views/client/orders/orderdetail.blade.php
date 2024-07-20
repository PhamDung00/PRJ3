@extends('client.layout.app')
@section('title', 'Checkout')
@section('content') 
<main>
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container"> 
        
        <div class="order-complete">
          <div class="checkout__totals-wrapper">
            <div class="checkout__totals">
              <h3>Order Details</h3>
              <table class="checkout-cart-items">
                <thead>
                  <tr>
                    <th>PRODUCT</th>
                    <th>SUBTOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      Kirby T-Shirt
                    </td>
                    <td>
                      $29.90
                    </td>
                  </tr>
                </tbody>
              </table>
              <table class="checkout-totals">
                <tbody>
                  <tr>
                    <th>SUBTOTAL</th>
                    <td>$62.40</td>
                  </tr>
                  <tr>
                    <th>SHIPPING</th>
                    <td>Free shipping</td>
                  </tr>
                  <tr>
                    <th>TOTAL</th>
                    <td>$81.40</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        
      </div>
    </section>
</main>
<div class="mb-5 pb-xl-5"></div>
@endsection