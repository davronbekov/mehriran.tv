@extends('layouts.app')

@section('content')

    <div class="col-md-10 offset-1">
        <div class="row">
            <div class="col-md-12 mb-3">
                @if($videoParams->count() == 0)
                    <h4>
                        Sorry, tickets are unavailable
                    </h4>
                @else
                    <h4>
                        Choose tariff
                    </h4>
                @endif
            </div>

            @foreach($videoParams as $key => $videoParam)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-md-12">
                                <form class="row" action="" method="post">
                                    @csrf
                                    <div class="col-md-12 text-center">
                                        Option # {{ $key + 1}}
                                        <input type="hidden" name="tariff_id" value="{{ $videoFile->type }}">
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <h6>Ticket type : </h6>
                                        <h5>
                                            {{ $videoParam->type }}
                                        </h5>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <h6>Days: </h6>
                                        <h5>
                                            @switch($videoParam->type)
                                                @case('rent')
                                                    {{ $videoParam->days }}
                                                @break
                                                @case('buy')
                                                    Unlimited
                                                @break
                                            @endswitch

                                        </h5>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <h6>Price:</h6>
                                        <h5>
                                            {{ $videoParam->price }} $
                                        </h5>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <div id="paypal-button{{ $videoParam->id }}" style="margin-top: 5px"></div>
                                        <script>
                                            @if($videoParam->price != 0)
                                                createButton({{ $videoParam->id }}, {{ auth()->user()->getAuthIdentifier() }})
                                            @endif
                                        </script>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
