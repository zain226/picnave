@extends('layouts.app')
@section('title', 'Images')
@section('content')

<section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center">
        <h1>Stunning free images & royalty free stock</h1>
        <h2>Over 2.6 million+ high quality stock images, videos and music shared by our talented community.</h2>
    </div>
</section>
<section class="cat-sec">
    <div class="container-fluid mt-45p">
        <div class="row">
            <div class="col-md-12">
                <div class="categories">
                    <div class="owl-carousel owl-theme cat-slider">
                        @foreach($categories as $category)
                        <div class="item">
                            <a href="{{route('filter',$category->name)}}">
                                <div class="categories_filter_buttons d-flex" data-id="{{$category->id}}" style="background-image: url({{asset('media/categories/'.$category->image)}});">
                                    {{$category->name}}
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="massonary-sec">
    @foreach($images as $image)
    <div class="thumbnail">
        <img src="{{asset('media/thumb/'.$image->thumbnail)}}" />
        <div class="middle">
            <div class="dwnld-btn">Download</div>
        </div>
    </div>
    @endforeach
</section>
@endsection
@push('js')
@endpush