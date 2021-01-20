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
           <div class="col-md-8 offset-md-2 mt-4">
               <div class="card">
                   <div class="card-body">
                       <h5 class="mt-0">Media heading</h5>
                       Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                   </div>
               </div>
           </div>

           <div class="col-md-8 offset-md-2 mt-4">
               <div class="card">
                   <div class="card-body">
                       <h5 class="mt-0">Media heading</h5>
                       Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                   </div>
               </div>
           </div>
       </div>
   </div>



@endsection
