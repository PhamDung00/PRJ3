<div class="ec-left-sidebar ec-bg-sidebar">
    <div id="sidebar" class="sidebar ec-sidebar-footer">

        <div class="ec-brand">
            <a href="index.html" title="Ekka">
                <img class="ec-brand-icon" src="assets/img/logo/ec-site-logo.png" alt="" />
                <span class="ec-brand-name text-truncate">Ekka</span>
            </a>
        </div>

        <!-- begin sidebar scrollbar -->
        <div class="ec-navigation" data-simplebar>
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Dashboard -->
                <li class="{{ str_contains(URL::full(), '/dashboard') ? 'active' : '' }}">
                    <a class="side nav-item-link" href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <hr>
                </li>
                @hasrole('super-admin')
                    <li class="has-sub {{ str_contains(URL::full(), '/roles') ? 'active' : '' }}">
                        <a class="sidenav-item-link" href="{{ route('roles.index') }}">
                            <i><span class="mdi mdi-24px mdi-account-card-details"></span></i>
                            <span class="nav-text">Role</span>
                        </a>
                    </li>
                @endhasrole
                @can('show-user')
                    <!-- Vendors -->
                    <li class="has-sub {{ str_contains(URL::full(), '/users') ? 'active' : '' }}">
                        <a class="sidenav-item-link">
                            <i class="mdi mdi-account-group-outline"></i>
                            <span class="nav-text">User</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="vendor-card.html">
                                        <span class="nav-text">User Grid</span>
                                    </a>
                                </li>

                                <li class="">
                                    <a class="sidenav-item-link" href="{{ route('users.index') }}">
                                        <span class="nav-text">User List</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan

                <!-- Users -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">123</span> <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                            <li>
                                <a class="sidenav-item-link" href="user-card.html">
                                    <span class="nav-text">User Grid</span>
                                </a>
                            </li>

                            <li class="">
                                <a class="sidenav-item-link" href="user-list.html">
                                    <span class="nav-text">User List</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="user-profile.html">
                                    <span class="nav-text">Users Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                </li>
                @can('show-category')
                    <!-- Category -->
                    <li class="has-sub"{{ str_contains(URL::full(), '/categories') ? 'active' : '' }}>
                        <a class="sidenav-item-link" href="{{ route('categories.index') }}">
                            <i class="mdi mdi-dns-outline"></i>
                            <span class="nav-text">Categories</span>
                        </a>
                    </li>
                @endcan
                @can('show-product')
                    <!-- Products -->
                    <li class="has-sub"{{ str_contains(URL::full(), '/products') ? 'active' : '' }}>
                        <a class="sidenav-item-link" href="{{ route('products.index') }}">
                            <i class="mdi mdi-palette-advanced"></i>
                            <span class="nav-text">Products</span></b>
                        </a>
                    </li>
                @endcan
                @can('show-coupon')
                    <!-- Coupons -->
                    <li class="has-sub"{{ str_contains(URL::full(), '/coupons') ? 'active' : '' }}>
                        <a class="sidenav-item-link" href="{{ route('coupons.index') }}">
                            <i class="mdi mdi-percent"></i>
                            <span class="nav-text">Coupons</span></b>
                        </a>
                    </li>
                @endcan
                <!-- Orders -->
                <li class="has-sub" {{ str_contains(URL::full(), '/coupons') ? 'active' : '' }}>
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-cart"></i>
                        <span class="nav-text">Orders</span> <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="{{ route('admin-orders.index') }}">
                                    <span class="nav-text">New Order</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="{{ route('orders.history') }}">
                                    <span class="nav-text">Order History</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
