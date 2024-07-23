@extends('client.layout.app')
@section('content')
<body>
  <main>
    <div class="mb-4 pb-4"></div>
    <div class="d-flex justify-content-center">
      <form method="POST" action="{{ route('login') }}" class="w-50">
        @csrf
        <h2 class="d-none">Login</h2>
        <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login" role="tab" aria-controls="tab-item-login" aria-selected="true">Login</a>
          </li>
        </ul>
        <div class="tab-content pt-2" id="login_register_tab_content">
          <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
            <div class="login-form">
              <form name="login-form" class="needs-validation" novalidate>
                <div class="form-floating mb-3">

                <div class="pb-3"></div>

                    <div class="form-floating mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="customerEmailInput">Email address *</label>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="pb-3"></div>

                <div class="form-floating mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  <label for="customerPasswodInput">Password *</label>
                   
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="row mb-0">
                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                      </a>
                    @endif
                  </div>
                </div>

                <div class="customer-option mt-4 text-center">
                  <span class="text-secondary">No account yet?</span>
                  <a href="{{ route('register') }}" class="btn-text js-show-register">Create Account</a>
                </div>
              </form>
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
