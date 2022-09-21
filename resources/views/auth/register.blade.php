<!DOCTYPE html>
<html data-locale="en-US" lang="en">
<head>
    @include('front.include.head')
</head>
<body>
<div style="padding-bottom: 2%;">
    <div class="select_role_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-between">
                    <a class="select_role_header_logo" data-track-action="navbar" data-track-label="logo" href="/"
                       title="Free Stock Photos">
                        <div class="select_role_header_logo_image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 0 32 32">
                                <path d="M2 0h28a2 2 0 0 1 2 2v28a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"
                                      fill="#05A081"></path>
                                <path
                                    d="M13 21h3.863v-3.752h1.167a3.124 3.124 0 1 0 0-6.248H13v10zm5.863 2H11V9h7.03a5.124 5.124 0 0 1 .833 10.18V23z"
                                    fill="#fff"></path>
                            </svg>
                        </div>
                        <div class="select_role_header_logo_text" href="/">Blue Shoot</div>
                    </a>
                    <div class="select_role_login">
                        <div class="select_role_login_text">Have an account?</div>
                        <a class="select_role_login_button" href="{{route('login')}}">
                            Sign In
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 2rem">
        <div class="row">
            <div class="col-md-7">
                <div class="signup_img">
                    <img class="w-100 h-100 br-10" src="{{asset('img/signup_2.jpg')}}">
                </div>
            </div>
            <div class="col-md-5">
                <div class="">
                    <div class="">
                        <div class="">
                            <div class="main_heading">Join the Pexels community</div>
                            <div class="main_sub_heading">Take your photography to the next level. Get
                                it seen by millions.
                            </div>
                            <form class="new_user" id="new_user" action="{{route('register')}}" accept-charset="UTF-8"
                                  method="post">
                                @csrf
                                <input type="hidden" value="{{$type}}" name="type">
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" value="{{old('first_name')}}" required name="first_name" class="form-control" id="exampleFormControlInput1" placeholder="First Name">
                                                @error('first_name')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" value="{{old('last_name')}}" required name="last_name" class="form-control" id="exampleFormControlInput1" placeholder="Last Name">
                                                @error('last_name')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <input type="email" value="{{old('email')}}" required name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                                @error('email')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <input type="password" required name="password" class="form-control" id="exampleFormControlInput1" placeholder=".............">
                                                @error('password')
                                                <p class="error">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <button class="btn btn-primary w-100" >Join</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    By joining, you agree to our <a href="/terms-of-service/" rel="nofollow"
                                                                    target="_blank">Terms of Service</a> and <a
                                        href="/privacy-policy/" rel="nofollow" target="_blank">Privacy Policy</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('front.include.script')
</body>
</html>

