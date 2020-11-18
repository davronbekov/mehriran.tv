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
                    <div class="col-md-8">
                        <form class="row" action="{{ route('profile.updatePassword', ['lang' => app()->getLocale()]) }}" method="post">
                            @method('put')
                            @csrf

                            <div class="input-group col-md-8 offset-md-2 mt-3">
                                <input type="password" class="form-control" placeholder="Old password" name="old_password" required>
                            </div>
                            <div class="input-group col-md-8 offset-md-2 mt-3">
                                <input type="password" class="form-control" placeholder="New password" name="new_password_1" required>
                            </div>
                            <div class="input-group col-md-8 offset-md-2 mt-3">
                                <input type="password" class="form-control" placeholder="Re-peat new password" name="new_password_2" required>
                            </div>

                            <div class="input-group col-md-8 offset-md-2 mt-3">
                                <input type="submit" class="btn btn-primary" value="Change">
                            </div>

                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>

@endsection
