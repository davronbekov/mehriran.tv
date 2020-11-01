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
                <div class="col-md-12 mt-4 mb-5">
                    <h2 class="text-primary mb-4">
                        News
                    </h2>

                    @foreach($news as $item)
                        <div>
                            <img src="{{ url('/images/news_ico.png') }}" class="float-left">
                            <a href="{{ route('news.show', ['id' => $item->id]) }}" style="margin-left: 30px;" class="h4">
                                {{ $item->title }}
                            </a>
                        </div>
                    @endforeach

                </div>

                <hr class="bg-primary m-3">
                {{--        Documentaries        --}}
                <div class="col-md-12 mt-4">
                    <h2 class="text-primary mb-4">
                        Documentaries
                    </h2>

                    <div class="row">

                        <div class="col-md-4 documentary">
                            <a href="#">
                                <img src="{{ url('images/snapshots/2020/11/01/3a4371241bd4d196941739006ffadc3c.jpg') }}" width="318" height="175">
                                <img src="{{ url('images/video_play_ico.png') }}" width="61" height="48" style="position:absolute;left: 145px; top: 63px;">
                                <div class="text-white">
                                    Title
                                </div>
                            </a>
                            <div class="row">
                                <div class="col-3">
                                    <a href="">
                                        Info
                                    </a>
                                </div>
                                <div class="col-6"></div>
                                <div class="col-3">
                                    <ion-icon name="share-social-outline" style="font-size: 20px;position:relative;" class="menu_buttons"></ion-icon>
                                    Share
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                {{--      Feedback          --}}
                <div class="col-md-12 mt-5"></div>

            </div>
        </div>
    </div>

    <script>
        var playerElement = document.getElementById("player");

        var player = new Clappr.Player({
            source: 'https://api.itv.uz/hls/iptv/1088/index.m3u8?type=live&traffic=true&token=gQ5gvGp_XlpksftPgxG5vg&ip=10.128.41.73&uid=&device=web&s=webd5f7338d7ab8fcfb9ebdf5fc519999cd&e=1601998657',
            poster: 'http://clappr.io/poster.png',
            mute: true,
            height: 480,
            width: '100%'
        });

        player.attachTo(playerElement);
    </script>

@endsection
