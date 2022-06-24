<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.include.meta')
    <title>Indasto Industries HTML Template</title>
    @include('frontend.include.style')
    @yield('page-css')
</head>

<body class="theme-color-two">

    <div class="page-wrapper">
        @include('frontend.include.header')

        @include('frontend.include.hidden_sidebar')

        @include('frontend.include.search_popup')

        @yield('content')

        @include('frontend.include.footer')

    </div>
    <!--End pagewrapper-->

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-arrow-1"></span></div>

    @include('frontend.include.script')
    @stack('content_scripts')

</body>

</html>
