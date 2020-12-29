@extends('layouts.app')

@section('content')

    {{--     container       --}}
    <div class="col-lg-8 offset-lg-2 col-md-12">
        <div class="row">

            {{--         featured               --}}
            <div class="col-md-12">
                {{--       Desktop   --}}
                <div id="featured_pc" class="d-none d-lg-block">
                    <div id="featured_caption_pc">
                        Immortal Hertitage of Ancient Iran
                        Order a 7-Documentary Package for 149 US$
                        including postage and GST (VAT)
                    </div>
                    <img src="{{ url('/images/slider/1.png') }}" class="d-block w-100" alt="Slider">
                </div>

                {{--     Mobile   --}}
                <div id="featured_mobile" class="d-sm-block d-md-block d-lg-none">
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

            <hr class="bg-danger mx-3 mt-5 w-100">

            {{--        NEWS    --}}
            <div class="col-md-12 mt-4 mb-5">
                <h2 class="text-danger mb-4">
                    News
                </h2>

                @include('pages.pieces.news', ['news' => $news])

            </div>

            <hr class="bg-danger mx-3 w-100">
            {{--        Documentaries        --}}
            <div class="col-md-12 mt-4">
                <h2 class="text-danger mb-4">
                    Documentaries
                </h2>

                <div class="row">

                    @foreach($documentaries as $documentary)
                        @include('pages.pieces.video', ['file' => $documentary])
                    @endforeach

                </div>

            </div>

            <hr class="bg-danger mx-3 w-100">
            {{--        TV Programmes        --}}
            <div class="col-md-12 mt-4">
                <h2 class="text-danger mb-4">
                    TV Programmes
                </h2>

                <div class="row">

                    @foreach($videos as $video)
                        @include('pages.pieces.video', ['file' => $video])
                    @endforeach

                </div>

            </div>

            <hr class="bg-danger mx-3 mt-5 w-100">

            {{--        Articles    --}}
            <div class="col-md-12 mb-5">
                <h2 class="text-danger mb-4">
                    Articles
                </h2>

                @include('pages.pieces.news', ['news' => $articles])

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
