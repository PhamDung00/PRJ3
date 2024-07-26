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
                                        class="menu-link menu-link_us-s">{{ $childCategory->name }}</a><br>
                                @endforeach
                                
                            </li>
                        </ul>
                @endforeach
            </ul>
        </li>
        <li class="navigation__item">
            <a href="{{ route('client.orders.index') }}" class="navigation__link">Order</a>
        </li>
        <li class="navigation__item">
            <a href="{{ route('client.about.about') }}" class="navigation__link">About</a>
        </li>
        <li class="navigation__item">
            <a href="{{ route('client.contact.contact') }}" class="navigation__link">Contact</a>
        </li>
    </ul><!-- /.navigation__list -->
</nav>
