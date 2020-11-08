@extends('layouts.app')

@section('content')

    {{--        NEWS    --}}
   <div class="col-md-12">
       <div class="row">
           <div class="col-md-8 offset-md-2 mt-4 mb-5">
               <h2 class="text-primary mb-4">
                   {{ $news->title ?? 'undefined' }}
               </h2>

               <div>
                   {!! $news->description ?? 'undefined' !!}
               </div>
           </div>
       </div>
   </div>

@endsection
