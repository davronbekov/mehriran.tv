<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta property='og:title' content='Mehriran.TV'/>
    <meta property='og:url' content='{{ request()->fullUrl() }}'/>

    <title>Mehriran.TV</title>

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">

    <script type="application/javascript" src="{{ asset('/js/app.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script type="application/javascript" src="{{ asset('/js/my.js') }}"></script>
</head>
<body class="container-fluid">

    <div class="row" id="app">

        {{--     header      --}}
        <header class="col-md-12 col-lg-12">

            <div class="row">
                {{--         Desctop version           --}}
                <div class="col-lg-10 offset-lg-1 col-md-12 d-none d-lg-block">

                    <div class="row pt-4">
                        <form class="col-md-5" action="{{ route('home', ['lang' => app()->getLocale()]) }}">

                            <div class="input-group" style="width: 60%;">
                                <input type="email" class="form-control" placeholder="E-mail" name="email">
                                <div class="input-group-append">
                                    <button class="btn red_color text-white" type="submit" name="button" value="subscribe">Subscribe</button>
                                </div>
                            </div>

                            <div class="mt-4 text-white header_contacts">
                                <div><ion-icon name="call-outline"></ion-icon></div>
                                <div>+1 (415) 685 8888</div>
                            </div>

                            <div class="mt-1 text-white header_contacts">
                                <div><ion-icon name="mail-outline"></ion-icon></div>
                                <div>info@mehriran.tv</div>
                            </div>

                            <div class="input-group mt-3" style="width: 60%">
                                <form action="HELLo">
                                    <input type="text" class="form-control" placeholder="Text..." name="search">
                                    <div class="input-group-append">
                                        <button class="btn red_color text-white" type="submit" name="button" value="search">
                                            <ion-icon name="search-outline"></ion-icon>
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </form>
                        <a class="col-md-2" href="{{ route('home', ['lang' => app()->getLocale()]) }}"></a>
                        <div class="col-md-5 text-right">

                            <div id="header_languages">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#">English</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">Русский</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">دری-پارسی</a>
                                    </li>
                                </ul>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#">EIRANIK</a>
                                    </li>
                                </ul>
                            </div>

                            {{--      Google translate button        --}}
                            <div id="lang_switch">
                                <div id="google_translate_element"></div>

                                <script type="text/javascript">
                                    function googleTranslateElementInit() {
                                        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
                                    }
                                </script>
                            </div>
                            {{--      Google translate button end      --}}

                            <div class="mt-3 text-white header_contacts"  id="header_welcome">
                                <div><ion-icon name="person-outline"></ion-icon></div>
                                <div>
                                    <h3>
                                        Welcome
                                        <span>
                                            @auth
                                                <a href="{{ route('profile.index', ['lang' => app()->getLocale()]) }}" class="text-white">Profile</a>
                                                @if(auth()->user()->is_admin)
                                                    /
                                                    <a href="{{ url('/admin/main/') }}" class="text-white">Admin Panel</a>
                                                @endif
                                            @else
                                                <a href="#" class="text-white" data-toggle="modal" data-target="#login_modal">
                                                    Login
                                                </a>
                                                /
                                                <a href="#" class="text-white" data-toggle="modal" data-target="#register_modal">
                                                    Register
                                                </a>
                                            @endauth

                                        </span>
                                    </h3>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                {{--         Desctop version  end     --}}

                {{--         Mobile version           --}}
                <div class="col-md-12 d-sm-block d-md-block d-lg-none">

                    <div class="row">
                        <div class="col-6">

                            <div class="dropdown mt-3 border-white">
                                <button class="btn btn-danger red_color dropdown-toggle border-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    English
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">English</a>
                                    <a class="dropdown-item" href="#">Русский</a>
                                    <a class="dropdown-item" href="#">دری-پارسی</a>
                                    <a class="dropdown-item" href="#">EIRANIK</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-6"></div>
                    </div>

                </div>
                <a class="col-md-12 d-sm-block d-md-block d-lg-none" id="mobile_logo_clicker" href="{{ route('home', ['lang' => app()->getLocale()]) }}"></a>
                {{--         Mobile version end       --}}
            </div>

        </header>
        {{--     sub header      --}}
        <div class="col-md-12" id="header_menu">

            <nav class="navbar navbar-expand-lg">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmenulist" aria-controls="navbarmenulist" aria-expanded="false" aria-label="Toggle navigation">
                    <ion-icon name="menu-outline" class="text-white" style="font-size: 30px;"></ion-icon>
                </button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmenusearch" aria-controls="navbarmenusearch" aria-expanded="false" aria-label="Toggle navigation">
                    <ion-icon name="search-outline" class="text-white" style="font-size: 30px;"></ion-icon>
                </button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmenusubscribe" aria-controls="navbarmenusubscribe" aria-expanded="false" aria-label="Toggle navigation">
                    <ion-icon name="mail-outline" class="text-white" style="font-size: 30px;"></ion-icon>
                </button>

                <a class="navbar-toggler" href="#" data-toggle="modal" data-target="#login_modal">
                    <ion-icon name="person-outline" class="text-white" style="font-size: 30px;"></ion-icon>
                </a>

                {{--              MenuList              --}}
                <div class="collapse navbar-collapse justify-content-center" id="navbarmenulist">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="{{ route('home', app()->getLocale()) }}">
                                HOME
                            </a>
                        </li>
                        <li class="nav-item d-none d-md-none d-lg-block">
                            <a class="nav-link" href="#">
                                <ion-icon name="radio-button-on-outline" class="menu_buttons"></ion-icon>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('about', app()->getLocale()) }}">
                                ABOUT US
                            </a>
                        </li>
                        <li class="nav-item d-none d-md-none d-lg-block">
                            <a class="nav-link" href="#">
                                <ion-icon name="radio-button-on-outline" class="menu_buttons"></ion-icon>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('files.videos', app()->getLocale()) }}">
                                TV PROGRAMMES
                            </a>
                        </li>
                        <li class="nav-item d-none d-md-none d-lg-block">
                            <a class="nav-link" href="#">
                                <ion-icon name="radio-button-on-outline" class="menu_buttons"></ion-icon>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('files.documentaries', app()->getLocale()) }}">
                                DOCUMENTARIES
                            </a>
                        </li>
                        <li class="nav-item d-none d-md-none d-lg-block">
                            <a class="nav-link" href="#">
                                <ion-icon name="radio-button-on-outline" class="menu_buttons"></ion-icon>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('news.index', app()->getLocale()) }}">
                                NEWS
                            </a>
                        </li>
                        <li class="nav-item d-none d-md-none d-lg-block">
                            <a class="nav-link" href="#">
                                <ion-icon name="radio-button-on-outline" class="menu_buttons"></ion-icon>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('articles.index', app()->getLocale()) }}">
                                ARTICLES
                            </a>
                        </li>
                        <li class="nav-item d-none d-md-none d-lg-block">
                            <a class="nav-link" href="#">
                                <ion-icon name="radio-button-on-outline" class="menu_buttons"></ion-icon>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('contacts', app()->getLocale()) }}">
                                CONTACT US
                            </a>
                        </li>
                        <li class="nav-item d-none d-md-none d-lg-block menu_buttons_share">
                            <a href="#" class="text-white" data-toggle="modal" data-target="#share_modal" style="vertical-align: sub">
                                Tell your friend
                                <ion-icon name="share-social-outline" class="menu_buttons" style="color:#FFF !important;"></ion-icon>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-12 d-sm-block d-md-block d-lg-none">
                    {{--           Search                 --}}
                    <div class="collapse navbar-collapse justify-content-center" id="navbarmenusearch">
                        <form class="col-md-6" action="{{ route('home', ['lang' => app()->getLocale()]) }}">
                            <div class="input-group mt-3">
                                <input type="text" class="form-control" placeholder="Text..." name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" name="button" value="search">
                                        <ion-icon name="search-outline"></ion-icon>
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                    {{--           Subscribe                 --}}
                    <div class="collapse navbar-collapse justify-content-center" id="navbarmenusubscribe">
                        <form class="col-md-6" action="{{ route('home', ['lang' => app()->getLocale()]) }}">

                            <div class="input-group mt-3">
                                <input type="email" class="form-control" placeholder="E-mail" name="email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" name="button" value="subscribe">Subscribe</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>


            </nav>

        </div>

        <div style="height: 30px;width: 30px;"></div>

        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        @yield('content')

        {{--        footer   --}}
        <div class="col-md-12 mt-5 py-3 red_color">
            <div class="row">
                <div class="offset-lg-2 col-md-12 col-lg-8">
                    <div class="row">
                        <div class="col-md-4">
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmehrglobalaustralia&tabs=timeline&width=&height=205&small_header=true&adapt_container_width=false&hide_cover=true&show_facepile=true&appId" width="100%" height="205" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        </div>
                        <div class="col-md-4 mb-2">
                            <a href="https://www.youtube.com/channel/UC_tSU1pitB4dUVMRuXaQniQ/" target="_blank">
                                <img src="{{ url('images/youtube_banner.png') }}" alt="youtube" style="max-width: 100%" height="205">
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a class="twitter-timeline" data-height="205" href="https://twitter.com/MehriranTV?ref_src=twsrc%5Etfw">Tweets by MehriranTV</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer_divider_line" class="col-md-12"></div>

        <footer class="col-md-12">
            <div class="row">
                <div class="col-md-12 offset-lg-1 col-lg-10">
                    <div class="row">
                        <div class="col-md-12 d-none d-md-block d-lg-block">
                            <nav class="navbar navbar-expand-lg navbar-expand-md justify-content-center px-0">

                                <div class="justify-content-center">
                                    <ul class="navbar-nav">
                                        <li class="nav-item active">
                                            <a class="nav-link text-white" href="{{ route('home', app()->getLocale()) }}">
                                                HOME
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="{{ route('about', app()->getLocale()) }}">
                                                ABOUT US
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="{{ route('files.videos', app()->getLocale()) }}">
                                                TV PROGRAMMES
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="{{ route('files.documentaries', app()->getLocale()) }}">
                                                DOCUMENTARIES
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="{{ route('news.index', app()->getLocale()) }}">
                                                NEWS
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="{{ route('articles.index', app()->getLocale()) }}">
                                                ARTICLES
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="{{ route('contacts', app()->getLocale()) }}">
                                                CONTACT US
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </nav>
                        </div>
                        <div class="col-md-4 mt-3">
                            <img src="{{ url('/images/logo.png') }}" alt="">
                        </div>
                        <div class="col-md-8 mt-3">

                            <div class="row">
                                <div class="col-md-12">
                                    <hr class="footer_gold_color w-100">
                                </div>
                                <div class="col-md-5">
                                    <div class="text-white footer_contacts">
                                        <div><ion-icon name="call-outline"></ion-icon></div>
                                        <div>+1 (415) 685 8888</div>
                                    </div>

                                    <div class="mt-1 text-white footer_contacts">
                                        <div><ion-icon name="call-outline"></ion-icon></div>
                                        <div>+61 (0) 3 9863 8169</div>
                                    </div>

                                    <div class="mt-1 text-white footer_contacts">
                                        <div><ion-icon name="mail-outline"></ion-icon></div>
                                        <div>info@mehriran.tv</div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="text-white">
                                        <div class="mt-2">
                                            St. Kilda Road towers
                                            level 1, 1 Queens Road
                                            Melbourne, Victoria 3004 Australia
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr class="footer_gold_color w-100">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="text-center">
                                <a href="https://www.facebook.com/mehrglobalaustralia/" target="_blank">
                                    <img src="{{ url('images/icons/facebook.jpg') }}" width="50" height="50">
                                </a>
                                <a href="https://www.instagram.com/mehrglobal/" target="_blank">
                                    <img src="{{ url('images/icons/instagram.png') }}" width="50" height="50">
                                </a>
                                <a href="https://twitter.com/MehriranTV" target="_blank">
                                    <img src="{{ url('images/icons/twitter.png') }}" width="50" height="50">
                                </a>
                                <a href="https://www.youtube.com/channel/UC_tSU1pitB4dUVMRuXaQniQ" target="_blank">
                                    <img src="{{ url('images/icons/youtube.png') }}" width="50" height="50">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div id="footer_copyright">
                                Copyright © MehriranTV 2012 - <?= date('Y') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    @auth
        {{--  Authed      --}}
    @else
        @include('auth.login')
        @include('auth.register')
    @endauth

    @include('pages.shareButtons')

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    <script type="text/javascript" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>
</html>
