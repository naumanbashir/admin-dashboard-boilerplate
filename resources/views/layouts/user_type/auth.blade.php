@extends('layouts.app')

@section('dashboard')
    @include('layouts.navbars.auth.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        @include('layouts.navbars.auth.nav')
        <div class="container-fluid py-4">
            <div class="alertMessages"></div>
            @yield('content')
            @include('layouts.footers.auth.footer')
        </div>
    </main>
@endsection
