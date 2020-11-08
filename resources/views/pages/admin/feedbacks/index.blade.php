@extends('layouts.admin')

@section('content')

    <div class="row">

        <div class="col-md-10 offset-md-1">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($feedbacks as $feedback)
                        <tr>
                            <th scope="row">{{ $feedback->id }}</th>
                            <td>
                                <a href="{{ route('admin.feedbacks.show', $feedback->id) }}">
                                    {{ $feedback->name }}
                                </a>
                            </td>
                            <td>{{ $feedback->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
                {{ $feedbacks->links() }}
            </table>
        </div>
    </div>

@endsection
