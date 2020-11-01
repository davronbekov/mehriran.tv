@extends('layouts.admin')

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <form action="{{ route('admin.news.update', $news->id) }}" method="POST" class="row">
                    @method('put')
                    @csrf

                    <h5 class="col-md-12 mb-3">Editing item</h5>

                    <div class="col-md-12 mt-3">
                        <label>Identification of item</label>
                        <input type="text" class="form-control" name="identify" placeholder="Unique identification of item" required disabled value="{{ $news->identify }}">
                    </div>


                    <div class="col-md-5 offset-1 mt-5">
                        <input type="text" name="title" placeholder="Title" required class="form-control">
                    </div>

                    <div class="col-md-5 mt-5">
                        <select class="form-control" name="language">
                            @foreach($languages as $key => $language)
                                <option value="{{ $key }}"> {{ $language }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-10 offset-1 mt-2">
                        <textarea name="description" class="form-control ckeditor" id="editor" placeholder="Description" required>
                            <p></p>
                            <p></p>
                            <p></p>
                            <p></p>
                        </textarea>
                    </div>

                    <div class="col-md-5 offset-1 mt-2">
                        <input type="submit" value="Save" class="form-control btn btn-dark">
                    </div>


                </form>

                <div class="row mt-5">
                    <table class="table table-striped col-md-12">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Language</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($news->relationParams as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->language }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{!! $item->description !!} </td>
                                    <td>
                                        <form action="{{ route('admin.news.destroy', $item->news_id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="language" value="{{ $item->language }}">
                                            <input class="form-control btn btn-danger" type="submit" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </div>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endsection
