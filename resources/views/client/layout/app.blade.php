@php
    $subTotal = -session('discount_amount_price') ?? 0;
    if (isset($GLOBAL_CART['products'])) {
        foreach ($GLOBAL_CART['products'] as $product) {
            $subTotal += $product->product_price * $product->product_quantity;
        }
    } else {
        $GLOBAL_CART['products'] = [];
    }
@endphp
<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="flexkit">

    <link rel="shortcut icon" href="https://uomo-html.flexkitux.com/images/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com/">

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('client/css/plugins/swiper.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}" type="text/css">
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
  <![endif]-->

    <!-- Document Title -->
    <title>Shoe Shop</title>

</head>

<body>
    <svg class="d-flex">

        @component('components.icons.search')
        @endcomponent
        @component('components.icons.user')
        @endcomponent
        @component('components.icons.cart')
        @endcomponent

        <symbol id="icon_close" viewBox="0 0 12 12">
            <path d="M0.311322 10.6261L10.9374 0L12 1.06261L1.37393 11.6887L0.311322 10.6261Z" fill="currentColor" />
            <path d="M1.06261 0.106781L11.6887 10.7329L10.6261 11.7955L0 1.16939L1.06261 0.106781Z"
                fill="currentColor" />
        </symbol>
        <symbol id="icon_view" viewBox="0 0 18 18">
            <path
                d="M17.6785 8.58827C17.5212 8.38709 13.7733 3.6604 9.00022 3.6604C4.22675 3.6604 0.478773 8.38709 0.321484 8.58827L0 8.99976L0.321484 9.41125C0.478773 9.61243 4.22675 14.3393 9.00022 14.3393C13.7733 14.3393 17.5212 9.61243 17.6785 9.41125L18 8.99976L17.6785 8.58827ZM9.00022 13.0028C5.64324 13.0028 2.71312 10.0963 1.72773 8.99998C2.71357 7.90341 5.64346 4.99736 9.00022 4.99736C12.3568 4.99736 15.2869 7.90364 16.2725 8.99998C15.2864 10.0965 12.3565 13.0028 9.00022 13.0028Z"
                fill="currentColor" />
            <path
                d="M9.00007 5.34314C6.98339 5.34314 5.34277 6.98353 5.34277 8.99999C5.34277 11.0169 6.98339 12.6575 9.00007 12.6575C11.0168 12.6575 12.6574 11.0169 12.6574 8.99999C12.6574 6.98353 11.0168 5.34314 9.00007 5.34314ZM9.00007 11.3206C7.72038 11.3206 6.67951 10.2795 6.67951 8.99977C6.67951 7.72052 7.72038 6.67965 9.00007 6.67965C10.2796 6.67965 11.3206 7.72052 11.3206 8.99977C11.3206 10.2795 10.2796 11.3206 9.00007 11.3206Z"
                fill="currentColor" />
        </symbol>
        <symbol id="icon_gift" viewBox="0 0 45 45">
            <g clip-path="url(#clip0_103_552)">
                <path
                    d="M42.3288 13.1443L40.0744 6.95021C39.3286 4.90095 37.0545 3.84037 35.0053 4.58648L30.8603 6.09521C30.867 6.05469 30.8739 6.01417 30.8797 5.9733C31.1516 4.06194 30.3512 2.21668 28.7391 1.03736C27.2149 -0.0777035 25.2643 -0.309207 23.5216 0.417824C21.7787 1.14494 20.5711 2.69393 20.2922 4.55501L19.7 8.37447L16.6377 5.66753C15.2227 4.41676 13.302 4.00613 11.4996 4.56969C7.53123 5.80983 6.44534 10.8941 9.52248 13.6558C9.57777 13.7054 9.63419 13.7532 9.69115 13.8003L5.27359 15.4082C3.21985 16.1557 2.16217 18.423 2.90995 20.4772L5.16443 26.6713L7.97183 25.6558V41.0451C7.97183 43.2258 9.72841 45.0001 11.9092 45.0001C12.2951 45.0001 37.4585 45.0001 38.2757 45.0001C40.4565 45.0001 42.2307 43.2259 42.2307 41.0451V21.0944C41.3836 21.0944 20.4865 21.0944 20.4865 21.0944L42.3288 13.1443ZM35.9071 7.06411C36.59 6.81556 37.3482 7.16897 37.5967 7.85205L38.9495 11.5685L26.5613 16.0775L24.7578 11.1222L35.9071 7.06411ZM22.8987 4.95228C23.0405 4.00534 23.6529 3.21995 24.5366 2.85125C25.4121 2.48598 26.4021 2.5947 27.1823 3.16537C28.9536 4.46123 28.5289 6.94353 26.5088 7.67908C26.1701 7.80231 23.9626 8.60589 23.8559 8.64465L22.2347 9.23466L22.8987 4.95228ZM22.28 12.024L24.0835 16.9791C23.217 17.2946 22.4724 17.5655 21.6059 17.881L19.8023 12.9257L22.28 12.024ZM12.2859 7.08609C13.1885 6.80413 14.1647 7.00048 14.8914 7.64278L18.3086 10.6636C17.3172 11.0245 14.9729 11.8777 14.0221 12.2236C13.065 12.5718 12.0413 12.3736 11.2835 11.6933C9.69774 10.2702 10.3022 7.70607 12.2859 7.08609ZM6.74013 23.2918L5.38741 19.5753C5.13815 18.8909 5.4905 18.1348 6.17535 17.8855L17.3247 13.8275L19.1282 18.7827L6.74013 23.2918ZM29.0473 23.7311H39.6115V41.0451C39.6115 41.772 39.0025 42.3634 38.2756 42.3634H29.0473V23.7311ZM23.774 23.7311H26.4282V42.3634H23.774V23.7311ZM21.1549 23.7311V42.3634H11.9091C11.1821 42.3634 10.5907 41.7719 10.5907 41.045V24.6961L13.242 23.7311H21.1549Z"
                    fill="currentColor" />
            </g>
            <defs>
                <clipPath id="clip0_103_552">
                    <rect width="45" height="45" fill="white" />
                </clipPath>
            </defs>
        </symbol>
        <symbol id="icon_degree" viewBox="0 0 40 30">
            <path
                d="M25.1785 26.2222C24.5971 26.2222 24.0926 25.7901 24.0173 25.1984C23.9358 24.5563 24.3899 23.9697 25.0317 23.8879C28.7347 23.4161 32.0507 22.4127 34.3688 21.062C36.4889 19.8269 37.6562 18.3749 37.6562 16.9736C37.6562 15.4291 36.2902 14.1653 35.144 13.3767C34.6109 13.0099 34.476 12.2806 34.8428 11.7471C35.2096 11.214 35.9393 11.0791 36.4724 11.4459C38.7802 13.0334 40 14.9447 40 16.9739C40 19.2767 38.461 21.3907 35.549 23.0871C32.9278 24.6142 29.3936 25.6952 25.328 26.2131C25.2776 26.2192 25.2276 26.2222 25.1785 26.2222Z"
                fill="currentColor" />
            <path
                d="M19.7144 24.5435L16.5894 21.4185C16.1316 20.9607 15.3897 20.9607 14.932 21.4185C14.4745 21.8759 14.4745 22.6181 14.932 23.0756L15.8451 23.9887C12.3441 23.627 9.16353 22.8119 6.70076 21.6275C3.93189 20.296 2.34375 18.5996 2.34375 16.9736C2.34375 15.5945 3.48084 14.1611 5.54536 12.9373C6.1023 12.6074 6.28602 11.8884 5.95613 11.3318C5.62592 10.7749 4.90693 10.5911 4.35029 10.921C0.754701 13.0524 0 15.3888 0 16.9736C0 19.5737 2.01905 21.9767 5.68513 23.74C8.53059 25.1081 12.2113 26.0245 16.2213 26.3791L14.932 27.6685C14.4745 28.126 14.4745 28.8681 14.932 29.3259C15.1609 29.5545 15.4608 29.6689 15.7608 29.6689C16.0605 29.6689 16.3605 29.5545 16.5894 29.3259L19.7144 26.2009C20.1718 25.7431 20.1718 25.0009 19.7144 24.5435Z"
                fill="currentColor" />
            <path
                d="M12.2756 14.6268V14.3448C12.2756 13.3502 11.6668 13.1574 10.8504 13.1574C10.3456 13.1574 10.1824 12.7121 10.1824 12.2669C10.1824 11.8213 10.3456 11.3761 10.8504 11.3761C11.4144 11.3761 12.0082 11.3019 12.0082 10.0995C12.0082 9.23861 11.5184 9.03078 10.9096 9.03078C10.1824 9.03078 9.81128 9.209 9.81128 9.78792C9.81128 10.2924 9.5885 10.6339 8.7276 10.6339C7.65887 10.6339 7.52551 10.4111 7.52551 9.69851C7.52551 8.54097 8.35651 7.04164 10.9096 7.04164C12.795 7.04164 14.2199 7.72432 14.2199 9.72841C14.2199 10.8118 13.8192 11.8213 13.077 12.1628C13.9528 12.4893 14.591 13.1424 14.591 14.3448V14.6268C14.591 17.0612 12.9137 17.9816 10.8355 17.9816C8.28235 17.9816 7.30273 16.4231 7.30273 15.1761C7.30273 14.5081 7.58472 14.3299 8.40106 14.3299C9.35108 14.3299 9.5885 14.5377 9.5885 15.102C9.5885 15.7996 10.2419 15.9629 10.9096 15.9629C11.9191 15.9629 12.2756 15.5918 12.2756 14.6268Z"
                fill="currentColor" />
            <path
                d="M23.5991 14.3448V14.4785C23.5991 17.0316 22.0106 17.9816 19.9623 17.9816C17.9139 17.9816 16.3105 17.0316 16.3105 14.4785V10.5448C16.3105 7.99165 17.9582 7.04164 20.096 7.04164C22.6045 7.04164 23.5991 8.60018 23.5991 9.83217C23.5991 10.5448 23.2576 10.7672 22.5154 10.7672C21.8773 10.7672 21.313 10.604 21.313 9.92128C21.313 9.35732 20.7194 9.06038 20.0218 9.06038C19.1459 9.06038 18.6262 9.52059 18.6262 10.5448V11.8805C19.1014 11.3611 19.7694 11.2274 20.482 11.2274C22.1739 11.2274 23.5991 11.9696 23.5991 14.3448ZM18.6262 14.6418C18.6262 15.6659 19.131 16.1112 19.9623 16.1112C20.7936 16.1112 21.2834 15.6659 21.2834 14.6418V14.5081C21.2834 13.4244 20.7936 13.0088 19.9473 13.0088C19.1459 13.0088 18.6262 13.3948 18.6262 14.3744V14.6418Z"
                fill="currentColor" />
            <path
                d="M25.3926 14.4785V10.5448C25.3926 7.99165 26.9807 7.04164 29.0294 7.04164C31.0777 7.04164 32.6808 7.99165 32.6808 10.5448V14.4785C32.6808 17.0316 31.0777 17.9816 29.0294 17.9816C26.9807 17.9816 25.3926 17.0316 25.3926 14.4785ZM30.3651 10.5448C30.3651 9.52059 29.8607 9.06038 29.0294 9.06038C28.1981 9.06038 27.7083 9.52059 27.7083 10.5448V14.4785C27.7083 15.5027 28.1981 15.9629 29.0294 15.9629C29.8607 15.9629 30.3651 15.5027 30.3651 14.4785V10.5448Z"
                fill="currentColor" />
            <path
                d="M35.5 7.03126C33.5612 7.03126 31.9844 5.45411 31.9844 3.51563C31.9844 1.57715 33.5612 0 35.5 0C37.4385 0 39.0156 1.57715 39.0156 3.51563C39.0156 5.45411 37.4385 7.03126 35.5 7.03126ZM35.5 2.34375C34.8536 2.34375 34.3281 2.86957 34.3281 3.51563C34.3281 4.16199 34.8536 4.68751 35.5 4.68751C36.1461 4.68751 36.6719 4.16199 36.6719 3.51563C36.6719 2.86957 36.1461 2.34375 35.5 2.34375Z"
                fill="currentColor" />
        </symbol>
        <symbol id="icon_play" viewBox="0 0 16 20">
            <path
                d="M15.4465 9.04281C15.4206 8.99101 15.3947 8.9651 15.3688 8.9392C15.317 8.86149 15.2652 8.80968 15.1875 8.73197C15.1098 8.65426 15.0062 8.57655 14.9285 8.52474L8.99656 4.43198L3.03874 0.313318C2.65019 0.0283787 2.15802 -0.0493319 1.71766 0.0283788C1.2773 0.106089 0.862847 0.365125 0.603811 0.753678C0.500197 0.909099 0.422487 1.06452 0.370679 1.21994C0.318872 1.34946 0.292969 1.47898 0.292969 1.6344C0.292969 1.6603 0.292969 1.71211 0.292969 1.73801V10.0012V18.2386C0.292969 18.7307 0.500197 19.1711 0.81104 19.4819C1.09598 19.7928 1.53634 20 2.02851 20C2.23573 20 2.44296 19.9741 2.62429 19.8964C2.80561 19.8446 2.96103 19.741 3.11646 19.6115L8.99656 15.5446L14.9026 11.4518C14.9285 11.4259 14.9803 11.4 15.0062 11.3741C15.3688 11.0892 15.602 10.7006 15.6797 10.2862C15.7574 9.87173 15.6797 9.40546 15.4465 9.04281ZM14.1514 10.3639L8.19355 14.4826L2.33935 18.5235C2.31345 18.5235 2.28754 18.5494 2.28754 18.5494C2.26164 18.5753 2.20983 18.6012 2.15802 18.6271C2.10622 18.653 2.08031 18.653 2.02851 18.653C1.92489 18.653 1.82128 18.6012 1.74357 18.5494C1.66586 18.4717 1.63995 18.3681 1.63995 18.2645V10.0012H1.61405V1.84163C1.61405 1.81572 1.61405 1.78982 1.61405 1.76392V1.73801C1.61405 1.71211 1.61405 1.68621 1.63995 1.6603C1.63995 1.6344 1.66586 1.6085 1.66586 1.58259C1.69176 1.55669 1.69176 1.55669 1.69176 1.53078C1.74357 1.45307 1.84718 1.40127 1.92489 1.40127C2.02851 1.37536 2.10622 1.40127 2.20983 1.45307C2.23573 1.47898 2.26164 1.47898 2.28754 1.50488L8.19355 5.59764L14.1255 9.6904C14.1514 9.71631 14.1773 9.71631 14.1773 9.74221C14.2032 9.76811 14.2032 9.79402 14.2291 9.79402C14.2809 9.89763 14.3068 10.0012 14.3068 10.1049C14.2809 10.2085 14.2291 10.3121 14.1514 10.3639Z"
                fill="currentColor" />
        </symbol>
        <symbol id="icon_pause" viewBox="0 0 14 22">
            <path
                d="M1 20.7391V1.26087C1 1.1168 1.1168 1 1.26087 1C1.40494 1 1.52174 1.1168 1.52174 1.26087V20.7391C1.52174 20.8832 1.40494 21 1.26087 21C1.1168 21 1 20.8832 1 20.7391Z"
                stroke="currentColor" />
            <path
                d="M12.4785 20.7391V1.26087C12.4785 1.1168 12.5953 1 12.7394 1C12.8835 1 13.0003 1.1168 13.0003 1.26087V20.7391C13.0003 20.8832 12.8835 21 12.7394 21C12.5953 21 12.4785 20.8832 12.4785 20.7391Z"
                stroke="currentColor" />
        </symbol>
        <symbol id="icon_zoom" viewBox="0 0 16 16">
            <path
                d="M11.0769 0V1.23077H12.6769C13.2374 1.23215 13.7909 1.10588 14.2954 0.861538L14.3692 0.824615L0.830769 14.3631V14.3262C1.08665 13.8223 1.2235 13.2665 1.23077 12.7015V11.0769H0V16H4.92308V14.7692H3.29846C2.75388 14.7685 2.21592 14.8883 1.72308 15.12L1.65538 15.1508L15.1938 1.61231V1.67385C14.9257 2.183 14.7803 2.74777 14.7692 3.32308V4.92308H16V0H11.0769Z"
                fill="currentColor" />
            <path
                d="M7.13846 6.33231L1.66154 0.855385H1.69846C2.19308 1.09735 2.73554 1.22558 3.28615 1.23077H4.92308V0H0V4.92308H1.23077V3.28615C1.23065 2.74827 1.11308 2.21692 0.886154 1.72923L0.855385 1.66154L6.33231 7.13846L7.13846 6.33231Z"
                fill="currentColor" />
            <path
                d="M14.7692 11.0769V12.72C14.7693 13.2579 14.8869 13.7893 15.1138 14.2769L15.1384 14.3262L9.66767 8.85541L8.86151 9.66156L14.3323 15.1323H14.283C13.7949 14.8982 13.2613 14.7742 12.72 14.7693H11.0769V16H16V11.0769H14.7692Z"
                fill="currentColor" />
        </symbol>
        <symbol id="icon_down" viewBox="0 0 12 8">
            <path
                d="M5.57201 7.11914C5.8052 7.35233 6.1948 7.35233 6.42858 7.11914L11.8229 1.73867C12.059 1.50249 12.059 1.11947 11.8229 0.88389C11.5867 0.647712 11.2031 0.647712 10.9669 0.88389L6.00002 5.83696L1.03375 0.883291C0.796978 0.647112 0.413959 0.647112 0.177183 0.883291C-0.0589957 1.11947 -0.0589957 1.50249 0.177183 1.73807L5.57201 7.11914Z"
                fill="currentColor" />
        </symbol>
    </svg>

    <!-- Header Type 1 -->
    <header id="header" class="header header_sticky">
        <div class="container">
            <div class="header-desk header-desk_type_1">
                <div class="logo">
                    <a href="index.html">
                        <img src="../images/logo.png" alt="Uomo" class="logo__image d-block">
                    </a>
                </div><!-- /.logo -->
                @include('client.layout.topbar')<!-- /.navigation -->

                <div class="header-tools d-flex align-items-center">
                    <div class="header-tools__item hover-container">
                        <div class="js-hover__open position-relative">
                            <a class="js-search-popup search-field__actor" href="#">
                                <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <use href="#icon_search" />
                                </svg>
                                <i class="btn-icon btn-close-lg"></i>
                            </a>
                        </div>

                        <div class="search-popup js-hidden-content">
                            <form action="https://uomo-html.flexkitux.com/Demo16/search_result.html" method="GET"
                                class="search-field container">
                                <p class="text-uppercase text-secondary fw-medium mb-4">What are you looking for?</p>
                                <div class="position-relative">
                                    <input class="search-field__input search-popup__input w-100 fw-medium"
                                        type="text" name="search-keyword" placeholder="Search products">
                                    <button class="btn-icon search-popup__submit" type="submit">
                                        <svg class="d-block" width="20" height="20" viewBox="0 0 20 20"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_search" />
                                        </svg>
                                    </button>
                                    <button class="btn-icon btn-close-lg search-popup__reset" type="reset"></button>
                                </div>

                                <div class="search-popup__results">
                                    <div class="sub-menu search-suggestion">
                                        <h6 class="sub-menu__title fs-base">Quicklinks</h6>
                                        <ul class="sub-menu__list list-unstyled">
                                            <li class="sub-menu__item"><a href="shop2.html"
                                                    class="menu-link menu-link_us-s">New Arrivals</a></li>
                                            <li class="sub-menu__item"><a href="#"
                                                    class="menu-link menu-link_us-s">Dresses</a></li>
                                            <li class="sub-menu__item"><a href="shop3.html"
                                                    class="menu-link menu-link_us-s">Accessories</a></li>
                                            <li class="sub-menu__item"><a href="#"
                                                    class="menu-link menu-link_us-s">Footwear</a></li>
                                            <li class="sub-menu__item"><a href="#"
                                                    class="menu-link menu-link_us-s">Sweatshirt</a></li>
                                        </ul>
                                    </div>

                                    <div class="search-result row row-cols-5"></div>
                                </div>
                            </form><!-- /.header-search -->
                        </div><!-- /.search-popup -->
                    </div><!-- /.header-tools__item hover-container -->

                    <div class="header-tools__item hover-container">
                        <a class="header-tools__item js-open-aside" href="#" data-aside="customerForms">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_user" />
                            </svg>
                        </a>
                    </div>

                    <a href="#" class="header-tools__item header-tools__cart js-open-aside"
                        data-aside="cartDrawer">
                        <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_cart" />
                        </svg>
                        <span class="cart-amount d-block position-absolute js-cart-items-count"
                            id="productCountCart">{{ $countProductInCart }}</span>
                    </a>

                    <a class="header-tools__item" href="account_wishlist.html">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_heart" />
                        </svg>
                    </a>
                </div><!-- /.header__tools -->
            </div><!-- /.header-desk header-desk_type_1 -->
        </div><!-- /.container -->
    </header>
    <!-- End Header Type 2 -->

    <main><!-- /.slideshow -->


        <div class="mb-3 mb-xl-5 pb-3 pt-1 pb-xl-5"></div>

        @yield('content')
        <!-- Cart Drawer -->
        <div class="aside aside_right overflow-hidden cart-drawer" id="cartDrawer">
            <div class="aside-header d-flex align-items-center">
                <h3 class="text-uppercase fs-6 mb-0">SHOPPING BAG ( <span
                        class="cart-amount js-cart-items-count">1</span> ) </h3>
                <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
            </div><!-- /.aside-header -->

            <div class="aside-content cart-drawer-items-list">
                @foreach ($GLOBAL_CART['products'] as $index => $product)
                    <div class="cart-drawer-item d-flex position-relative">
                        <div class="position-relative">
                            <a href="{{ route('client.products.productdetail', $product->id) }}">
                                <img loading="lazy" class="cart-drawer-item__img" src="../images/cart-item-1.jpg"
                                    alt="">
                            </a>
                        </div>
                        <div class="cart-drawer-item__info flex-grow-1">
                            <h6 class="cart-drawer-item__title fw-normal"><a
                                    href="{{ route('client.products.productdetail', $product->id) }}">{{ $PRODUCT_CART[$index] }}</a>
                            </h6>
                            <p class="cart-drawer-item__option text-secondary">Size: {{ $product->product_size }}
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <div class="qty-control position-relative">
                                    <input type="number" name="quantity" value="{{ $product->product_quantity }}"
                                        min="1" class="qty-control__number border-0 text-center">
                                    <div class="qty-control__reduce text-start">-</div>
                                    <div class="qty-control__increase text-end">+</div>
                                </div><!-- .qty-control -->
                                {{-- <span
                                class="cart-drawer-item__price money price">${{ $GLOBAL_CART->product->price }}</span> --}}
                            </div>
                        </div>
                    </div><!-- /.cart-drawer-item d-flex -->
                    <hr class="cart-drawer-divider">
                @endforeach

                <button class="btn-close-xs position-absolute top-0 end-0 js-cart-item-remove"></button>

            </div><!-- /.aside-content -->

            <div class="cart-drawer-actions position-absolute start-0 bottom-0 w-100">
                <hr class="cart-drawer-divider">
                <div class="d-flex justify-content-between">
                    <h6 class="fs-base fw-medium">SUBTOTAL:</h6>
                    <span class="cart-subtotal fw-medium">${{ $subTotal }}</span>
                </div><!-- /.d-flex justify-content-between -->
                <a href="{{ route('client.carts.index') }}" class="btn btn-light mt-3 d-block">View Cart</a>
                <a href="{{ route('client.checkout.index') }}" class="btn btn-primary mt-3 d-block">Checkout</a>
            </div><!-- /.aside-content -->
        </div><!-- /.aside -->

        <div class="mb-3 mb-xl-4 pb-3 pt-1 pb-xl-4"></div>

        <section class="service-promotion container">
            <div class="row">
                <div class="col-md-4 text-center mb-5 mb-md-0">
                    <div class="service-promotion__icon mb-4 theme-color">
                        <svg width="52" height="52" viewBox="0 0 52 52" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_shipping"></use>
                        </svg>
                    </div>
                    <h3 class="service-promotion__title fs-22 fw-bold text-uppercase">Fast And Free Delivery</h3>
                    <p class="service-promotion__content text-secondary">Free delivery for all orders over $140</p>
                </div><!-- /.col-md-4 text-center-->

                <div class="col-md-4 text-center mb-5 mb-md-0">
                    <div class="service-promotion__icon mb-4 theme-color">
                        <svg width="53" height="52" viewBox="0 0 53 52" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_headphone"></use>
                        </svg>
                    </div>
                    <h3 class="service-promotion__title fs-22 fw-bold text-uppercase">24/7 Customer Support</h3>
                    <p class="service-promotion__content text-secondary">Friendly 24/7 customer support</p>
                </div><!-- /.col-md-4 text-center-->

                <div class="col-md-4 text-center mb-4 pb-1 mb-md-0">
                    <div class="service-promotion__icon mb-4 theme-color">
                        <svg width="52" height="52" viewBox="0 0 52 52" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_shield"></use>
                        </svg>
                    </div>
                    <h3 class="service-promotion__title fs-22 fw-bold text-uppercase">Money Back Guarantee</h3>
                    <p class="service-promotion__content text-secondary">We return money within 30 days</p>
                </div><!-- /.col-md-4 text-center-->
            </div><!-- /.row -->
        </section>

        <div class="mb-3 mb-xl-4 pb-3 pt-1 pb-xl-4"></div>
    </main>

    <!-- Footer Type 1 with Top block -->
    <footer class="footer footer_type_1 dark">
        <div class="footer-top container">
            <div class="block-newsletter mb-4">
                <h3 class="block__title text-uppercase text-white fs-40 fw-bold mb-2">Subscribe to our newsletter</h3>
                <p class="mb-4">Be the first to get the latest news about trends, promotions, and much more!</p>

                <div class="mb-2 pb-1"></div>
                <form action="https://uomo-html.flexkitux.com/Demo16/index.html" class="block-newsletter__form">
                    <input class="form-control" type="email" name="email" placeholder="Your email address">
                    <button class="btn btn-secondary fw-medium theme-bg-color text-white border-0"
                        type="submit">JOIN</button>
                </form>
            </div>

            <div class="mb-3 pb-2"></div>
            <ul class="sub-menu__list list-unstyled d-flex gap-4 align-items-center justify-content-center">
                <li class="sub-menu__item"><a href="terms.html" class="menu-link menu-link_us-s">Returns Policy</a>
                </li>
                <li class="sub-menu__item"><a href="shop_order_tracking.html" class="menu-link menu-link_us-s">Track
                        Your Order</a></li>
                <li class="sub-menu__item"><a href="about.html" class="menu-link menu-link_us-s">Shipping &
                        Delivery</a></li>
            </ul>

            <ul class="social-links list-unstyled d-flex flex-wrap mb-0 align-items-center justify-content-center">
                <li>
                    <a href="https://www.facebook.com/" class="footer__social-link d-block">
                        <svg class="svg-icon svg-icon_facebook" width="9" height="15" viewBox="0 0 9 15"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_facebook"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.twitter.com/" class="footer__social-link d-block">
                        <svg class="svg-icon svg-icon_twitter" width="14" height="13" viewBox="0 0 14 13"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_twitter"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/" class="footer__social-link d-block">
                        <svg class="svg-icon svg-icon_instagram" width="14" height="13" viewBox="0 0 14 13"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_instagram"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/" class="footer__social-link d-block">
                        <svg class="svg-icon svg-icon_youtube" width="16" height="11" viewBox="0 0 16 11"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.0117 1.8584C14.8477 1.20215 14.3281 0.682617 13.6992 0.518555C12.5234 0.19043 7.875 0.19043 7.875 0.19043C7.875 0.19043 3.19922 0.19043 2.02344 0.518555C1.39453 0.682617 0.875 1.20215 0.710938 1.8584C0.382812 3.00684 0.382812 5.46777 0.382812 5.46777C0.382812 5.46777 0.382812 7.90137 0.710938 9.07715C0.875 9.7334 1.39453 10.2256 2.02344 10.3896C3.19922 10.6904 7.875 10.6904 7.875 10.6904C7.875 10.6904 12.5234 10.6904 13.6992 10.3896C14.3281 10.2256 14.8477 9.7334 15.0117 9.07715C15.3398 7.90137 15.3398 5.46777 15.3398 5.46777C15.3398 5.46777 15.3398 3.00684 15.0117 1.8584ZM6.34375 7.68262V3.25293L10.2266 5.46777L6.34375 7.68262Z">
                            </path>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.pinterest.com/" class="footer__social-link d-block">
                        <svg class="svg-icon svg-icon_pinterest" width="14" height="15" viewBox="0 0 14 15"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_pinterest"></use>
                        </svg>
                    </a>
                </li>
            </ul>

            <div class="mb-3 mb-xl-5 pb-3 pt-1 pb-xl-4"></div>
        </div>

        <div class="footer-bottom">
            <div class="d-block d-md-flex align-items-center container">
                <span class="footer-copyright me-auto">2024 Dung va Nanh</span>
                <div class="footer-settings d-block d-md-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <label for="footerSettingsLanguage" class="me-2 text-white">Language</label>
                        <select id="footerSettingsLanguage" class="form-select form-select-sm bg-transparent border-0"
                            aria-label="Default select example" name="store-language">
                            <option class="footer-select__option" selected>United Kingdom | English</option>
                            <option class="footer-select__option" value="1">United States | English</option>
                            <option class="footer-select__option" value="2">German</option>
                            <option class="footer-select__option" value="3">French</option>
                            <option class="footer-select__option" value="4">Swedish</option>
                        </select>
                    </div>

                    <div class="d-flex align-items-center">
                        <label for="footerSettingsCurrency" class="ms-md-3 me-2 text-white">Currency</label>
                        <select id="footerSettingsCurrency" class="form-select form-select-sm bg-transparent border-0"
                            aria-label="Default select example" name="store-language">
                            <option selected>$ USD</option>
                            <option value="1">£ GBP</option>
                            <option value="2">€ EURO</option>
                        </select>
                    </div>
                </div><!-- /.footer-settings -->
            </div><!-- /.d-flex -->
        </div><!-- /.footer-bottom container -->
    </footer>

    <!-- Mobile Fixed Footer -->
    <footer class="footer-mobile container w-100 px-5 d-md-none bg-body">
        <div class="row text-center">
            <div class="col-4">
                <a href="https://uomo-html.flexkitux.com/"
                    class="footer-mobile__link d-flex flex-column align-items-center">
                    <svg class="d-block" width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_home" />
                    </svg>
                    <span>Home</span>
                </a>
            </div><!-- /.col-3 -->

            <div class="col-4">
                <a href="https://uomo-html.flexkitux.com/"
                    class="footer-mobile__link d-flex flex-column align-items-center">
                    <svg class="d-block" width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_hanger" />
                    </svg>
                    <span>Shop</span>
                </a>
            </div><!-- /.col-3 -->

            <div class="col-4">
                <a href="https://uomo-html.flexkitux.com/"
                    class="footer-mobile__link d-flex flex-column align-items-center">
                    <div class="position-relative">
                        <svg class="d-block" width="18" height="18" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_heart" />
                        </svg>
                        <span class="wishlist-amount d-block position-absolute js-wishlist-count">3</span>
                    </div>
                    <span>Wishlist</span>
                </a>
            </div><!-- /.col-3 -->
        </div><!-- /.row -->
    </footer><!-- /.footer-mobile container position-fixed d-md-none bottom-0 -->

    <!-- Go To Top -->
    <div id="scrollTop" class="visually-hidden end-0"></div>

    <!-- Page Overlay -->
    <div class="page-overlay"></div><!-- /.page-overlay -->


    <!-- External JavaScripts -->
    <script src="{{ asset('client/js/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('client/js/plugins/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('client/js/plugins/bootstrap-slider.min.js') }}"></script>

    <script src="{{ asset('client/js/plugins/swiper.min.js') }}"></script>
    <script src="{{ asset('client/js/plugins/countdown.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
        integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Footer Scripts -->
    <script src="{{ asset('client/js/theme.js') }}"></script>

</body>

<!-- Mirrored from uomo-html.flexkitux.com/Demo16/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jun 2024 16:48:04 GMT -->

</html>
