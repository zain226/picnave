<!DOCTYPE html>
@php($layout = session('layout') ?? 'sun')

<html  class="{{$layout == 'sun' ? 'light-layout' : ' dark-layout'}} light-layout">
<head>
    @include('admin.includes.head')
    @stack('css')
</head>
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static menu-extended  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">
<div class="page-loader d-none">
    <div class="loader"></div>
</div>
@include('admin.includes.header')
@include('admin.includes.sidebar')

@yield('content')

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
@include('admin.includes.script')

<form id="delete-form" action="" method="POST"
      style="display: none;">
    @csrf
    @method('delete')
</form>
@stack('js')

<script>
    $(document).on('click', '.layout-change', function () {
        sessionStore('layout');
    })

    function sessionStore(type) {
        $.ajax({
            url: '{{route("admin.layout.change")}}',
            data: {type},
            type: "GET",
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
            }
        });
    }
</script>
</body>
</html>
