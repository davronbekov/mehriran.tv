@extends('layouts.app')

@section('content')

    {{--     container       --}}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                {{--         featured               --}}
                <div class="col-md-12">
                    {{--       Desktop   --}}
                    <div id="featured_pc" class="d-none d-md-block d-lg-block">
                        <div id="featured_caption_pc">
                            Immortal Hertitage of Ancient Iran
                            Order a 7-Documentary Package for 149 US$
                            including postage and GST (VAT)
                        </div>
                        <img src="{{ url('/images/slider/1.png') }}" class="d-block w-100" alt="Slider">
                    </div>

                    {{--     Mobile   --}}
                    <div id="featured_mobile" class="d-sm-block d-md-none d-lg-none">
                        <div id="featured_caption_mobile">
                            Immortal Hertitage of Ancient Iran
                            Order a 7-Documentary Package for 149 US$
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
                <div class="col-md-12 mt-4 mb-5">
                    <h2 class="text-primary mb-4">
                        News
                    </h2>

                    @foreach($news as $item)
                        <div>
                            <img src="{{ url('/images/news_ico.png') }}" class="float-left">
                            <a href="{{ route('news.show', ['id' => $item->id, 'lang' => app()->getLocale()]) }}" >
                                <p class="h3 ml-5 text-dark">
                                    {{ $item->title }}
                                </p>
                            </a>
                        </div>
                    @endforeach

                </div>

                <hr class="bg-primary mx-3">
                {{--        Documentaries        --}}
                <div class="col-md-12 mt-4">
                    <h2 class="text-primary mb-4">
                        Documentaries
                    </h2>

                    <div class="row">

                        @foreach($documentaries as $documentary)

                            <div class="col-md-4 documentary">
                                <a href="#" data-toggle="modal" data-target="#file_modal_{{$documentary->id}}">
                                    <img src="{{ url($documentary->relationSnapshot->getUrl()) }}" width="318" height="175">
                                    <img src="{{ url('images/video_play_ico.png') }}" width="61" height="48" style="position:absolute;left: 145px; top: 63px;">
                                    <div class="text-white pl-3">
                                        {{ $documentary->relationParams->title }}
                                    </div>
                                </a>
                                <div class="row">
                                    <div class="col-3">
                                        <a href="#" data-toggle="modal" data-target="#file_modal_{{$documentary->id}}">
                                            Info
                                        </a>
                                    </div>
                                    <div class="col-6"></div>
                                    <div class="col-3">
                                        <a href="">
                                            <ion-icon name="share-social-outline" style="font-size: 20px;position:absolute;left: 0.5rem;top:0.5rem" class="menu_buttons"></ion-icon>
                                            <span style="padding-left: 1rem">Share</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="modal" tabindex="-1" id="file_modal_{{$documentary->id}}">
                                <div class="modal-dialog" style="max-width: 800px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $documentary->relationParams->title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <b>Trailer</b>
                                                </div>
                                                <div class="col-md-12">
                                                    <div id="file_player_{{$documentary->id}}"></div>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <a href="" class="float-right">
                                                        <ion-icon name="share-social-outline" style="font-size: 20px;position:absolute;right: 3.5rem;" class="menu_buttons"></ion-icon>
                                                        <span style="padding-left: 1rem">Share</span>
                                                    </a>
                                                </div>
                                                <div class="col-md-12">
                                                    {!! $documentary->relationParams->description !!}
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            var playerElement = document.getElementById("file_player_{{$documentary->id}}");

                                            var player = new Clappr.Player({
                                                source: '{{ $documentary->getFileUrl() }}',
                                                poster: '{{ url($documentary->relationSnapshot->getUrl()) }}',
                                                mute: true,
                                                height: 360,
                                                width: '100%'
                                            });

                                            player.attachTo(playerElement);
                                        </script>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>

                <hr class="bg-primary m-3  mt-5">
                {{--      Feedback          --}}
                <div class="col-md-12 mt-5">
                    <h2 class="text-primary mb-5">
                        ONLINE INQUIRY
                    </h2>

                    <div class="row" style="background-color: #EAEAEC">
                        <div class="col-md-6">
                            <img src="{{ url('images/feedback_ico.png') }}" class="w-50" style="margin:5rem 0 5rem 25%;">
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('feedback', ['lang' => app()->getLocale()]) }}" method="POST" class="w-75" style="margin-left: 12.5%; margin-top: 3rem">
                                @csrf

                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Your name" name="name" required>
                                </div>

                                <div class="input-group mt-3">
                                    <input type="text" class="form-control" placeholder="Your phone" name="phone" required>
                                </div>

                                <div class="input-group mt-3">
                                    <input type="email" class="form-control" placeholder="Your email" name="email" required>
                                </div>

                                <div class="input-group mt-3">
                                    <textarea name="text" class="form-control" placeholder="Enter your message..." rows="5" required></textarea>
                                </div>

                                <div class="mt-3" id="feedback_captcha"></div>

                                <div class="input-group mt-3 mb-5">
                                    <input type="submit" id="feedback_btn" class="form-control bg-light w-50" value="Send">
                                </div>

                            </form>

                            <script type="text/javascript">
                                var onloadCallback = function() {
                                    grecaptcha.render('feedback_captcha', {
                                        'sitekey' : '6Lc8fOAZAAAAAJp0rE6goXsOjgp8B8VHblCEvnTS',
                                        'callback' : correctCaptcha
                                    });
                                };

                                var correctCaptcha = function(response) {
                                    if(response.length !== 0){
                                        var btn = $('#feedback_btn');
                                        btn.removeClass('bg-light');
                                        btn.addClass('bg-primary');
                                    }
                                };

                                function rescaleCaptcha(){
                                    var width = $('#feedback_captcha').parent().width();
                                    var scale;
                                    if (width < 302) {
                                        scale = width / 302;
                                    } else{
                                        scale = 1.0;
                                    }

                                    $('#feedback_captcha').css('transform', 'scale(' + scale + ')');
                                    $('#feedback_captcha').css('-webkit-transform', 'scale(' + scale + ')');
                                    $('#feedback_captcha').css('transform-origin', '0 0');
                                    $('#feedback_captcha').css('-webkit-transform-origin', '0 0');
                                }

                                rescaleCaptcha();
                                $( window ).resize(function() { rescaleCaptcha(); });
                            </script>

                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

    @if($subscribe_action)
        <div class="modal" tabindex="-1" id="subscriber_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Success!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Subscribed!
                        </p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('home') }}" class="btn btn-secondary" >Ok</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            setTimeout(function () {
                $('#subscriber_modal').modal('show')
            }, 800)
        </script>
    @endif
    @if($feedback_action)
        <div class="modal" tabindex="-1" id="subscriber_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Success!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Your inquire was sent!
                        </p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('home') }}" class="btn btn-secondary" >Ok</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            setTimeout(function () {
                $('#subscriber_modal').modal('show')
            }, 800)
        </script>
    @endif

    <script>
        var playerElement = document.getElementById("player");

        var player = new Clappr.Player({
            source: 'https://api.itv.uz/hls/iptv/1082/index.m3u8?type=live&traffic=true&token=gQ5gvGp_XlpksftPgxG5vg&ip=10.128.41.73&uid=&device=web&s=webd5f7338d7ab8fcfb9ebdf5fc519999cd&e=1601998657',
            poster: 'http://clappr.io/poster.png',
            mute: true,
            height: 480,
            width: '100%'
        });

        player.attachTo(playerElement);
    </script>

@endsection
