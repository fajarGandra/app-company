<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.meta')
    @include('layouts.admin.style')
    @yield('page-css')
</head>

<body>
    @include('layouts.admin.header')
    @include('layouts.admin.sidebar')

    <main id="main" class="main">
        @yield('content')
    </main><!-- End #main -->
    @include('layouts.admin.alert-dialog')
    @include('layouts.admin.data-modal')

    @include('layouts.admin.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    
    @include('layouts.admin.script')
    @stack('content_scripts')

</body>

</html>
