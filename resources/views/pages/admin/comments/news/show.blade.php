@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-1">
                        <a href="#">
                            <i class="fa fa-info"></i>
                            Comments
                        </a>
                    </h5>
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item">
                        <a href="{{ route('admin.comments.news.index') }}">
                            News
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.comments.video.index') }}">
                            Video
                        </a>
                    </li>

                </ul>

            </div>
        </div>

        <div class="col-md-10">

            <div class="card">
               <div class="card-body">
                   <div class="row">
                       <div class="col-md-12 text-center">
                            Comment # {{ $comment->id }}
                       </div>
                       <div class="col-md-12">
                           <h4><b>Name :</b> {{ $comment->relationUsers->name }}</h4>
                           <h5 class="mt-2"><b>Date :</b>  {{ $comment->created_at }}</h5>

                           @if($comment->visible)
                               <h6 class="mt-2">
                                   <b>Status :</b>
                                   <span class="badge bg-success text-white">Visible</span>
                               </h6>
                           @else
                               <h6 class="mt-2">
                                   <b>Status :</b>
                                   <span class="badge bg-primary">Hidden</span>
                               </h6>
                           @endif

                       </div>
                       <div class="col-md-12 mt-5">
                           <h4>Comment : </h4> {{ $comment->comment }}
                       </div>

                       <div class="col-md-12 mt-5">

                           <form method="POST" class="row" action="{{ route('admin.comments.news.update', $comment->id) }}">
                               @csrf
                               @method('put')

                               <div class="col-md-2">
                                   Change status:
                               </div>
                               <div class="col-md-4">
                                   <select class="custom-select" name="visible">
                                       <option value="0">Hidden</option>
                                       <option value="1">Visible</option>
                                   </select>
                               </div>
                               <div class="col-md-6">
                                   <input type="submit" class="btn btn-primary text-white" value="Save">
                               </div>
                           </form>

                       </div>

                   </div>
               </div>
            </div>

        </div>
    </div>

@endsection
