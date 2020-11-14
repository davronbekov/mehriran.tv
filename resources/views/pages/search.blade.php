@extends('layouts.app')

@section('content')

    {{--     container       --}}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                {{--        NEWS    --}}
                <div class="col-md-12 mt-4 mb-5">
                    <h2 class="text-primary mb-4">
                        News
                    </h2>

                    @foreach($news as $item)
                        <div>
                            <img src="{{ url('/images/news_ico.png') }}" class="float-left">
                            <a href="{{ route('news.show', ['id' => $item->id, 'lang' => app()->getLocale()]) }}" style="margin-left: 30px;" class="h4">
                                {{ $item->title }}
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

                <hr class="bg-primary mx-3">
                {{--        Videos        --}}
                <div class="col-md-12 mt-4">
                    <h2 class="text-primary mb-4">
                        Videos
                    </h2>

                    <div class="row">

                        @foreach($videos as $video)

                            <div class="col-md-4 documentary">
                                <a href="#" data-toggle="modal" data-target="#file_modal_{{$video->id}}">
                                    <img src="{{ url($video->relationSnapshot->getUrl()) }}" width="318" height="175">
                                    <img src="{{ url('images/video_play_ico.png') }}" width="61" height="48" style="position:absolute;left: 145px; top: 63px;">
                                    <div class="text-white pl-3">
                                        {{ $video->relationParams->title }}
                                    </div>
                                </a>
                                <div class="row">
                                    <div class="col-3">
                                        <a href="#" data-toggle="modal" data-target="#file_modal_{{$video->id}}">
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

                            <div class="modal" tabindex="-1" id="file_modal_{{$video->id}}">
                                <div class="modal-dialog" style="max-width: 800px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $video->relationParams->title }}</h5>
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
                                                    <div id="file_player_{{$video->id}}"></div>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <a href="" class="float-right">
                                                        <ion-icon name="share-social-outline" style="font-size: 20px;position:absolute;right: 3.5rem;" class="menu_buttons"></ion-icon>
                                                        <span style="padding-left: 1rem">Share</span>
                                                    </a>
                                                </div>
                                                <div class="col-md-12">
                                                    {!! $video->relationParams->description !!}
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            var playerElement = document.getElementById("file_player_{{$video->id}}");

                                            var player = new Clappr.Player({
                                                source: '{{ $video->getFileUrl() }}',
                                                poster: '{{ url($video->relationSnapshot->getUrl()) }}',
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


            </div>
        </div>
    </div>

@endsection