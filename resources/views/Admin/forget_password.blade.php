<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

@include('layouts.includes.header')

<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    
    <div class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">

        {{-- Language Switcher --}}
        <div class="position-absolute top-0 mt-3">
          <a href="{{ route('locale.switch', 'en') }}">English</a> |
          <a href="{{ route('locale.switch', 'ar') }}">العربية</a>
        </div>

        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">

                {{-- Logo --}}
                <a href="{{ url('/') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="">
                </a>

                {{-- Title --}}
                <p class="text-center">{{ __('auth.reset_password') }}</p>

                {{-- Success message --}}
                @if (session('status'))
                  <div class="alert alert-success text-center">
                    {{ session('status') }}
                  </div>
                @endif

                {{-- Reset password form --}}
                <form action="{{ route('admin.password.email') }}" method="POST">
                  @csrf

                  <div class="mb-3">
                    <label for="email" class="form-label">{{ __('auth.email_address') }}</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                      id="email" required autofocus>
                    @error('email')
                      <span class="text-danger small">{{ $message }}</span>
                    @enderror
                  </div>

                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                    {{ __('auth.send_password_reset_link') }}
                  </button>

                  <div class="d-flex align-items-center justify-content-center">
                    <a class="text-primary fw-bold ms-2" href="{{ route('admin.login') }}">
                      {{ __('auth.back_to_login') }}
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

  {{-- Scripts --}}
  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

</body>
</html>
