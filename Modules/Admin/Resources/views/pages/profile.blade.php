@extends('layouts.admin')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Account Settings</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Account Settings
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- account setting page -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column nav-left">
                                <!-- general -->
                                <li class="nav-item">
                                    <a class="nav-link active" id="account-pill-general" data-toggle="pill"
                                       href="#account-vertical-general" aria-expanded="true">
                                        <i data-feather="user" class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">General</span>
                                    </a>
                                </li>
                                <!-- change password -->
                                <li class="nav-item">
                                    <a class="nav-link" id="account-pill-password" data-toggle="pill"
                                       href="#account-vertical-password" aria-expanded="false">
                                        <i data-feather="lock" class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">Change Password</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--/ left menu section -->

                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                             aria-labelledby="account-pill-general" aria-expanded="true">


                                            <!-- form -->
                                            <form class="validate-form mt-2" action="{{route('admin.profile.submit')}} "
                                                  method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div
                                                        class="d-flex justify-content-between flex-column col-md-12 col-xl-6 col-21"
                                                        style="width: 128px;">
                                                        <div class="d-flex justify-content-start"><span
                                                                class="b-avatar badge-light-danger rounded"
                                                                style="width: 80px; height: 80px;"><span
                                                                    class="b-avatar-img"><img class="profile-img"
                                                                                              src="{{$user->image}}"
                                                                                              alt="avatar" width="100%"></span></span>
                                                            <div class="d-flex flex-column ml-1">
                                                                <label for="account-upload"
                                                                       class="btn btn-sm btn-primary mb-75 mr-75 ">Upload</label>
                                                                <input type="file" name="image"
                                                                       class="upload-image" id="account-upload" hidden
                                                                       accept="image/*"/>
                                                                <button type="button"
                                                                        class="btn mb-75 mr-75 btn-outline-secondary btn-sm reset-image">
                                                                    Reset
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <p class="card-text">Allowed JPG or PNG. Max size 800kB.</p>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="account-username">Username</label>
                                                            <input type="text" class="form-control"
                                                                   id="account-username" name="user_name"
                                                                   placeholder="Username" value="{{$user->user_name}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="account-name">Name</label>
                                                            <input type="text" class="form-control" id="account-name"
                                                                   name="name" placeholder="Name"
                                                                   value="{{$user->name}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="account-e-mail">E-mail</label>
                                                            <input type="email" class="form-control" id="account-e-mail"
                                                                   name="email" readonly placeholder="Email"
                                                                   value="{{$user->email}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="account-company">Role</label>
                                                            <input type="text" class="form-control" id="account-company"
                                                                   name="company" placeholder="Company name"
                                                                   value="{{ucfirst($user->role)}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mt-2 mr-1">Save
                                                            changes
                                                        </button>
                                                        <button type="reset" class="btn btn-outline-secondary mt-2">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!--/ form -->
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-password" role="tabpanel"
                                             aria-labelledby="account-pill-password" aria-expanded="false">
                                            <!-- form -->
                                            <form class="validate-form" action="{{route('admin.change.password')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="account-new-password">New Password</label>
                                                            <div
                                                                class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" id="account-new-password"
                                                                       name="password" class="form-control"
                                                                       placeholder="New Password"/>
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text cursor-pointer">
                                                                        <i data-feather="eye"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('password')
                                                            <p class="error">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="account-retype-new-password">Retype New
                                                                Password</label>
                                                            <div
                                                                class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" class="form-control"
                                                                       id="account-retype-new-password"
                                                                       name="confirm_password"
                                                                       placeholder="New Password"/>
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text cursor-pointer"><i
                                                                            data-feather="eye"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mt-1">Save
                                                            changes
                                                        </button>
                                                        <button type="reset" class="btn btn-outline-secondary mt-1">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!--/ form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ right content section -->
                    </div>
                </section>
                <!-- / account setting page -->

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            var readURL = function (input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.profile-img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".upload-image").on('change', function () {
                readURL(this);
            });
            $(".reset-image").on('click', function () {
                let image = '{{$user->image}}';
                $('.profile-img').attr('src', image);
            });

        });
    </script>
@endsection
