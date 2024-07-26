@extends('client.layout.app')
@section('title', 'Home')
@section('content') 

<div class="mb-4 mb-xl-5 pt-1 pb-5"></div>

    <section class="grid-banner container mb-3">
      <div class="row">
        <div class="col-md-4">
          <div class="grid-banner__item grid-banner__item_rect grid-banner__item_rect_3 position-relative">
            <div class="background-img" style="background-image: url('https://foot.vn/wp-content/uploads/2020/08/cac-hang-giay-the-thao-noi-tieng-1.jpg');"></div>
            <div class="content_abs content_left d-flex flex-column justify-content-center h-100">
              <h3 class="text-uppercase text-white fs-35 fw-bold mb-3">Converes<br>Shoes</h3>
              <p class="mb-0">
                <a href="http://127.0.0.1:8000/product" class="btn-link default-underline text-uppercase text-white fw-bold fs-base w-auto">Shop Now</a>
              </p>
            </div><!-- /.content_abs content_left d-flex flex-column justify-content-center h-100 -->
          </div>
        </div><!-- /.col-md-4 -->
        <div class="col-md-4">
          <div class="grid-banner__item grid-banner__item_rect grid-banner__item_rect_3 position-relative">
            <div class="background-img" style="background-image: url('https://static.coinpaprika.com/storage/cdn/news/11254663.jpg');"></div>
            <div class="content_abs content_left d-flex flex-column justify-content-center h-100">
              <h3 class="text-uppercase text-white fs-35 fw-bold mb-3">Addias<br>Shoes</h3>
              <p class="mb-0">
                <a href="http://127.0.0.1:8000/product" class="btn-link default-underline text-uppercase text-white fw-bold fs-base w-auto">Shop Now</a>
              </p>
            </div><!-- /.content_abs content_left d-flex flex-column justify-content-center h-100 -->
          </div>
        </div><!-- /.col-md-4 -->
        <div class="col-md-4">
          <div class="grid-banner__item grid-banner__item_rect grid-banner__item_rect_3 position-relative">
            <div class="background-img" style="background-image: url('https://st.quantrimang.com/photos/image/2019/12/23/cac-hang-giay-noi-tieng-tren-toan-the-gioi-1.jpg');"></div>
            <div class="content_abs content_left d-flex flex-column justify-content-center h-100">
              <h3 class="text-uppercase text-white fs-35 fw-bold mb-3">Nike<br>Shoes</h3>
              <p class="mb-0">
                <a href="shop1.html" class="btn-link default-underline text-uppercase text-white fw-bold fs-base w-auto">Shop Now</a>
              </p>
            </div><!-- /.content_abs content_left d-flex flex-column justify-content-center h-100 -->
          </div>
        </div><!-- /.col-md-4 -->
      </div><!-- /.row -->
    </section>
  <section class="products-grid container">
    <h2 class="section-title text-uppercase fs-40 fw-bold text-center mb-2">Most Popular Products</h2>
    <p class="fs-15 mb-2 pb-xl-2 text-secondary text-center">The World's Premium Brands In One Destination.</p>

    <ul class="nav nav-tabs justify-content-center mb-3 mb-xl-4" id="collections-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link nav-link_underscore text-uppercase active" id="collections-tab-1-trigger" data-bs-toggle="tab" href="#collections-tab-1" role="tab" aria-controls="collections-tab-1" aria-selected="true">New Arrivals</a>
      </li>
    </ul>
    <div class="tab-content pt-2" id="collections-tab-content">
    
      <!--san pham noi bat-->
      <div class="tab-pane fade show active" id="collections-tab-1" role="tabpanel" aria-labelledby="collections-tab-1-trigger">
        <div class="row">
          @foreach ($products as $iprd)
          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper border-1 pt-100per">
                <a href="product1_simple.html">
                  @if ($iprd->images()->first())
                    <img loading="lazy" class="pc__img" width="330" height="330" src="{{ $iprd->images()->first()->url }}" alt="Product Image" />
                  @else
                    <img loading="lazy" class="pc__img" width="330" height="330" src="{{ asset('placeholder-image.jpg') }}" alt="No Image" />
                  @endif
                </a>
                <div class="anim_appear-fade position-absolute w-100 h-100 left-0 top-0 d-flex align-items-center justify-content-center bg-white-overlay">
                  <button class="btn btn-square theme-bg-color text-white border-0 text-uppercase me-1 me-md-2 js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">
                    <svg class="d-inline-block" width="14" height="14" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_cart"></use></svg>
                  </button>
                  <button class="btn btn-square theme-bg-color text-white border-0 text-uppercase me-1 me-md-2 js-quick-view" data-bs-toggle="modal" data-bs-target="#quickView" title="Quick view">
                    <svg class="d-inline-block" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><use href="#icon_view"></use></svg>
                  </button>
                </div>
              </div>

              <div class="pc__info position-relative">
                <div class="pc__category text-secondary fw-semi-bold d-flex align-items-center justify-content-between">
                  <span>SHOES</span>
                </div>
                <h6 class="pc__title fw-bold text-uppercase fs-18"><a href="{{ route('client.products.productdetail', $iprd->id) }}">{{ $iprd->name }}</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price theme-color fw-bold fs-18">  ${{ $iprd->price }}</span>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>    
      

      </div><!-- /.tab-pane fade show-->

      <div class="tab-pane fade show" id="collections-tab-2" role="tabpanel" aria-labelledby="collections-tab-2-trigger">
      </div>

      <div class="tab-pane fade show" id="collections-tab-3" role="tabpanel" aria-labelledby="collections-tab-3-trigger">
      </div>
    
    </div>
  </section>


 
  
  <!-- /.aside aside_right -->

  <!-- Quick View -->
  
  {{-- <div class="modal fade" id="quickView" tabindex="-1">
    <div class="modal-dialog quick-view modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="product-single">
          <div class="product-single__media m-0">
            <div class="product-single__image position-relative w-100">
              <div class="swiper-container js-swiper-slider"
                data-settings='{
                  "slidesPerView": 1,
                  "slidesPerGroup": 1,
                  "effect": "none",
                  "loop": false,
                  "navigation": {
                    "nextEl": ".modal-dialog.quick-view .product-single__media .swiper-button-next",
                    "prevEl": ".modal-dialog.quick-view .product-single__media .swiper-button-prev"
                  }
                }'>
                <div class="swiper-wrapper">
                  @foreach ($product->images as $image)
                  <div class="swiper-slide product-single__image-item">
                    @if(file_exists(public_path($image["url"])))
                      <img loading="lazy" class="pc__img"  width="674" height="674" src="/{{ $image["url"] }}" alt="Product Image" />
                    @else
                      <img loading="lazy" class="pc__img"  width="674" height="674" src="{{ asset('placeholder-image.jpg') }}" alt="No Image" />
                    @endif
                  </div>
                  @endforeach
                </div>
                <div class="swiper-button-prev"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_sm" /></svg></div>
                <div class="swiper-button-next"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_sm" /></svg></div>
              </div>
            </div>
          </div>
          <div class="product-single__detail">
            <h1 class="product-single__name">{{ $product->name }}</h1>
            <div class="product-single__price">
              <span class="current-price">${{ $product->price }}</span>
            </div>
            <div class="product-single__short-desc">
              <p>{{ $product->description }}</p>
            </div>
            <form name="addtocart-form" method="post">
              <div class="product-single__swatches">
                <div class="product-swatch text-swatches">
                  <label>Sizes</label>
                  @if (isset($product->details)&&count($product->details) > 0 )
                  <div class="swatch-list">
                    @foreach ($product->details[0]["sizes"] as $size)
                    <input type="radio" name="product_size" value="{{ $size->id }}" id="size{{ $size->id }}">
                    <label class="swatch js-swatch" for="size{{ $size->id }}" data-bs-toggle="tooltip" data-bs-placement="top">
                        Size {{ $size->name }}
                    </label>
                    @endforeach
                  </div>
                  @else
                    <p>Sold</p>
                  @endif
                </div>
              </div>
              <div class="product-single__addtocart">
                <div class="qty-control position-relative">
                  <input type="number" name="quantity" value="1" min="1" class="qty-control__number text-center">
                  <div class="qty-control__reduce">-</div>
                  <div class="qty-control__increase">+</div>
                </div><!-- .qty-control -->
                <button type="submit" class="btn btn-primary btn-addtocart" data-aside="cartDrawer">Add to Cart</button>
              </div>
            </form>
            <div class="product-single__addtolinks">
              <a href="#" class="menu-link menu-link_us-s add-to-wishlist"><svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg><span>Add to Wishlist</span></a>
              <share-button class="share-button">
                <button class="menu-link menu-link_us-s to-share border-0 bg-transparent d-flex align-items-center">
                  <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_sharing" /></svg>
                </button>
                <details id="Details-share-template__main" class="m-1 xl:m-1.5" hidden="">
                  <summary class="btn-solid m-1 xl:m-1.5 pt-3.5 pb-3 px-5">+</summary>
                  <div id="Article-share-template__main" class="share-button__fallback flex items-center absolute top-full left-0 w-full px-2 py-4 bg-container shadow-theme border-t z-10">
                    <div class="field grow mr-4">
                      <label class="field__label sr-only" for="url">Link</label>
                      <input type="text" class="field__input w-full" id="url" value="https://uomo-crystal.myshopify.com/blogs/news/go-to-wellness-tips-for-mental-health" placeholder="Link" onclick="this.select();" readonly="">
                    </div>
                    <button class="share-button__copy no-js-hidden">
                      <svg class="icon icon-clipboard inline-block mr-1" width="11" height="13" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" viewBox="0 0 11 13">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 1a1 1 0 011-1h7a1 1 0 011 1v9a1 1 0 01-1 1V1H2zM1 2a1 1 0 00-1 1v9a1 1 0 001 1h7a1 1 0 001-1V3a1 1 0 00-1-1H1zm0 10V3h7v9H1z" fill="currentColor"></path>
                      </svg>
                      <span class="sr-only">Copy link</span>
                    </button>
                  </div>
                </details>
              </share-button>
              <script src="js/details-disclosure.js" defer="defer"></script>
              <script src="js/share.js" defer="defer"></script>
            </div>
            <div class="product-single__meta-info mb-0">
              <div class="meta-item">
                <label>SKU:</label>
                <span>N/A</span>
              </div>
              <div class="meta-item">
                <label>Categories:</label>
                <span>Casual & Urban Wear, Jackets, Men</span>
              </div>
              <div class="meta-item">
                <label>Tags:</label>
                <span>biker, black, bomber, leather</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-dialog -->
  </div> --}}
  
  <!-- /.quickview position-fixed -->
  
  <!-- Newsletter Popup -->
  <div class="modal fade" id="newsletterPopup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog newsletter-popup modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="row p-0 m-0">
          <div class="col-md-6 p-0 d-none d-md-block">
            <div class="newsletter-popup__bg h-100 w-100">
              <img loading="lazy" src="https://antashop.shop/wp-content/uploads/2022/09/moski-tekaski-copati-1.jpg.webp" class="h-100 w-100 object-fit-cover d-block" alt="">
            </div>
          </div>
          <div class="col-md-6 p-0 d-flex align-items-center">
            <div class="block-newsletter w-100">
              <h3 class="block__title">Sign Up to Our Newsletter</h3>
              <p>Be the first to get the latest news about trends, promotions, and much more!</p>
              <form action="http://127.0.0.1:8000/home" class="footer-newsletter__form position-relative bg-body">
                <input class="form-control border-2" type="email" name="email" placeholder="Your email address">
                <input class="btn-link fw-medium bg-transparent position-absolute top-0 end-0 h-100" type="submit" value="JOIN">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.newsletter-popup position-fixed -->

@endsection