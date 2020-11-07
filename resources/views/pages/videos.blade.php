@extends('layouts.app')

@section('content')

    {{--        Videos        --}}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-4">
                <h2 class="text-primary mb-4">
                    Videos
                </h2>

                <div class="row">

                    @foreach($videos as $video)

                        <div class="col-md-4 documentary">
                            <a href="#">
                                <img src="{{ url($video->relationSnapshot->getUrl()) }}" width="318" height="175">
                                <img src="{{ url('images/video_play_ico.png') }}" width="61" height="48" style="position:absolute;left: 145px; top: 63px;">
                                <div class="text-white pl-3">
                                    {{ $video->relationParams->title }}
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
                                    <a href="">
                                        <ion-icon name="share-social-outline" style="font-size: 20px;position:absolute;left: 0.5rem;top:0.5rem" class="menu_buttons"></ion-icon>
                                        <span style="padding-left: 1rem">Share</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

            </div>
        </div>
    </div>

@endsection
