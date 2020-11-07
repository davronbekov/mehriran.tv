@extends('layouts.app')

@section('content')

    {{--        NEWS    --}}

   <div class="col-md-12">
       <div class="row">
           <div class="col-md-8 offset-md-2 mt-4 mb-5">
               <h2 class="text-primary mb-4">
                   News
               </h2>

               @foreach($news as $item)
                   <div>
                       <img src="{{ url('/images/news_ico.png') }}" class="float-left">
                       <a href="{{ route('news.show', ['id' => $item->id]) }}" style="margin-left: 30px;" class="h4">
                           {{ $item->title }}
                       </a>
                   </div>
               @endforeach
           </div>
       </div>
   </div>

@endsection
