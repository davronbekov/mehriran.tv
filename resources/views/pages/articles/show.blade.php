@extends('layouts.app')

@section('content')

    {{--        Article    --}}
   <div class="col-md-12">
       <div class="row">
           <div class="col-md-8 offset-md-2 mt-4 mb-5">
               <h2 class="text-primary mb-4">
                   {{ $article->title ?? 'undefined' }}
               </h2>

               <div>
                   {!! $article->description ?? 'undefined' !!}
               </div>
           </div>

           <div class="col-md-8 offset-md-2 mt-4">
               <h4>Comments:</h4>
           </div>

           @foreach($comments as $comment)
               <div class="col-md-8 offset-md-2 mt-4">
                   <div class="card">
                       <div class="card-body">
                           <h5 class="mt-0">
                               {{ $comment->relationUsers->name }}
                           </h5>
                           <div>
                               {{ $comment->comment }}

                               <span class="float-right"> {{ $comment->created_at }}</span>
                           </div>
                       </div>
                   </div>
               </div>
           @endforeach

           <div class="col-md-8 offset-md-2 mt-4">
               @auth
                   <form action="{{ route('comments.addNews', ['lang' => app()->getLocale()]) }}" method="POST">
                       @method('put')
                       @csrf

                       <input type="hidden" name="news_id" value="{{ $article->id }}" required>

                       <textarea class="form-control" placeholder="Leave a comment here" name="comment" style="height: 100px" required></textarea>

                       <input type="submit" class="btn btn-md mt-3 red_color text-white">
                   </form>
               @else
                   Sign-in is required to leave comment
               @endauth
           </div>

       </div>
   </div>



@endsection
