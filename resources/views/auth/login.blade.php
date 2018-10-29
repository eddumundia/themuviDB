@extends('layouts.app')

@section('content')
<h4>Login</h4>
<div class="box container">
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="label">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="label">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="input" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="field">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>
        </div>

        <div class="field">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="button is-info">
                    Login
                </button>

                <a class="button" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a><br>
                <a href="{{ route('register')}}">Sign up</a>
            </div>
        </div>
    </form>
</div>
@endsection
