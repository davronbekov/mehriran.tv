@extends('layouts.app')

@section('content')

    {{--        NEWS    --}}

   <div class="col-md-12">
       <div class="row">
           <div class="col-md-8 offset-md-2 mt-4 mb-5">
               <h2 class="text-danger mb-4">
                   News
               </h2>

               @include('pages.pieces.news', ['news' => $news])
           </div>
       </div>
   </div>

@endsection
