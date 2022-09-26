<header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <h1 class="logo me-auto me-lg-0"><a href="{{route('home')}}">PIC NAVE</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="active" href="{{route('home')}}">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Resume</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <div class="header-social-links">
            @if(Auth::user())
                <div class="btn-group">
                    <button type="button" class="btn btn-transparent  dropdown_button">
                        <img src="{{asset('img/orange.png')}}" class="profile_header_image">
                    </button>
                    <div class="dropdown-menu show_dropdown_btn mt-60">
                        <a class="dropdown-item" href="{{route('photographer.dashboard')}}">
                            My Space
                        </a>
                        <a class="dropdown-item" href="{{route('photographer.profile.edit')}}">Pofile</a>
                        <a class="dropdown-item" href="#">Collection</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </div>
            @else
                <a href="{{route('select.role')}}">
                    <button class="btn btn-primary">Join</button>
                </a>
            @endif
            <a href="{{route('select.role')}}">
                <button class="btn btn-primary">Upload</button>
            </a>
        </div>

    </div>

</header>


