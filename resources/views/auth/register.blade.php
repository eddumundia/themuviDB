@extends('layouts.app')

@section('content')
<h4>Login</h4>
<div class="box container">
    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="field{{ $errors->has('name1') ? ' has-error' : '' }}">
            <label for="name1" class="label">First name</label>

            <div class="control">
                <input id="name" type="text" class="input" name="name1" value="{{ old('name1') }}" required autofocus>

                @if ($errors->has('name1'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name1') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name2" class="label">Second name</label>

            <div class="control">
                <input id="name" type="text" class="input" name="name2" value="{{ old('name2') }}" required autofocus>

                @if ($errors->has('name2'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name2') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="field{{ $errors->has('name3') ? ' has-error' : '' }}">
            <label for="name3" class="label">Third name</label>

            <div class="control">
                <input id="name" type="text" class="input" name="name3" value="{{ old('name3') }}" required autofocus>

                @if ($errors->has('name3'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name3') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="label">E-Mail Address</label>

            <div class="control">
                <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="label">Password</label>

            <div class="control">
                <input id="password" type="password" class="input" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="field">
            <label for="password-confirm" class="label">Confirm Password</label>

            <div class="control">
                <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
            </div>
        </div>

        <div class="field">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="button is-info">
                    Register
                </button>
                <a href="{{ route('login') }}" class="button">Login</a>
            </div>
        </div>
    </form>
</div>
@endsection
