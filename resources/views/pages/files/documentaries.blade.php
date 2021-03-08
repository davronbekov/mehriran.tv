@extends('layouts.app')

@section('content')

    {{--        Documentaries        --}}
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-8 offset-md-2 mt-4">

                <h2 class="text-danger mb-4">
                    Documentaries
                </h2>

                <div class="row">

                    @foreach($documentaries as $documentary)
                        @include('pages.pieces.video', ['file' => $documentary])
                    @endforeach

                </div>

            </div>
        </div>

    </div>

@endsection
