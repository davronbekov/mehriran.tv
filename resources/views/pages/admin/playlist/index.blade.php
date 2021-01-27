@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-1">
                        <a href="#">
                            <i class="fa fa-info"></i>
                            Playlist
                        </a>
                    </h5>
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item">
                        <a href="{{ route('admin.filebrowser.index') }}">
                            Add
                        </a>
                    </li>

                </ul>

            </div>
        </div>

        <div class="col-md-10">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Filename</th>
                    <th scope="col">Starts</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($playlist as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->filename }}</td>
                        <td>{{ $item->starts }}</td>
                        <td>{{ $item->duration }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.playlist.edit', $item->id) }}">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

                {{ $playlist->links() }}
            </table>
        </div>
    </div>

@endsection
