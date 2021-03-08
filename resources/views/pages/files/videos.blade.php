@extends('layouts.app')

@section('content')

    {{--        Videos        --}}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-4">
                <h2 class="text-danger mb-4">
                    TV Programmes
                </h2>

                <div class="row">

                    @foreach($videos as $video)
                        @include('pages.pieces.video', ['file' => $video])
                    @endforeach

                </div>

            </div>
        </div>
    </div>

@endsection
