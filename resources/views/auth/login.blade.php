<!DOCTYPE html>
<html data-locale="en-US" lang="en">
<head>
    @include('front.include.head')
    <style>
        .select_role_header {
            display: flex;
            justify-content: space-between;
            position: relative;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
            padding-top: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e8e8e8;
        }

        .select_role_header_logo {
            font-size: 19px;
            line-height: 1;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 0;
            display: flex;
            align-items: center;
            text-decoration: none;
            color: black;
        }

        .select_role_header_logo_text {
            margin-left: 1rem;
        }

        .select_role_header_logo_image {
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
        }

        .select_role_login {
            display: flex;
        }

        .select_role_login_text {
            display: block;
            font-size: 16px;
            line-height: 25px;
            font-weight: 300;
            margin-bottom: 0;
            color: #9e9e9e;
            margin-right: 1rem;
            margin-top: 9px;
        }

        .select_role_login_button {
            display: block;
            font-size: 16px;
            line-height: 25px;
            font-weight: 400;
            margin-top: 0;
            margin-bottom: 0;
            background: #05a081;
            color: #fff;
            border-color: #05a081;
            line-height: 1;
            position: relative;
            display: inline-flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            border-width: 1px;
            border-style: solid;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            white-space: nowrap;
            padding: 11px 24px;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .05);
        }

        .main_heading {
            display: block;
            font-size: 44px;
            line-height: 56px;
            font-weight: 700;
            letter-spacing: -1.5px;
            text-align: center;
            margin: 0 .5rem 3rem;
        }

        .main_sub_heading {
            display: block;
            font-size: 22px;
            line-height: 30px;
            font-weight: 300;
            margin-top: 0;
            letter-spacing: -.25px;
            margin-bottom: 28px;
            color: #1a1a1a;
            opacity: .8;
            text-align: center;
        }
        .signup_img{
            padding: 20px;
            background: #05A081;
            height: 100%;
            border-radius: 11px;
            color: white;
        }
        .br-10{
            border-radius: 10px;
        }
    </style>
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
                        <div class="select_role_login_text">New Here?</div>
                        <a class="select_role_login_button" href="{{route('select.role')}}">
                            Join
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
                            <form class="new_user" id="new_user" action="{{route('login')}}" accept-charset="UTF-8"
                                  method="post">
                                @csrf
                                <div>
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <input type="email" required name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <input type="password" required name="password" class="form-control" id="exampleFormControlInput1" placeholder=".............">
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
