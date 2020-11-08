@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-1">
                        <a href="#">
                            <i class="fa fa-info"></i>
                            Videos
                        </a>
                    </h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="#">
                            List
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.video.create') }}">
                            Create
                        </a>
                    </li>

                </ul>

            </div>
        </div>

        <div class="col-md-10">
            <div class="row">
                @foreach($videoFiles as $videoFile)
                    <div class="col-md-2 text-center">
                        <a href="{{ route('admin.video.edit', $videoFile->id) }}">
                            <img src="{{ $videoFile->relationSnapshot->getUrl() }}" class="img-thumbnail">
                        </a>
                        <p>
                            Language : {{ $videoFile->language }} <br/>
                            Price : {{ $videoFile->relationParams->price }} <br/>
                        </p>
                    </div>
                @endforeach
            </div>

            {{ $videoFiles->links() }}

        </div>
    </div>

@endsection
