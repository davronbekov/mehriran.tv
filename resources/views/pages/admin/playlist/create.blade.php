@extends('layouts.admin')

@section('content')

    <form class="row" method="post" action="{{ route('admin.playlist.store') }}"  enctype="multipart/form-data">
        @csrf
        <div class="col-md-3">
            <div class="row">
                <h4 class="col-md-12">
                    Info of file
                </h4>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="path" placeholder="Path to file" required value="{{ request('path') }}">
                </div>

                <div class="col-md-12 mt-2">
                    <input type="text" class="form-control" name="filename" placeholder="Name to file" required value="{{ request('name') }}">
                </div>

                <div class="col-md-12 mt-2">
                    <input type="text" class="form-control" name="ext" placeholder="Extension to file" required value="{{ request('ext') }}">
                </div>

            </div>
        </div>

        <div class="col-md-9">
            <h4 class="col-md-12">
                Additional information of file
            </h4>

            <div class="col-md-12">
                <input type="number" class="form-control" name="duration" placeholder="Duration of file is seconds" required value="{{ request('duration') }}">
            </div>

            <div class="col-md-12 mt-2">
                <input type="text" class="form-control" name="starts" placeholder="Starting time. Ex: hh:mm (20:00)" required value="{{ request('starts') }}">
            </div>

            <div class="col-md-12 mt-2">
                <input type="submit" class="btn btn-dark" value="Save">
            </div>

        </div>



    </form>


@endsection
