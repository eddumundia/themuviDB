@extends('layouts.app')

@section('content')

@include('layouts.moviesearch')

<link href='https://fonts.googleapis.com/css?family=Asset' rel='stylesheet'>
<section class="hero is-primary bg_drop">
    <div class="container">
        <div class="mainhome is-pulled-right  text-center">
            <h3 class="subtitle is-3"><span><?= $bannerdetails->getoriginalTitle();?></span></h3>
            <div class=""><p class="overview has-text-centered">{!!substr($bannerdetails->getoverview(),0, 200)!!}</p></div>
            <a href="{{ url('/movie/') }}/{{$bannerdetails->getId()}}" class="button is-info is-medium">Read more</a>
        </div>
    </div>
</section>
<section class="hero">
    <h4 class="has-text-centered box">Popular movies</h4>
        <div class="columns">
            <?php
            foreach ($popular as $movie) {
                ?>
                <div class="column">
                    <a href="{{ url('/movie/') }}/{{$movie->getId()}}">
                        <img src=" http://image.tmdb.org/t/p/w342//<?= $movie->getPosterPath(); ?>" alt="Image">
                    </a>
                </div> 
             <?php }?>
            </div>
</section><hr>
<section class="hero">
    <div class="container3 box">
        <h2 class="has-text-centered box">Explore latest TV Shows </h2>
        <div class="columns">
            <?php
            foreach ($series as $serie) {
                ?>
                <div class="column">
                    <a href="{{ url('/series/') }}/{{$serie->getId()}}">
                        <img class="image" src=" http://image.tmdb.org/t/p/w342//<?= $serie->getPosterPath();?>" alt="Image">
                    </a>
                </div> 
             <?php }?>
    </div>

        </div>
</section><hr>
<!-- <section class="hero box">
    <h1 class="has-text-centered" style="font-family: 'Asset';"> Locate movie shop, see what they have in store and order</h1>
    <div class="container" style="border: 1px solid red;">
        <div class="googmaps">
            <p>Google not for free</p>
        </div>
    </div>
</section> -->
   
@endsection

@push('scripts')

<style type="text/css">
     .bg_drop{
        background-image: url("http://image.tmdb.org/t/p/original/<?= $bannerdetails->getbackdroppath();?>");
        background-repeat: no-repeat;
        height: 700px;
    }
    .mainhome2{
        border: 1px solid red;
        width: auto;
        height: 200px;
        float: right;
        top:50px;
        position: relative;
        background: rgba(255,255,255,0.5); 
    }
    h3.subtitle{
        font-family: 'Asset';
        color:black;
    }
    
    .mainhome{
        text-align:center;
        border: 1px solid white;
        background:rgb(0,0,255);     /* IE6/7/8 */
        filter:alpha(opacity=30);     /* IE6/7/8 */
        background:rgba(0,0,255,0.3);  /* Modern Browsers */
    }
    span {
        position:relative;   /* IE6/7/8 */
        color:white;
        font-size:40px;
        margin:0;
    }
    .overview{
        position:relative;
        wid/th:500px;
    }
    .googmaps{
        height: 300px;
        position: flex;
    }
    
</style>