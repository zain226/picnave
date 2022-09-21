@extends('layouts.app')
@section('title', 'Images')
@section('content')
    <div style="margin-top: 100px"></div>
    <div class="container-fluid">
        <div class="row">
            <div class=""><h2 class="">{!! $category->content !!}</h2></div>
        </div>

{{--        <div class="row">--}}
{{--            <a class="Tab_tab__LykKB spacing_noMargin__Q_PsJ Tab_active__8PGWR Link_link__mTUkz Tab_active__8PGWR spacing_noMargin__Q_PsJ" href="/search/red%20white%20and%20blue%20background/">Photos<span class="Tab_number__k5SYC">345.3K</span></a>--}}
{{--        </div>--}}
    </div>
    <div class="container-fluid images_section mt-45p mb-45p">
        <div class="row" data-masonry='{"percentPosition": true }'>
            @foreach($images as $image)
                <div class="col-lg-4 col-sm-6 columns">
                    <div class="thumbnail">
                        <img
                            src="{{asset('media/thumb/'.$image->thumbnail)}}"/>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('js')
@endpush
