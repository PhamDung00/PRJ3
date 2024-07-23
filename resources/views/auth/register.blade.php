@extends('client.layout.app')
@section('content')
<body>
  <main>
    <div class="mb-4 pb-4"></div>
    <div class="d-flex justify-content-center">
      <form method="POST" action="{{ route('register') }}" class="w-50">
        @csrf
        <h2 class="d-none">Register</h2>
        <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login" role="tab" aria-controls="tab-item-login" aria-selected="true">Register</a>
          </li>
        </ul>
        <div class="tab-content pt-2" id="login_register_tab_content">
          <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
            <div class="login-form">
              <form name="login-form" class="needs-validation" novalidate>
                <div class="form-floating mb-3">

                <div class="form-floating mb-3">
                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  <label for="customerNameInput">Name *</label>
                   
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="pb-3"></div>

                <div class="form-floating mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">                    <label for="customerEmailInput">Email address *</label>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                
                <div class="pb-3"></div>
                
                <div class="form-floating mb-3">
                  <label for="Phone" class="form-label">{{ __('Phone') }}</label>
                  <input id="phone" type="text" class="form-control form-control_gray @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="pb-3"></div>

                <div class="form-label-fixed mb-4">
                  <label for="Phone" class="form-label">{{ __('Gender') }}</label>
                  <select name="gender" class="form-control">
                      <option value="male">Male</option>
                      <option value="fe-male">FeMale</option>
                  </select>
                  @error('gender')
                      <span class="text-danger"> {{ $message }}</span>
                  @enderror

                </div>

                <div class="pb-3"></div>

                <div class="form-floating mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <label for="customerPasswodInput">Password *</label>
                   
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="pb-3"></div>

                <div class="form-floating mb-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <label for="customerPasswodInput">Confirm Password *</label>
                </div>

                <div class="row mb-0">
                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      {{ __('Register') }}
                    </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>

  <div class="mb-5 pb-xl-5"></div>

  <!-- Page Overlay -->
  <div class="page-overlay"></div><!-- /.page-overlay -->

  <!-- External JavaScripts -->
  <script src="js/plugins/jquery.min.js"></script>
  <script src="js/plugins/bootstrap.bundle.min.js"></script>
  <script src="js/plugins/bootstrap-slider.min.js"></script>

  <script src="js/plugins/swiper.min.js"></script>
  <script src="js/plugins/countdown.js"></script>
  <script src="js/plugins/jquery.fancybox.js"></script>

  <!-- Footer Scripts -->
  <script src="js/theme.js"></script>

</body>

<!-- Mirrored from uomo-html.flexkitux.com/Demo16/login_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jun 2024 16:48:52 GMT -->
@endsection
