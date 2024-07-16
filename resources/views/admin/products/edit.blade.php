@extends('admin.layout.app')
@section('title', 'Edit Product' . $product->name)
@section('content')
    <div class="card">
        @if (session()->has('error'))
            <p>{{ session()->get('error') }}</p>
        @endif
        <div>
            <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div style="padding-left: 0">
                    <!-- Header -->
                    <header class="ec-main-header" id="header">
                        <nav class="navbar navbar-static-top navbar-expand-lg">
                            <!-- Sidebar toggle button -->
                            <button id="sidebar-toggler" class="sidebar-toggle"></button>
                            <!-- search form -->
                            <div class="search-form d-lg-inline-block">
                                <div class="input-group">
                                    <input type="text" name="query" id="search-input" class="form-control"
                                        placeholder="search.." autofocus autocomplete="off" />
                                    <button type="button" name="search" id="search-btn" class="btn btn-flat">
                                        <i class="mdi mdi-magnify"></i>
                                    </button>
                                </div>
                                <div id="search-results-container">
                                    <ul id="search-results"></ul>
                                </div>
                            </div>

                            <!-- navbar right -->
                            <div class="navbar-right">
                                <ul class="nav navbar-nav">
                                    <!-- User Account -->
                                    <li class="dropdown user-menu">
                                        <button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <img src="assets/img/user/user.png" class="user-image" alt="User Image" />
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
                                            <!-- User image -->
                                            <li class="dropdown-header">
                                                <img src="assets/img/user/user.png" class="img-circle" alt="User Image" />
                                                <div class="d-inline-block">
                                                    John Deo <small class="pt-1">john.example@gmail.com</small>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="user-profile.html">
                                                    <i class="mdi mdi-account"></i> My Profile
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="mdi mdi-email"></i> Message
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"> <i class="mdi mdi-diamond-stone"></i> Projects </a>
                                            </li>
                                            <li class="right-sidebar-in">
                                                <a href="javascript:0"> <i class="mdi mdi-settings-outline"></i> Setting
                                                </a>
                                            </li>
                                            <li class="dropdown-footer">
                                                <a href="index.html"> <i class="mdi mdi-logout"></i> Log Out </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown notifications-menu custom-dropdown">
                                        <button class="dropdown-toggle notify-toggler custom-dropdown-toggler">
                                            <i class="mdi mdi-bell-outline"></i>
                                        </button>

                                        <div class="card card-default dropdown-notify dropdown-menu-right mb-0">
                                            <div class="card-header card-header-border-bottom px-3">
                                                <h2>Notifications</h2>
                                            </div>

                                            <div class="card-body px-0 py-0">
                                                <ul class="nav nav-tabs nav-style-border p-0 justify-content-between"
                                                    id="myTab" role="tablist">
                                                    <li class="nav-item mx-3 my-0 py-0">
                                                        <a href="#" class="nav-link active pb-3" id="home2-tab"
                                                            data-bs-toggle="tab" data-bs-target="#home2" role="tab"
                                                            aria-controls="home2" aria-selected="true">All (10)</a>
                                                    </li>

                                                    <li class="nav-item mx-3 my-0 py-0">
                                                        <a href="#" class="nav-link pb-3" id="profile2-tab"
                                                            data-bs-toggle="tab" data-bs-target="#profile2" role="tab"
                                                            aria-controls="profile2" aria-selected="false">Msgs (5)</a>
                                                    </li>

                                                    <li class="nav-item mx-3 my-0 py-0">
                                                        <a href="#" class="nav-link pb-3" id="contact2-tab"
                                                            data-bs-toggle="tab" data-bs-target="#contact2" role="tab"
                                                            aria-controls="contact2" aria-selected="false">Others (5)</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content" id="myTabContent3">
                                                    <div class="tab-pane fade show active" id="home2" role="tabpanel"
                                                        aria-labelledby="home2-tab">
                                                        <ul class="list-unstyled" data-simplebar style="height: 360px">
                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification">
                                                                    <div class="position-relative mr-3">
                                                                        <img class="rounded-circle"
                                                                            src="assets/img/user/u2.jpg" alt="Image">
                                                                        <span class="status away"></span>
                                                                    </div>
                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">Nitin</h4>
                                                                            <p class="last-msg">Lorem ipsum dolor sit, amet
                                                                                consectetur adipisicing elit. Nam itaque
                                                                                doloremque odio, eligendi delectus vitae.
                                                                            </p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                                <i class="mdi mdi-clock-outline"></i> 30
                                                                                min
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification media-active">
                                                                    <div class="position-relative mr-3">
                                                                        <img class="rounded-circle"
                                                                            src="assets/img/user/u1.jpg" alt="Image">
                                                                        <span class="status active"></span>
                                                                    </div>
                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">Lovina</h4>
                                                                            <p class="last-msg">Donec mattis augue a nisl
                                                                                consequat, nec imperdiet ex rutrum. Fusce et
                                                                                vehicula enim. Sed in enim eu odio vehic.
                                                                            </p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-white">
                                                                                <i class="mdi mdi-clock-outline"></i> Just
                                                                                now...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification">
                                                                    <div class="position-relative mr-3">
                                                                        <img class="rounded-circle"
                                                                            src="assets/img/user/u5.jpg" alt="Image">
                                                                        <span class="status away"></span>
                                                                    </div>
                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">Crinali</h4>
                                                                            <p class="last-msg">Lorem ipsum dolor sit, amet
                                                                                consectetur adipisicing elit. Nam itaque
                                                                                doloremque odio, eligendi delectus vitae.
                                                                            </p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                                <i class="mdi mdi-clock-outline"></i> 1 hrs
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification event-active">

                                                                    <div
                                                                        class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-info text-white">
                                                                        <i class="mdi mdi-calendar-check font-size-20"></i>
                                                                    </div>

                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">Upcomming event added</h4>
                                                                            <p class="last-msg font-size-14">03/Jan/2020
                                                                                (1pm -
                                                                                2pm)</p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                                <i class="mdi mdi-clock-outline"></i> 10
                                                                                min
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification">

                                                                    <div
                                                                        class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
                                                                        <i
                                                                            class="mdi mdi-chart-areaspline font-size-20"></i>
                                                                    </div>

                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">Yearly Sales report</h4>
                                                                            <p class="last-msg font-size-14">Lorem ipsum
                                                                                dolor
                                                                                sit, amet consectetur adipisicing elit. Nam
                                                                                itaque doloremque odio, eligendi delectus
                                                                                vitae.
                                                                            </p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                                <i class="mdi mdi-clock-outline"></i> 1 hrs
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification">

                                                                    <div
                                                                        class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                                                                        <i
                                                                            class="mdi mdi-account-multiple-check font-size-20"></i>
                                                                    </div>

                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">New request</h4>
                                                                            <p class="last-msg font-size-14">Add Dany Jones
                                                                                as
                                                                                your contact consequat nec imperdiet ex
                                                                                rutrum.
                                                                                Fusce et vehicula enim. Sed in enim.</p>

                                                                            <span
                                                                                class="my-1 btn btn-sm btn-success">Accept</span>
                                                                            <span
                                                                                class="my-1 btn btn-sm btn-secondary">Delete</span>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary d-block">
                                                                                <i class="mdi mdi-clock-outline"></i> 5 min
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification">

                                                                    <div
                                                                        class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-danger text-white">
                                                                        <i
                                                                            class="mdi mdi-server-network-off font-size-20"></i>
                                                                    </div>

                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">Server overloaded</h4>
                                                                            <p class="last-msg font-size-14">Donec mattis
                                                                                augue
                                                                                a nisl consequat, nec imperdiet ex rutrum.
                                                                                Fusce
                                                                                et vehicula enim. Sed in enim eu odio vehic.
                                                                            </p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                                <i class="mdi mdi-clock-outline"></i> 30
                                                                                min
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification">

                                                                    <div
                                                                        class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-purple text-white">
                                                                        <i class="mdi mdi-playlist-check font-size-20"></i>
                                                                    </div>

                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">Task complete</h4>
                                                                            <p class="last-msg font-size-14">Nam ut nisi
                                                                                erat.
                                                                                Ut quis tortor varius, hendrerit arcu quis,
                                                                                congue nisl. In scelerisque, sem ut ve.</p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                                <i class="mdi mdi-clock-outline"></i> 2 hrs
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                    <div class="tab-pane fade" id="profile2" role="tabpanel"
                                                        aria-labelledby="profile2-tab">
                                                        <ul class="list-unstyled" data-simplebar style="height: 360px">
                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification">
                                                                    <div class="position-relative mr-3">
                                                                        <img class="rounded-circle"
                                                                            src="assets/img/user/u6.jpg" alt="Image">
                                                                        <span class="status away"></span>
                                                                    </div>
                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">Hardiko</h4>
                                                                            <p class="last-msg">Donec mattis augue a nisl
                                                                                consequat, nec imperdiet ex rutrum. Fusce et
                                                                                vehicula enim. Sed in enim eu odio vehic.
                                                                            </p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                                <i class="mdi mdi-clock-outline"></i> 1 hrs
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification">
                                                                    <div class="position-relative mr-3">
                                                                        <img class="rounded-circle"
                                                                            src="assets/img/user/u7.jpg" alt="Image">
                                                                        <span class="status away"></span>
                                                                    </div>
                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">Browin</h4>
                                                                            <p class="last-msg">Nam ut nisi erat. Ut quis
                                                                                tortor
                                                                                varius, hendrerit arcu quis, congue nisl. In
                                                                                scelerisque, sem ut ve.</p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                                <i class="mdi mdi-clock-outline"></i> 1 hrs
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification media-active">
                                                                    <div class="position-relative mr-3">
                                                                        <img class="rounded-circle"
                                                                            src="assets/img/user/u1.jpg" alt="Image">
                                                                        <span class="status active"></span>
                                                                    </div>
                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">jenelia</h4>
                                                                            <p class="last-msg">Donec mattis augue a nisl
                                                                                consequat, nec imperdiet ex rutrum. Fusce et
                                                                                vehicula enim. Sed in enim eu odio vehic.
                                                                            </p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-white">
                                                                                <i class="mdi mdi-clock-outline"></i> Just
                                                                                now...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification">
                                                                    <div class="position-relative mr-3">
                                                                        <img class="rounded-circle"
                                                                            src="assets/img/user/u2.jpg" alt="Image">
                                                                        <span class="status away"></span>
                                                                    </div>
                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">Bhavlio</h4>
                                                                            <p class="last-msg">Lorem ipsum dolor sit, amet
                                                                                consectetur adipisicing elit. Nam itaque
                                                                                doloremque odio, eligendi delectus vitae.
                                                                            </p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                                <i class="mdi mdi-clock-outline"></i> 1 hrs
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification">
                                                                    <div class="position-relative mr-3">
                                                                        <img class="rounded-circle"
                                                                            src="assets/img/user/u5.jpg" alt="Image">
                                                                        <span class="status away"></span>
                                                                    </div>
                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">Browini</h4>
                                                                            <p class="last-msg">Lorem ipsum dolor sit, amet
                                                                                consectetur adipisicing elit. Nam itaque
                                                                                doloremque odio, eligendi delectus vitae.
                                                                            </p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                                <i class="mdi mdi-clock-outline"></i> 1 hrs
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                    <div class="tab-pane fade" id="contact2" role="tabpanel"
                                                        aria-labelledby="contact2-tab">
                                                        <ul class="list-unstyled" data-simplebar style="height: 360px">
                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification event-active">

                                                                    <div
                                                                        class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-info text-white">
                                                                        <i class="mdi mdi-calendar-check font-size-20"></i>
                                                                    </div>

                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">Upcomming event added</h4>
                                                                            <p class="last-msg font-size-14">03/Jan/2020
                                                                                (1pm -
                                                                                2pm)</p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                                <i class="mdi mdi-clock-outline"></i> 10
                                                                                min
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification">

                                                                    <div
                                                                        class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
                                                                        <i
                                                                            class="mdi mdi-chart-areaspline font-size-20"></i>
                                                                    </div>

                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">New Sales report</h4>
                                                                            <p class="last-msg font-size-14">Lorem ipsum
                                                                                dolor
                                                                                sit, amet consectetur adipisicing elit. Nam
                                                                                itaque doloremque odio, eligendi delectus
                                                                                vitae.
                                                                            </p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                                <i class="mdi mdi-clock-outline"></i> 1 hrs
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification">

                                                                    <div
                                                                        class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                                                                        <i
                                                                            class="mdi mdi-account-multiple-check font-size-20"></i>
                                                                    </div>

                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">New Request</h4>
                                                                            <p class="last-msg font-size-14">Add Dany Jones
                                                                                as
                                                                                your contact consequat nec imperdiet ex
                                                                                rutrum.
                                                                                Fusce et vehicula enim. Sed in enim.</p>

                                                                            <span
                                                                                class="my-1 btn btn-sm btn-success">Accept</span>
                                                                            <span
                                                                                class="my-1 btn btn-sm btn-secondary">Delete</span>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary d-block">
                                                                                <i class="mdi mdi-clock-outline"></i> 5 min
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification">

                                                                    <div
                                                                        class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-danger text-white">
                                                                        <i
                                                                            class="mdi mdi-server-network-off font-size-20"></i>
                                                                    </div>

                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">Server overloaded</h4>
                                                                            <p class="last-msg font-size-14">Donec mattis
                                                                                augue
                                                                                a nisl consequat, nec imperdiet ex rutrum.
                                                                                Fusce
                                                                                et vehicula enim. Sed in enim eu odio vehic.
                                                                            </p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                                <i class="mdi mdi-clock-outline"></i> 30
                                                                                min
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javscript:void(0)"
                                                                    class="media media-message media-notification">

                                                                    <div
                                                                        class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-purple text-white">
                                                                        <i class="mdi mdi-playlist-check font-size-20"></i>
                                                                    </div>

                                                                    <div class="media-body d-flex justify-content-between">
                                                                        <div class="message-contents">
                                                                            <h4 class="title">New Task complete</h4>
                                                                            <p class="last-msg font-size-14">Nam ut nisi
                                                                                erat.
                                                                                Ut quis tortor varius, hendrerit arcu quis,
                                                                                congue nisl. In scelerisque, sem ut ve.</p>

                                                                            <span
                                                                                class="font-size-12 font-weight-medium text-secondary">
                                                                                <i class="mdi mdi-clock-outline"></i> 2 hrs
                                                                                ago...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="dropdown-menu dropdown-menu-right d-none">
                                            <li class="dropdown-header">You have 5 notifications</li>
                                            <li>
                                                <a href="#">
                                                    <i class="mdi mdi-account-plus"></i> New user registered
                                                    <span class=" font-size-12 d-inline-block float-right"><i
                                                            class="mdi mdi-clock-outline"></i> 10 AM</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="mdi mdi-account-remove"></i> User deleted
                                                    <span class=" font-size-12 d-inline-block float-right"><i
                                                            class="mdi mdi-clock-outline"></i> 07 AM</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                                                    <span class=" font-size-12 d-inline-block float-right"><i
                                                            class="mdi mdi-clock-outline"></i> 12 PM</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="mdi mdi-account-supervisor"></i> New client
                                                    <span class=" font-size-12 d-inline-block float-right"><i
                                                            class="mdi mdi-clock-outline"></i> 10 AM</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="mdi mdi-server-network-off"></i> Server overloaded
                                                    <span class=" font-size-12 d-inline-block float-right"><i
                                                            class="mdi mdi-clock-outline"></i> 05 AM</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-footer">
                                                <a class="text-center" href="#"> View All </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="right-sidebar-in right-sidebar-2-menu">
                                        <i class="mdi mdi-settings-outline mdi-spin"></i>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </header>
                    <!-- CONTENT WRAPPER -->
                    <div class="ec-content-wrapper">
                        <div class="content">
                            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                                <div>
                                    <h1>Add Product</h1>
                                    <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                                        <span><i class="mdi mdi-chevron-right"></i></span>Product
                                    </p>
                                </div>
                                <div>
                                    <a href="{{ route('products.index') }}" class="btn btn-primary"> View All
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-default">
                                        <div class="card-header card-header-border-bottom">
                                            <h2>Edit Product</h2>
                                        </div>
                                        <div class="card-body">
                                            <div class="row ec-vendor-uploads">
                                                <div class="col-lg-4">
                                                    <div class="ec-vendor-img-upload">
                                                        <div class="ec-vendor-main-img">
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' id="imageUpload"
                                                                        name="img_upload_0" class="ec-image-upload"
                                                                        accept=".png, .jpg, .jpeg" />
                                                                    <label for="imageUpload"><img
                                                                            src="assets/img/icons/edit.svg"
                                                                            class="svg_img header_svg"
                                                                            alt="edit" /></label>
                                                                </div>
                                                                <div class="avatar-preview ec-preview">
                                                                    <div class="imagePreview ec-div-preview">
                                                                        <img class="ec-image-preview"
                                                                            src="{{ isset($product->images[0]->url)?asset($product->images[0]->url):''  }}"
                                                                            alt="edit" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="thumb-upload-set colo-md-12">
                                                                <div class="thumb-upload">
                                                                    <div class="thumb-edit">
                                                                        <input type='file' id="thumbUpload01"
                                                                            class="ec-image-upload" name="img_upload_1"
                                                                            accept=".png, .jpg, .jpeg" />
                                                                        <label for="imageUpload"><img
                                                                                src="assets/img/icons/edit.svg"
                                                                                class="svg_img header_svg"
                                                                                alt="edit" /></label>
                                                                    </div>
                                                                    <div class="thumb-preview ec-preview">
                                                                        <div class="image-thumb-preview">
                                                                            <img class="image-thumb-preview ec-image-preview"
                                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                                alt="edit" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="thumb-upload">
                                                                    <div class="thumb-edit">
                                                                        <input type='file' id="thumbUpload02"
                                                                            name="img_upload_2" class="ec-image-upload"
                                                                            accept=".png, .jpg, .jpeg" />
                                                                        <label for="imageUpload"><img
                                                                                src="assets/img/icons/edit.svg"
                                                                                class="svg_img header_svg"
                                                                                alt="edit" /></label>
                                                                    </div>
                                                                    <div class="thumb-preview ec-preview">
                                                                        <div class="image-thumb-preview">
                                                                            <img class="image-thumb-preview ec-image-preview"
                                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                                alt="edit" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="thumb-upload">
                                                                    <div class="thumb-edit">
                                                                        <input type='file' id="thumbUpload03"
                                                                            class="ec-image-upload"
                                                                            accept=".png, .jpg, .jpeg" />
                                                                        <label for="imageUpload"><img
                                                                                src="assets/img/icons/edit.svg"
                                                                                class="svg_img header_svg"
                                                                                alt="edit" /></label>
                                                                    </div>
                                                                    <div class="thumb-preview ec-preview">
                                                                        <div class="image-thumb-preview">
                                                                            <img class="image-thumb-preview ec-image-preview"
                                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                                alt="edit" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="thumb-upload">
                                                                    <div class="thumb-edit">
                                                                        <input type='file' id="thumbUpload04"
                                                                            class="ec-image-upload"
                                                                            accept=".png, .jpg, .jpeg" />
                                                                        <label for="imageUpload"><img
                                                                                src="assets/img/icons/edit.svg"
                                                                                class="svg_img header_svg"
                                                                                alt="edit" /></label>
                                                                    </div>
                                                                    <div class="thumb-preview ec-preview">
                                                                        <div class="image-thumb-preview">
                                                                            <img class="image-thumb-preview ec-image-preview"
                                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                                alt="edit" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="thumb-upload">
                                                                    <div class="thumb-edit">
                                                                        <input type='file' id="thumbUpload05"
                                                                            class="ec-image-upload"
                                                                            accept=".png, .jpg, .jpeg" />
                                                                        <label for="imageUpload"><img
                                                                                src="assets/img/icons/edit.svg"
                                                                                class="svg_img header_svg"
                                                                                alt="edit" /></label>
                                                                    </div>
                                                                    <div class="thumb-preview ec-preview">
                                                                        <div class="image-thumb-preview">
                                                                            <img class="image-thumb-preview ec-image-preview"
                                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                                alt="edit" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="thumb-upload">
                                                                    <div class="thumb-edit">
                                                                        <input type='file' id="thumbUpload06"
                                                                            class="ec-image-upload"
                                                                            accept=".png, .jpg, .jpeg" />
                                                                        <label for="imageUpload"><img
                                                                                src="assets/img/icons/edit.svg"
                                                                                class="svg_img header_svg"
                                                                                alt="edit" /></label>
                                                                    </div>
                                                                    <div class="thumb-preview ec-preview">
                                                                        <div class="image-thumb-preview">
                                                                            <img class="image-thumb-preview ec-image-preview"
                                                                                src="assets/img/products/vender-upload-thumb-preview.jpg"
                                                                                alt="edit" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="ec-vendor-upload-detail">
                                                        <form class="row g-3">
                                                            <div class="col-md-6">
                                                                <label for="inputEmail4" class="form-label">Product
                                                                    name</label>
                                                                <input type="text" name="name"
                                                                    class="form-control slug-title" id="inputEmail4"
                                                                    value="{{ $product->name }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label name="group" class="ms-4">Categories</label>
                                                                <select name="category_ids" class="form-control">
                                                                    <option value="">Select Category</option>
                                                                    @foreach ($categories as $cate)
                                                                        <option value="{{ $cate->id }}">
                                                                            {{ $cate->name }}</option>
                                                                    @endforeach
                                                                </select>

                                                                @error('category_ids')
                                                                    <span class="text-danger"> {{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 mb-25">
                                                                    <div id="sizes_1">
                                                                        <div class="size" id="example-size">

                                                                                <label for="product_details[{{0}}][sizes][0][name]">Name</label>
                                                                                <input type="text" name="product_details[{{0}}][sizes][0][name]" value="{{$product->details[0]["sizes"][0]["name"]??''}}">
                                                                                    <label for="product_details[{{0}}][sizes][0][quantity]">Quantity</label>
                                                                                    <input type="number" name="product_details[{{0}}][sizes][0][quantity]" value="{{$product->details[0]["sizes"][0]["quantity"]??''}}">
                                                                        </div>
                                                                        @if (isset($product->details))    
                                                                        @foreach ($product->details as $index=>$value)
                                                                        @if (isset($value['sizes'][0])&&$index>0)                                                                                
                                                                        <label for="product_details[{{$index}}][sizes][0][name]">Name</label>
                                                                        <input type="text" name="product_details[{{$index}}][sizes][0][name]" value="{{$value["sizes"][0]["name"]}}">
                                                                            <label for="product_details[{{$index}}][sizes][0][quantity]">Quantity</label>
                                                                            <input type="number" name="product_details[{{$index}}][sizes][0][quantity]" value="{{$value["sizes"][0]["quantity"]}}">
                                                                        @endif
                                                                        @endforeach
                                                                        @endif

                                                                    </div>

                                                                    
                                                                <button type="button" class="add-button"
                                                                onclick="saveSize()">Add Size</button><br><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Price: <span>( In USD
                                                                )</span></label>
                                                        <input type="number" name="price" class="form-control"
                                                            id="price" step="0.01" value="{{ $product->price }}"
                                                            required min="0">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Description</label>
                                                        <textarea class="form-control" rows="4" name="description">{{ $product->description }}</textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Product Tags <span>( Type and
                                                                make comma to separate tags )</span></label>
                                                        <input type="text" class="form-control" id="group_tag"
                                                            name="group_tag" value="" placeholder=""
                                                            data-role="tagsinput" />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->
    </div>
    </form>
    </div>
    </div>
    <style>
        .add-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .add-button:hover {
            background-color: #218838;
        }

        .color {
            margin-bottom: 20px;
        }

        .color label {
            font-weight: bold;
        }

        .color input[type="text"],
        .color input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>

    <style>
        .add-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .add-button:hover {
            background-color: #0056b3;
        }

        .size {
            margin-bottom: 20px;
        }

        .size label {
            font-weight: bold;
        }

        .size input[type="text"],
        .size input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
    <script>
        let sizeCounter =  {{count($product->details)}};
        let countDetail = {{count($product->details)}};
        function saveSize() {
            sizeCounter++;
            countDetail++;
            const sizeDiv = document.createElement('div');
            sizeDiv.className = 'size';
            sizeDiv.innerHTML = document.getElementById("example-size").innerHTML;
            // set input names
            const inputs = sizeDiv.querySelectorAll("input");
            const length = inputs.length;
            for(let i=0;i<length;i++){
                inputs[i].name = inputs[i].name.replace("0",countDetail);
                inputs[i].value = "";
            }
            document.getElementById('sizes_1').appendChild(sizeDiv);
            // Reset modal inputs
            // document.getElementById('modal_size_name').value = '';
            // document.getElementById('modal_quantity').value = '';
        
            // Close the modal
            // $('#addSizeModal').modal('hide');
        }

        function addColor(detailCount) {
            let colorsDiv = document.getElementById(`colors_${detailCount}`);
            let colorCount = colorsDiv.children.length + 1;

            let html = `
                <div class="color">
                    <label for="color_name_${detailCount}_${colorCount}">Color Name:</label><br>
                    <input type="text" id="color_name_${detailCount}_${colorCount}" name="product_details[${detailCount - 1}][colors][${colorCount - 1}][name]" required><br>
                </div>
            `;

            colorsDiv.innerHTML += html;
        }
    </script>
    <script>
        const onSelectImage = e => {
            const n = e.target.value.split("\\").length;
            document.querySelector("#img_name_label").innerText = e.target.value.split("\\")[n - 1];
        }
    </script>
@endsection
