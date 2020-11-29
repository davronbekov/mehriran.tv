@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center my-3">
                <h4>Choose</h4>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.video.create', [
                            'path' => ($data['path']),
                            'name' => ($data['name']),
                            'ext' => ($data['ext'])
                           ]) }}" class="card">
                    <div class="card-body">
                        Video
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.documentary.create', [
                            'path' => ($data['path']),
                            'name' => ($data['name']),
                            'ext' => ($data['ext'])
                           ]) }}" class="card">
                    <div class="card-body">
                        Documentaries
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.playlist.create', [
                            'path' => ($data['path']),
                            'name' => ($data['name']),
                            'ext' => ($data['ext'])
                           ]) }}" class="card">
                    <div class="card-body">
                        Playlist
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection
