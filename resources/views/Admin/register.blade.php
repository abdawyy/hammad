<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

@include('layouts.includes.header')

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <div
      class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
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

                {{-- Flash alerts --}}
                <x-alert type="success" :message="session('success')" />
                <x-alert type="danger" :message="session('error')" />

                <p class="text-center">{{ __('auth.register_account') }}</p>

        

                {{-- Register Form --}}
                <form action="{{ route('admin.register.submit') }}" method="POST">
                  @csrf

                  <div class="mb-3">
                    <label for="name" class="form-label">{{ __('auth.name') }}</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                      value="{{ old('name') }}" required>
                    @error('name')
                      <span class="text-danger small">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">{{ __('auth.email_address') }}</label>
                    <input type="email" name="email" id="email"
                      class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                      <span class="text-danger small">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="password" class="form-label">{{ __('auth.password') }}</label>
                    <input type="password" name="password" id="password"
                      class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                      <span class="text-danger small">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="mb-4">
                    <label for="password_confirmation" class="form-label">{{ __('auth.confirm_password') }}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                      required>
                  </div>

                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                    {{ __('auth.register') }}
                  </button>

                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">{{ __('auth.already_have_account') }}</p>
                    <a class="text-primary fw-bold ms-2" href="{{ route('admin.login') }}">
                      {{ __('auth.sign_in') }}
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
