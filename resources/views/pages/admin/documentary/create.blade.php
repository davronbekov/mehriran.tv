@extends('layouts.admin')

@section('content')

    <form class="row" method="post" action="{{ route('admin.documentary.store') }}"  enctype="multipart/form-data">
        @csrf
        <div class="col-md-3">
            <div class="row">
                <h4 class="col-md-12">
                    Info of documentary
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

                <div class="col-md-12 mt-3">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile04" name="snapshot" required>
                            <label class="custom-file-label" for="inputGroupFile04">Choose snapshot of documentary</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <input type="text" class="form-control" name="youtube_url" placeholder="Youtube ID">
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row">

                <h4 class="col-md-12">
                    Language and price
                </h4>
                <div class="col-md-12">
                    <select name="language" class="form-control" required>
                        @foreach($languages as $key => $language)
                            <option value="{{ $key }}"> {{ $language }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mt-2">
                    <input type="text" name="price" placeholder="price" class="form-control" required>
                </div>

                <h4 class="col-md-12 mt-3">
                    Title of documentary
                </h4>

                <div class="col-md-12 mt-2">
                    <input type="text" class="form-control" name="title" placeholder="Title" required>
                </div>

                <h4 class="col-md-12 mt-2">
                    Description of documentary
                </h4>

                <div class="col-md-12 mt-2">
                    <textarea id="editor" class="form-control" placeholder="Description" name="description" required>
                        <p></p>
                        <p></p>
                        <p></p>
                    </textarea>
                </div>

                <div class="col-md-12 mt-4">
                    <input type="submit" value="Create" class="form-control btn btn-dark w-25">
                </div>

            </div>
        </div>



    </form>

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
