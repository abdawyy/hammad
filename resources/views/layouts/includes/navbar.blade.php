<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- App Topstrip -->
    <div class="app-topstrip bg-dark py-3 px-4 w-100 d-flex flex-column flex-lg-row align-items-center justify-content-between">
      
      <!-- Left Logo Section -->
      <div class="d-flex align-items-center mb-2 mb-lg-0">
        <a href="#" class="d-flex justify-content-center">
          <img src="{{ asset('assets/images/logos/logo-wrappixel.svg') }}" alt="Logo" width="150">
        </a>
      </div>

      <!-- Right Content Section -->
      <div class="d-flex flex-column flex-lg-row align-items-center gap-2 text-center text-lg-start">

        <!-- Language Switcher -->
        <div class="d-flex align-items-center gap-2 text-white">
          <a class="text-white text-decoration-none" href="{{ route('locale.switch', 'en') }}">English</a>
          <span>|</span>
          <a class="text-white text-decoration-none" href="{{ route('locale.switch', 'ar') }}">العربية</a>
        </div>
      </div>
      
    </div>
    <!-- End App Topstrip -->
