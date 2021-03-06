@extends('layouts.admin')

@section('content')
    <link href="{{ asset($path.'/css/filebrowser.css') }}" rel="stylesheet">
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                <div class="filemanager">

                    <div class="search">
                        <input type="search" placeholder="Find a file.."/>
                    </div>

                    <div class="card w-25">
                        <div class="card-body text-center">
                            <a href="{{ route('admin.files.attach') }}?path=null&name=null&root=files" title="Youtube">
                               Youtube link
                                <ion-icon name="logo-youtube" style="font-size: 1.5rem; position: relative;left: 10px;top:6px;"></ion-icon>
                            </a>
                        </div>
                    </div>
                    <hr/>

                    <div class="breadcrumbs"></div>

                    <ul class="data"></ul>

                    <div class="nothingfound">
                        <div class="nofiles"></div>
                        <span>No files here.</span>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <script src="{{ asset($path.'/js/filebrowser.js') }}"></script>
@endsection
