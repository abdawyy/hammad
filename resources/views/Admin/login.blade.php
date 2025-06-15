<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

@include('layouts.includes.header')

<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">

      <div class="d-flex align-items-center justify-content-center w-100">
        <!-- Language Switch -->
        <div class="position-absolute top-0 mt-3">
          <a href="{{ route('locale.switch', 'en') }}">English</a> |
          <a href="{{ route('locale.switch', 'ar') }}">العربية</a>
        </div>

        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="{{ url('/') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="Logo">
                </a>
                <p class="text-center">{{ __('auth.admin_portal') }}</p>

                <x-alert type="success" :message="session('success')" />
                <x-alert type="danger" :message="session('error')" />

                <form action="{{ route('admin.login.submit') }}" method="POST">
                  @csrf

                  <div class="mb-3">
                    <label for="email" class="form-label">{{ __('auth.username') }}</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                  </div>

                  <div class="mb-4">
                    <label for="password" class="form-label">{{ __('auth.password') }}</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                  </div>

                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" name="remember" id="remember">
                      <label class="form-check-label text-dark" for="remember">
                        {{ __('auth.remember_device') }}
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="{{ route('admin.password.request') }}">
                      {{ __('auth.forgot_password') }}
                    </a>
                  </div>

                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                    {{ __('auth.sign_in') }}
                  </button>

                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">{{ __('auth.new_to') }}</p>
                    <a class="text-primary fw-bold ms-2" href="{{ route('admin.register') }}">
                      {{ __('auth.create_account') }}
                    </a>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- RTL/LTR Support -->
  @if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
  @else
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  @endif

  <!-- Scripts -->
  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
</html>
