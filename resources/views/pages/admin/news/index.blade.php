@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-1">
                        <a href="#">
                            <i class="fa fa-info"></i>
                            News
                        </a>
                    </h5>
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item">
                        <a href="{{ route('admin.news.create') }}">
                            Create
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.comments.news.index') }}">
                            Comments
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
                        <th scope="col">Type</th>
                        <th scope="col">Identify</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->identify }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.news.edit', $item->id) }}">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                {{ $news->links() }}
            </table>
        </div>
    </div>

@endsection
