@extends('layouts.app')

@section('content')
<h4>Login</h4>
<div class="box container">
    <div class="columns">
        <div class="column bg_person has-background-black">
            <div class="mainregister">
                <span>
                    <ul>
                        <li><i class="fa fa-check"></i>Track movies and tv series you have watched</li>
                        <li><i class="fa fa-check"></i>Get notified when the next episode/season is available</li>
                        <li><i class="fa fa-check"></i>Get suggestions based on your movies and series</li>
                        <li><i class="fa fa-check"></i>Order movies from the nearest shop</li>
                        <li><i class="fa fa-check"></i>Check what movies your friends have</li>
                    </ul>
                </span>
            </div>
        </div>
        <div class="column">
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
            <div class="columns">
                <div class="column">
                    <button type="submit" class="button is-info is-fullwidth">
                        Register
                    </button>
                </div>
                <div class="column">
                    <a href="{{ route('login') }}" class="button is-fullwidth">Login</a>
                </div>
            </div>
        </div>
    </form>
        </div>
    </div>
  
</div>
@endsection

<style type="text/css">
    .bg_person{
        background-image: url("http://image.tmdb.org/t/p/w342///zvBCjFmedqXRqa45jlLf6vBd9Nt.jpg" );
        background-repeat: no-repeat ;
        background-position:center;
    }
     .mainregister{
        top: 100px;
        position: relative;
        height: 300px;
        text-align:center;
        border: 1px solid white;
        background:rgb(0,0,255);     /* IE6/7/8 */
        filter:alpha(opacity=30);     /* IE6/7/8 */
        background:rgba(0,0,255,0.3);  /* Modern Browsers */
    }
     .mainregister span {
        position:relative;   /* IE6/7/8 */
        color:white;
        font-size:20px;
        margin:0;
    }
</style>
