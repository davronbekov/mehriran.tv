@extends('layouts.app')

@section('content')

    {{--     container       --}}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                {{--        NEWS    --}}
                <div class="col-md-12 mt-4 mb-5">
                    <h2 class="text-danger mb-4">
                        News
                    </h2>

                    @if(!is_null($news))
                        @include('pages.pieces.news', ['news' => $news])
                    @endif

                </div>

                <hr class="bg-primary mx-3">
                {{--        Documentaries        --}}
                <div class="col-md-12 mt-4">
                    <h2 class="text-danger mb-4">
                        Documentaries
                    </h2>

                    <div class="row">

                        @if(!is_null($documentaries))
                            @foreach($documentaries as $documentary)
                                @include('pages.pieces.video', ['file' => $documentary])
                            @endforeach
                        @endif

                    </div>

                </div>

                <hr class="bg-primary mx-3">
                {{--        Videos        --}}
                <div class="col-md-12 mt-4">
                    <h2 class="text-danger mb-4">
                        Videos
                    </h2>

                    <div class="row">

                        @if(!is_null($videos))
                            @foreach($videos as $video)
                                @include('pages.pieces.video', ['file' => $video])
                            @endforeach
                        @endif

                    </div>

                </div>


            </div>
        </div>
    </div>

@endsection
