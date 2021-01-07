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
       </div>
   </div>

@endsection
