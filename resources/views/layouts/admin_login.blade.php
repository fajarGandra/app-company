<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.meta')
    @include('layouts.admin.style')
    @yield('page-css')
</head>

<body>
    @yield('content')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</body>

</html>
