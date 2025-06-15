<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    @include('layouts.includes.header')
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Top Navbar --}}
    @include('layouts.includes.navbar')

    {{-- Body Wrapper --}}
    <div class="flex flex-1 overflow-hidden">

        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow shrink-0 {{ app()->getLocale() === 'ar' ? 'order-2' : 'order-1' }}">
            @include('layouts.includes.sidebar')
        </aside>

        {{-- Main Content Area --}}
        <main class="flex-1 overflow-y-auto m-5 {{ app()->getLocale() === 'ar' ? 'order-1' : 'order-2' }}">
            <div class="body-wrapper-inner mt-5">
                <div class="container mx-auto">
                    <div class="card bg-white p-6 rounded shadow">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

    </div>

    {{-- Footer --}}
    @include('layouts.includes.footer')

</body>

</html>
