@extends('layouts.app')

@section('content')
<h4>Login</h4>
<div class="box container">
    <div class="columns">
        <div class="column bg_person has-background-black">
            <div class="mainregister">
                <span>
                    <ul>
                        <li><i class="fa fa-check"></i>Search for movies, tv series and actors</li>
                        <li><i class="fa fa-check"></i>Track movies and tv series you have watched</li>
                        <li><i class="fa fa-check"></i>Get notified when the next episode/season is available</li>
                        <li><i class="fa fa-check"></i>Get suggestions based on your movies and series</li>
                        <li><i class="fa fa-check"></i>Order movies from the nearest shop</li>
                        <li><i class="fa fa-check"></i>Check what movies your friends have</li>
                    </ul>
                </span>
            </div>
        </div>
        <div class="column mainregister2">
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
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="button is-info">
                    Login
                </button>

                <a class="button" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
                <a class="button is-info" href="{{ route('register')}}">Sign up</a>
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
        top: inherit;
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

     .mainregister2{
        position: relative;
        height: inherit;
        text-align:center;
    }
     .footer{
                    margin-top: 20px;
                    background-color: #222831;
                    color: lemonchiffon;
                    position:fixed;
                    left:0px;
                    bottom:0px;
                    height:30px;
                    width:100%;
                }
</style>
