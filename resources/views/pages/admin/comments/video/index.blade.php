@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-1">
                        <a href="#">
                            <i class="fa fa-info"></i>
                            Comments
                        </a>
                    </h5>
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item">
                        <a href="{{ route('admin.comments.news.index') }}">
                            News
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.comments.video.index') }}">
                            Video
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
                    <th scope="col">User</th>
                    <th scope="col">File</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Status</th>
                    <th scope="col">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <th scope="row">{{ $comment->id }}</th>
                        <td>{{ $comment->relationUsers->name }}</td>
                        <td>
                            <a href="{{ route('admin.video.edit', ['id' => $comment->file_id, 'lang' => app()->getLocale()]) }}">
                                {{ $comment->relationFile->filename }}
                            </a>
                        </td>
                        <td>{{ $comment->created_at }}</td>
                        <td>
                            @if($comment->visible)
                                <h6><span class="badge bg-success text-white">Visible</span></h6>
                            @else
                                <h6><span class="badge bg-primary">Hidden</span></h6>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.comments.video.show', $comment->id) }}">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

                {{ $comments->links() }}
            </table>
        </div>
    </div>

@endsection
