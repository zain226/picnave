<script src="{{asset('assets/front/js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
{{--<script src="{{asset('assets/front/js/popper.min.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
<script src="https://use.fontawesome.com/511320de33.js"></script>



<!-- Template Main JS File -->
<script src="{{asset('js/main.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.categories').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            variableWidth: true
        });
    });
</script>
<script>
    $(document).on('click','.dropdown_button',function () {
       $(this).closest('.btn-group').find('.show_dropdown_btn').toggleClass('show');
    });
    $('.dropdown-toggle').dropdown();
</script>

