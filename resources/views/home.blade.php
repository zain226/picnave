@extends('layouts.app')
@section('title', 'Images')
@section('content')

    <section id="hero" class="d-flex align-items-center">
        <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
            <h1>Kelly Adams</h1>
            <h2>I'm a professional illustrator from San Francisco</h2>
            <a href="about.html" class="btn-about">About Me</a>
        </div>
    </section>
    <div class="container-fluid mt-45p">
        <div class="row">
            <div class="col-md-12">
                <div class="categories">
                    @foreach($categories as $category)
                        <div class="slick_buttons">

                            <a href="{{route('filter',$category->name)}}"><div  class="categories_filter_buttons d-flex" data-id="{{$category->id}}">
                                <img src="{{asset('media/categories/'.$category->image)}}" height="20px" width="20px"
                                     style="margin-right:10px;border-radius: 50%">
                                {{$category->name}}
                                </div></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid images_section mt-45p">
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

