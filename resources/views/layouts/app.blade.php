<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.include.head')
</head>
<body>
@include('front.include.header')

@yield('content')

@include('front.include.footer')

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
@include('front.include.script')
</body>
</html>
