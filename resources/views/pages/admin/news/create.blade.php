@extends('layouts.admin')

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <form action="{{ route('admin.news.store') }}" method="POST" class="row">
                    @csrf

                    <h5 class="col-md-12 mb-3">Creating new item</h5>

                    <div class="col-md-12 mt-3">
                        <label>Identification of item</label>
                        <input type="text" class="form-control" name="identify" placeholder="Unique identification of item" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <select class="w-100 custom-select" name="type">
                            <option value="news">News</option>
                            <option value="article">Article</option>
                        </select>
                    </div>

                    <div class="col-md-2 mt-3">
                        <input type="submit" class="form-control btn btn-dark" value="Create">
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
