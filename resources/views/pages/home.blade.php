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
                <div class="col-md-12 mt-4"></div>
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
