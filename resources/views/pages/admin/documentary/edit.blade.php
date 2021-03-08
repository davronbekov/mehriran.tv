@extends('layouts.admin')

@section('content')

    <form class="row" method="post" action="{{ route('admin.documentary.destroy', $videoFile->id) }}">
        @csrf
        @method('delete')
        <div class="col-md-12">
            <input type="submit" class="btn btn-danger float-right" value="Delete">
        </div>
    </form>

    <form class="row" method="post" action="{{ route('admin.documentary.update', $videoFile->id) }}"  enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="col-md-3">
            <div class="row">
                <h4 class="col-md-12">
                    Info of documentary
                </h4>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="path" placeholder="Path to file" required value="{{ $videoFile->path }}">
                </div>

                <div class="col-md-12 mt-2">
                    <input type="text" class="form-control" name="filename" placeholder="Name to file" required value="{{ $videoFile->filename }}">
                </div>

                <div class="col-md-12 mt-2">
                    <input type="text" class="form-control" name="ext" placeholder="Extension to file" required value="{{ $videoFile->ext }}">
                </div>

                <div class="col-md-12 mt-3">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile04" name="snapshot">
                            <label class="custom-file-label" for="inputGroupFile04">Choose snapshot of documentary</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <input type="text" class="form-control" name="youtube_url" placeholder="Youtube ID" value="{{ $videoFile->youtube_url ?? '' }}">
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row">

                <h4 class="col-md-12">
                    Language of video
                </h4>
                <div class="col-md-12">
                    <select name="language" class="form-control" required>
                        @foreach($languages as $key => $language)
                            <option value="{{ $key }}" {{ $videoFile->language == $key ? 'selected' : '' }}> {{ $language }} </option>
                        @endforeach
                    </select>
                </div>

                <h4 class="col-md-12 mt-3">
                    Title of documentary
                </h4>

                <div class="col-md-12 mt-2">
                    <input type="text" class="form-control" name="title" placeholder="Title" required value="{{ $videoFile->title }}">
                </div>

                <h4 class="col-md-12 mt-2">
                    Description of documentary
                </h4>

                <div class="col-md-12 mt-2">
                    <textarea id="editor" class="form-control" placeholder="Description" name="description" required>
                        {{ $videoFile->description }}
                    </textarea>
                </div>

                <div class="col-md-12 mt-4">
                    <input type="submit" value="Update" class="form-control btn btn-dark w-25">
                </div>

            </div>
        </div>
    </form>

    <div class="row mt-5">

        <div class="col-md-3">
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-12">
                        <form class="row" action="{{ route('admin.video_params.store') }}" method="post">
                            @csrf
                            <div class="col-md-12 text-center">
                                <input type="hidden" name="file_id" value="{{ $videoFile->id }}">
                                <input type="hidden" name="file_type" value="{{ $videoFile->type }}">
                                New Ticket
                            </div>

                            <div class="col-md-12 mt-2">
                                <h6>Status</h6>
                                <select name="is_visible" class="form-control" required>
                                    <option value="0"> hidden </option>
                                    <option value="1"> active </option>
                                </select>
                            </div>

                            <div class="col-md-12 mt-2">
                                <h6>Ticket type</h6>
                                <select name="type" class="form-control" required>
                                    <option value="buy"> buy </option>
                                    <option value="rent"> rent </option>
                                </select>
                            </div>

                            <div class="col-md-12 mt-2">
                                <h6>Days (*only for RENT tickets)</h6>
                                <input type="text" name="days" placeholder="days" class="form-control">
                            </div>

                            <div class="col-md-12 mt-2">
                                <h6>Price in $$</h6>
                                <input type="text" name="price" placeholder="price" class="form-control" required>
                            </div>

                            <div class="col-md-12 mt-3">
                                <input type="submit" class="btn btn-md btn-success w-100 text-white" value="create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @foreach($videoParams as $videoParam)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-md-12">
                            <form class="row" action="{{ route('admin.video_params.update', $videoParam->id) }}" method="post">
                                @method('put')
                                @csrf
                                <div class="col-md-12 text-center">
                                    Ticket # {{ $videoParam->id }}
                                    <input type="hidden" name="file_type" value="{{ $videoFile->type }}">
                                </div>

                                <div class="col-md-12 mt-2">
                                    <h6>Status</h6>
                                    <select name="is_visible" class="form-control" required>
                                        <option value="0" {{ $videoParam->is_visible == 0 ? 'selected' : '' }}> hidden </option>
                                        <option value="1" {{ $videoParam->is_visible == 1 ? 'selected' : '' }}> active </option>
                                    </select>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <h6>Ticket type</h6>
                                    <select name="type" class="form-control" required>
                                        <option value="buy" {{ $videoParam->type == 'buy' ? 'selected' : '' }}> buy </option>
                                        <option value="rent" {{ $videoParam->type == 'rent' ? 'selected' : '' }}> rent </option>
                                    </select>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <h6>Days (*only for RENT tickets)</h6>
                                    <input type="text" name="days" placeholder="days" class="form-control" value="{{ $videoParam->days }}">
                                </div>

                                <div class="col-md-12 mt-2">
                                    <h6>Price in $$</h6>
                                    <input type="text" name="price" placeholder="price" class="form-control" required  value="{{ $videoParam->price }}">
                                </div>

                                <div class="col-md-12 mt-3">
                                    <input type="submit" class="btn btn-md btn-info w-100 text-white" value="update">
                                </div>
                            </form>
                        </div>
                        {{--                        <div class="col-md-12 mt-3">--}}
                        {{--                            <form class="row" method="post" action="{{ route('admin.video_params.destroy', $videoParam->id) }}">--}}
                        {{--                                @csrf--}}
                        {{--                                <input type="hidden" name="file_type" value="{{ $videoFile->type }}">--}}
                        {{--                                @method('delete')--}}
                        {{--                                <div class="col-md-12">--}}
                        {{--                                    <input type="submit" class="btn btn-md btn-danger w-100" value="Delete">--}}
                        {{--                                </div>--}}
                        {{--                            </form>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        @endforeach

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
