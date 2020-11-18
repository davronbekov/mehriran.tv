@extends('layouts.app')

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="row">
                    <div class="col-md-3">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active">
                                Help board
                            </a>
                            <a href="{{ route('profile.index', ['lang' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">Info</a>
                            <a href="{{ route('profile.changePassword', ['lang' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">Change password</a>
                            <a href="#" class="list-group-item list-group-item-action">My videos</a>
                            <a href="#" class="list-group-item list-group-item-action">My documentaries</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                Profile info
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <b>Name: </b>
                                    {{ $user->name ?? 'User\'s name' }}
                                    <br/>
                                    <b>Email: </b>
                                    {{ $user->email ?? 'not defined' }}
                                </h5>

                                <a class="btn btn-primary" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
