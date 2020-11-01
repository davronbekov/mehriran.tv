<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Mehriran.TV</title>

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">

    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js">
    </script>
</head>
    <body class="container-fluid">

        <div class="row" id="app">

            {{--     header      --}}
            <header class="col-md-12">

                <div class="row">
                    {{--         Desctop version           --}}
                    <div class="col-md-8 offset-md-2 d-none d-md-block d-lg-block">

                        <div class="row pt-4">
                            <form class="col-md-6">

                                <div class="input-group w-50">
                                    <input type="text" class="form-control" placeholder="E-mail" name="email">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" name="button" value="subscribe">Subscribe</button>
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

                                <div class="input-group w-25 mt-3">
                                    <input type="text" class="form-control" placeholder="Text..." name="search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" name="button" value="search">
                                            <ion-icon name="search-outline"></ion-icon>
                                        </button>
                                    </div>
                                </div>

                            </form>

                            <div class="col-md-6 text-right">

                                <div id="header_languages">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#">English</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">Русский</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">Тоҷики</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">پارسی</a>
                                        </li>
                                    </ul>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#">Kurdi</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">کوردی</a>
                                        </li>
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
                                                <a href="#" class="text-white">
                                                    Login
                                                </a>
                                                /
                                                <a href="#" class="text-white">
                                                    Register
                                                </a>
                                            </span>
                                        </h3>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    {{--         Desctop version  end     --}}

                    {{--         Mobile version           --}}
                    <div class="col-md-12 d-sm-block d-md-none d-lg-none">

                        <div class="row">
                            <div class="col-6">

                                <div class="dropdown mt-3 border-white">
                                    <button class="btn btn-primary dropdown-toggle border-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        English
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">English</a>
                                        <a class="dropdown-item" href="#">Русский</a>
                                        <a class="dropdown-item" href="#">Тоҷики</a>
                                        <a class="dropdown-item" href="#">پارسی</a>
                                        <a class="dropdown-item" href="#">Kurdi</a>
                                        <a class="dropdown-item" href="#">کوردی</a>
                                        <a class="dropdown-item" href="#">EIRANIK</a>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">



                            </div>
                        </div>

                    </div>
                    {{--         Mobile version end       --}}
                </div>

            </header>
            {{--     sub header      --}}
            <div class="col-md-12" id="header_menu">

                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <nav class="navbar navbar-expand-lg navbar-primary bg-primary ">

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmenulist" aria-controls="navbarmenulist" aria-expanded="false" aria-label="Toggle navigation">
                                <ion-icon name="menu-outline" class="text-white" style="font-size: 30px;"></ion-icon>
                            </button>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmenusearch" aria-controls="navbarmenusearch" aria-expanded="false" aria-label="Toggle navigation">
                                <ion-icon name="search-outline" class="text-white" style="font-size: 30px;"></ion-icon>
                            </button>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmenusubscribe" aria-controls="navbarmenusubscribe" aria-expanded="false" aria-label="Toggle navigation">
                                <ion-icon name="mail-outline" class="text-white" style="font-size: 30px;"></ion-icon>
                            </button>

                            <a class="navbar-toggler">
                                <ion-icon name="person-outline" class="text-white" style="font-size: 30px;"></ion-icon>
                            </a>

                            {{--              MenuList              --}}
                            <div class="collapse navbar-collapse justify-content-center" id="navbarmenulist">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link text-white" href="#">
                                            HOME
                                        </a>
                                    </li>
                                    <li class="nav-item d-none d-md-block d-lg-block">
                                        <a class="nav-link" href="#">
                                            <ion-icon name="radio-button-on-outline" class="menu_buttons"></ion-icon>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#">
                                            ABOUT US
                                        </a>
                                    </li>
                                    <li class="nav-item d-none d-md-block d-lg-block">
                                        <a class="nav-link" href="#">
                                            <ion-icon name="radio-button-on-outline" class="menu_buttons"></ion-icon>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#">
                                            VIDEOS
                                        </a>
                                    </li>
                                    <li class="nav-item d-none d-md-block d-lg-block">
                                        <a class="nav-link" href="#">
                                            <ion-icon name="radio-button-on-outline" class="menu_buttons"></ion-icon>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#">
                                            DOCUMENTARIES
                                        </a>
                                    </li>
                                    <li class="nav-item d-none d-md-block d-lg-block">
                                        <a class="nav-link" href="#">
                                            <ion-icon name="radio-button-on-outline" class="menu_buttons"></ion-icon>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#">
                                            NEWS
                                        </a>
                                    </li>
                                    <li class="nav-item d-none d-md-block d-lg-block">
                                        <a class="nav-link" href="#">
                                            <ion-icon name="radio-button-on-outline" class="menu_buttons"></ion-icon>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#">
                                            CONTACT US
                                        </a>
                                    </li>
                                    <li class="nav-item d-none d-md-block d-lg-block">
                                        <a class="nav-link" href="#">
                                            <ion-icon name="radio-button-on-outline" class="menu_buttons"></ion-icon>
                                        </a>
                                    </li>
                                    <li class="nav-item d-none d-md-block d-lg-block menu_buttons_share">
                                        <a class="nav-link text-white" href="#">
                                            Tell your friends
                                            <ion-icon name="share-social-outline" style="font-size: 20px;" class="menu_buttons"></ion-icon>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-12 d-sm-block d-md-none d-lg-none">
                                {{--           Search                 --}}
                                <div class="collapse navbar-collapse justify-content-center" id="navbarmenusearch">
                                    <form class="col-md-6">
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
                                    <form class="col-md-6">

                                        <div class="input-group mt-3">
                                            <input type="text" class="form-control" placeholder="E-mail" name="email">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit" name="button" value="subscribe">Subscribe</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>


                        </nav>

                    </div>
                </div>

            </div>

            {{--     container       --}}
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        {{--          content sectoin              --}}
                        <div class="col-md-12"></div>

                        {{--         featured               --}}
                        <div class="col-md-12 mt-4">
                            {{--       Desktop   --}}
                            <div id="featured_pc" class="d-none d-md-block d-lg-block">
                                <div id="featured_caption_pc">
                                    Immortal Hertitage of Ancient Iran <br/>
                                    Order a 7-Documentary Package for 149 US$
                                    including postage and GST (VAT)
                                </div>
                                <img src="{{ url('/images/slider/1.png') }}" class="d-block w-100" alt="Slider">
                            </div>

                            {{--     Mobile   --}}
                            <div id="featured_mobile" class="d-sm-block d-md-none d-lg-none">
                                <div id="featured_caption_mobile">
                                    Immortal Hertitage of Ancient Iran <br/>
                                    Order a 7-Documentary Package <br/> <b>for 149 US$</b> <br/>
                                    including postage and GST (VAT)
                                </div>
                                <img src="{{ url('/images/slider/2.png') }}" class="d-block w-100" alt="Slider">
                            </div>
                        </div>

                        {{--         Video live              --}}
                        <div class="col-md-12 mt-4">
                            <div id="player"></div>
                        </div>

                        {{--        NEWS    --}}
                        <div class="col-md-12 mt-4"></div>
                    </div>
                </div>
            </div>

        </div>

        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        <script>
            var playerElement = document.getElementById("player");

            var player = new Clappr.Player({
                source: 'http://clappr.io/highline.mp4',
                poster: 'http://clappr.io/poster.png',
                mute: true,
                height: 480,
                width: '100%'
            });

            player.attachTo(playerElement);
        </script>
        <script type="application/javascript" src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
