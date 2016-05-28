@extends('layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')
    @include('includes.message-block')

    <div class="jumbotron">
        <h1>Hello, world!</h1>
        <p>Dobrodošli na Rodac's Social Network! Ako još niste registrirani ovo je pravi trenutak za to!</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Register Now</a></p>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="signup-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Sign Up</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('signup') }}" method="post">
                        <div class="form-group {{ $errors->has('email') ? 'has-error': '' }}">
                            <label for="email">Your E-mail</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                        </div>
                        <div class="form-group {{ $errors->has('first_name') ? 'has-error': '' }}">
                            <label for="first_name">Your First Name</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}">
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error': '' }}">
                            <label for="password">Your Password</label>
                            <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" tabindex="-1" role="dialog" id="login-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('signin') }}"  method="post">
                        <div class="form-group">
                            <label for="email">Your E-mail</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Your Password</label>
                            <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section()