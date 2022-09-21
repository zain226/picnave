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

        .user_role {
            width: 300px;
            border: 1px solid #ECECEC;
            padding: 10px;
            border-radius: 10px;
        }

        .user_role_description {
            padding: 20px 10px;
            display: block;
            font-size: 18px;
            line-height: 26px;
            font-weight: 400;
            margin-top: 0;
            letter-spacing: -.2px;
            margin-bottom: 0;
            color: #1a1a1a;
            opacity: .8;
            text-align: center;
        }

        .user_role_button {
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

        .user_role_bottom {
            margin-bottom: 20px
        }

        .user_role_featured_image img {
            border-radius: 10px;
        }

        .bottom_text {
            width: 42rem;
            padding-top: 3rem;
            display: block;
            font-size: 16px;
            line-height: 25px;
            font-weight: 400;
            color: #9e9e9e;
            text-align: center;
            margin: auto;
        }
    </style>
</head>
<body>
<div style="padding-bottom: 5%;">
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

    <div style="margin-top: 6rem;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main_heading">What do you mainly want to do?</div>
                </div>
                <div class="col-md-6">
                    <div style="float: right" class="user_role">
                        <div class="user_role_featured_image">
                            <a href="{{route('user.register','consumer')}}">
                                <img class="w-100"
                                     src="https://images.pexels.com/photos/3589903/pexels-photo-3589903.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;fit=crop&amp;h=360&amp;w=712"
                                     srcset="https://images.pexels.com/photos/3589903/pexels-photo-3589903.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;fit=crop&amp;h=360&amp;w=712 1x, https://images.pexels.com/photos/3589903/pexels-photo-3589903.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;fit=crop&amp;h=360&amp;w=712 2x">
                            </a>
                        </div>
                        <div class="user_role_description">I'm here to download free photos and videos.</div>
                        <div class="user_role_bottom">
                            <a class="user_role_button w-100" href="{{route('user.register','consumer')}}">
                                I want to download
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="user_role">
                        <div class="user_role_featured_image">
                            <a href="{{route('user.register','contributor')}}">
                                <img class="w-100"
                                     src="https://images.pexels.com/photos/3589903/pexels-photo-3589903.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;fit=crop&amp;h=360&amp;w=712"
                                     srcset="https://images.pexels.com/photos/3589903/pexels-photo-3589903.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;fit=crop&amp;h=360&amp;w=712 1x, https://images.pexels.com/photos/3589903/pexels-photo-3589903.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;fit=crop&amp;h=360&amp;w=712 2x">
                            </a>
                        </div>
                        <div class="user_role_description">I'm here to share my photos and videos with the world.</div>
                        <div class="user_role_bottom" style="">
                            <a class="user_role_button w-100" href="{{route('user.register','contributor')}}">
                                I want to contribute
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bottom_text">We’ll use this info to personalize your experience. You’ll always be able to
                    both
                    download and upload photos and videos, no matter which option you choose.
                </div>
            </div>
        </div>
    </div>
</div>
@include('front.include.script')
</body>
</html>

