<nav class="navigation menu">
    <ul class="navigation__list list-unstyled d-flex">
        <li class="navigation__item">
            <a href="{{ route('client.home') }}" class="navigation__link">Home</a>
        </li>
        <li class="navigation__item">
            <a href="" class="navigation__link">Shop</a>
            <ul class="default-menu list-unstyled">
                @foreach ($GLOBAL_CATEGORIES as $category)
                    <div class="accordion-body px-0 pb-0 pt-3">
                        <ul class="list list-inline mb-0">
                            <li class="list-item">
                                <a href="{{ route('client.product.productlist', $category['parent']['id']) }}"
                                    class="sub-menu__title">{{ $category['parent']['name'] }}</a>
                                @foreach ($category['childrens'] as $childCategory)
                                    <a href="{{ route('client.product.productlist', $childCategory->id) }}"
                                        class="menu-link menu-link_us-s">{{ $childCategory->name }}</a>
                                @endforeach
                            </li>
                        </ul>
                @endforeach
            </ul>
        </li>
        <li class="navigation__item">
            <a href="{{ route('client.orders.index') }}" class="navigation__link">Order</a>
        </li>
        @auth
            @if (auth()->user()->role_id != 5)
                <li class="navigation__item">
                    <a href="{{ route('dashboard') }}" class="navigation__link">Dashboard</a>
                </li>
            @endif
        @endauth
        <li class="navigation__item">
            <a href="contact.html" class="navigation__link">Contact</a>
        </li>
    </ul><!-- /.navigation__list -->
</nav>
