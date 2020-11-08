@extends('layouts.admin')

@section('content')

    <div class="row">

        <div class="col-md-10 offset-md-1">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Key</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td> {{ $feedback->id ?? 'undefined' }} </td>
                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td> {{ $feedback->name ?? 'undefined' }} </td>
                    </tr>
                    <tr>
                        <th scope="row">Phone</th>
                        <td> {{ $feedback->phone ?? 'undefined' }} </td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td> {{ $feedback->email ?? 'undefined' }} </td>
                    </tr>
                    <tr>
                        <th scope="row">Text</th>
                        <td> {{ $feedback->text ?? 'undefined' }} </td>
                    </tr>
                    <tr>
                        <th scope="row">Created at</th>
                        <td> {{ $feedback->created_at ?? 'undefined' }} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
