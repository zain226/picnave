@extends('layouts.admin')
@section('title', 'Categories')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css/pages/page-profile.css')}}">
    <style>
        .ms-3 {
            margin-left: 3rem;
        }
    </style>
@endpush
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <div id="user-profile">
                    <div class="row">
                        <div class="col-12">
                            <div class="card profile-header mb-2">
                                <img class="card-img-top"
                                     src="{{asset('assets/admin/app-assets/images/profile/user-uploads/timeline.jpg')}}"
                                     alt="User Profile Image"/>
                                <div class="position-relative">
                                    <div class="profile-img-container d-flex align-items-center">
                                        <div class="profile-img">
                                            <img src="{{$user->image}}"
                                                 class="rounded img-fluid" alt="Card image"/>
                                        </div>
                                        <div class="profile-title ms-3">
                                            <h2 class="text-white">{{$user->name}}</h2>
                                        </div>
                                    </div>
                                </div>

                                <!-- tabs pill -->
                                <div class="profile-header-nav">
                                    <!-- navbar -->
                                    <nav
                                        class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                        <button class="btn btn-icon navbar-toggler" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                                aria-label="Toggle navigation">
                                            <i data-feather="align-justify" class="font-medium-5"></i>
                                        </button>

                                        <!-- collapse  -->
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <div
                                                class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                                                <ul class="nav nav-pills mb-0">
                                                    <li class="nav-item">
                                                        <a class="nav-link fw-bold active" href="#">
                                                            <span class="d-none d-md-block">About</span>
                                                            <i data-feather="rss" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- edit button -->
                                                <a href="{{route('admin.photographer.toggle.status',$user->id)}}"
                                                   class="btn btn-primary">
                                                    <i data-feather="edit" class="d-block d-md-none"></i>
                                                    <span class="fw-bold d-none d-md-block">
                                                        @if($user->status == '1')
                                                            Un Approve
                                                        @else
                                                            Approve
                                                        @endif
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <!--/ collapse  -->
                                    </nav>
                                    <!--/ navbar -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ profile header -->

                    <!-- profile info section -->
                    <section id="profile-info">
                        <div class="row">
                            <div class="col-lg-4 col-12 order-2 order-lg-1">
                                <!-- about -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-75">About</h5>
                                        <p class="card-text">
                                            {{$user->bio}}
                                        </p>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Joined:</h5>
                                            <p class="card-text">{{$user->created_at->format('M d,Y')}}</p>
                                        </div>

                                        <div class="mt-2">
                                            <h5 class="mb-75">Email:</h5>
                                            <p class="card-text">{{$user->email}}</p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-50">Instagram Link:</h5>
                                            <p class="card-text mb-0">{{$user->instagram_link}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-12 order-3">
                                <!-- latest profile pictures -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-0">Latest Photos</h5>
                                        <div class="row">
                                            @if($images->count() > 0)
                                                @foreach($images as $image)
                                                    <div class="col-md-6 col-6 profile-latest-img">
                                                        <a href="#">
                                                            <img
                                                                src="{{asset('media/thumb/'.$image->thumbnail)}}"
                                                                class="img-fluid rounded" alt="avatar img"/>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>Sorry! There are no images</p>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@push('js')
    <script src="{{asset('assets/admin/app-assets/js/fetchRecord.js')}}"></script>
@endpush
