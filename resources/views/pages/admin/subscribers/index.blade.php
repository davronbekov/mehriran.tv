@extends('layouts.admin')

@section('content')

    <div class="row">

        <div class="col-md-10 offset-md-1">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscribers as $subscriber)
                        <tr>
                            <th scope="row">{{ $subscriber->id }}</th>
                            <td>{{ $subscriber->email }}</td>
                            <td>{{ $subscriber->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
