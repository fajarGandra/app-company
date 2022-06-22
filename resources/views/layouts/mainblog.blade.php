
<!DOCTYPE html>
<html lang="en">

<head>
  @include('frontend.include.meta')
  @include('frontend.include.style')
</head>

<body>
  @include('frontend.include.header')

  <main id="main">
    @yield('content')
  </main><!-- End #main -->

  @include('frontend.include.footer')

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  
  @stack('pre-main-scripts')
  @include('frontend.include.script')
  @stack('post-main-scripts')


</body>

</html>