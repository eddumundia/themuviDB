@extends('layouts.app')

@section('content')

@include('layouts.moviesearch')
<title><?= $movie->getoriginalTitle();?> - ({!!$movie->getReleaseDate()->format('Y')!!}) </title>
<section class="hero bg_drop">
    <div class="container">
        <div class="box">
            <article class="media">
                <div class="media-left">
                    <?php if (empty($movie->getPosterPath())) { ?>
                        <div class="no_image_holder w300_and_h450"></div>
                    <?php } else { ?>
                        <figure class="image">
                            <img src=" http://image.tmdb.org/t/p/w342//<?= $movie->getPosterPath(); ?>" alt="Image">
                        </figure>
                    <?php } ?>
                </div>
                <div class="media-content">
                    <div class="content">
                        <p>
                        <h4><a href="{{ url('/movie/') }}/{{$movie->getId()}}" style="text-decoration:none;color: inherit;"><?= $movie->getoriginalTitle();?>  <span class="smalltitle">({!!$movie->getReleaseDate()->format('Y')!!})</span></a>
                            <span class="subtitle is-6 is-pulled-right"> {!!$movie->getvoteAverage()!!} &#9733;&#9733;&#9733;</span><br>
                            <a href="{{ url('/movie/mymovies') }}/{{$movie->getId()}}">Watched</a>
                            <small>
                                <?php
                                foreach ($movie->getGenres() as $value) {?>
                                    <a href="{{ url('/genre/index/') }}/{{$value->getId()}}/1"><span class='tag is-rounded is-success'><?= $value->getName();?></span></a>,
                               <?php }
                                ?>
                                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-via="eddumundia" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                             
                            <div class="fb-share-button" data-href="http://localhost/themuvi/public/index.php/movie/{{$movie->getId()}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fthemuvi%2Fpublic%2Findex.php%2Fmovie%2F338970&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                          
                            </small> 
                    </h4>
                        <h4>Overiew</h4>
                        Homepage: <a href="{!!$movie->getHomepage()!!}" target="_blank">{!!$movie->getHomepage()!!}</a><br>
                        <p>{!!substr($movie->getoverview(),0, 200)!!}....<a href="#"  target="_blank">Read more</a></p>
                        
                        <div class="columns">
                            
                            <div class="column">
                                <p>Official trailer
                                    <?php $i = 0;
                                    foreach ($movie->getVideos() as $video) {
                                        ?>
                                        <iframe width="560" height="309" src="https://www.youtube.com/embed/{!!$video->getKey()!!}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        <?php
                                        $i++;
                                        if ($i == 1)
                                            break;
                                    }
                                    ?></p>
                            </div>
                            <div class="column">
                                Shops that have thee movie in store
                                 <div id="map">
                                <a href="#">Where to find</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
    <br>
    <section>
    <div class="container">
        <div class="columns">
            <div class="column is-half">
                <div class="notification">
                <h4>Top Billed Cast</h4>
                <div class="columns">
                    <?php $i = 0; foreach ($movie->getCredits()->getCast() as $cast) {?>
                    <div class="column">
                            <?php if (empty($cast->getprofilepath())) { ?>
                                <div class="no_image_holder w138_and_h175"></div>
                            <?php } else { ?>
                                <a href="{{ url('/person/') }}/{{$cast->getId()}}">
                                    <figure class="image">
                                        <img src=" http://image.tmdb.org/t/p/w92//<?= $cast->getprofilepath(); ?>" alt="Image">
                                    </figure></a>
                            <?php } ?>
                            <div class="content">
                                <p class="subtitle is-6">{!!substr($cast->getname(), 0, 12)!!}..</p>
                                <p class="subtitle is-6">{!!substr($cast->getcharacter(), 0, 12)!!}..</p>
                            </div>
                        </div>
                    <?php 
                     $i++;
                    if($i==4) break;
                    }; ?>
                </div>
                </div>
                <div class="notification">
                    <h4>Reviews</h4>
                    <ol>
                        <?php
                        $i = 0;
                        foreach ($movie->getReviews() as $review) {
                            ?>
                            <li>
                                <p><b>{!!$review->getauthor()!!}</b></p><br>
                                <span class="realname">{!!substr($review->getcontent(), 0, 600)!!}...<a href="https://www.themoviedb.org/review/{!!$review->getid()!!}"  target="_blank">Read more</a></span><br>
                            </li>
                            <?php
                            $i++;
                            if ($i == 1)
                                break;
                        }
                        ?>
                    </ol>
                </div>
            </div>
            <div class="column is-half notification">
                <h4>Recommendations</h4>
                <div class="columns is-multiline">
                    <?php $i = 0; foreach ($movie->getSimilarMovies() as $similar) {?>
                    <div class="column is-2">
                        <a href="{{ url('/movie/') }}/{{$similar->getId()}}"><img class="img-circleWW" src=" http://image.tmdb.org/t/p/w92/{!!$similar->getPosterPath()!!}"></a><br>
                        <small>{!!substr($similar->getoriginalTitle(), 0,6)!!}...</small><br>
                    </div>
                    <?php  $i++;if($i==24) break; }?>
                </div>
            </div>
        </div>
       
    </div>
</section>
    
    <button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
}
</script>

    <div id="showtrailer" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <p>Official trailer
                <?php $i = 0;
                foreach ($movie->getVideos() as $video) { ?>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{!!$video->getKey()!!}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    <?php
                    $i++;
                    if ($i == 1)
                        break;
                }
                ?></p>
        </div>
        <button class="modal-close is-large" aria-label="close" onclick="showTrailer(2)"></button>
    </div>

@endsection

@push('scripts')

<style>
    .bg_drop{
        background-image: url("http://image.tmdb.org/t/p/original//<?= $movie->getbackdroppath();?>");
        background-repeat: no-repeat;
    }
    
    div.no_image_holder.w300_and_h450 {
        width: 300px;
        height: 450px;
        line-height: 450px;
        font-size: 150px;
    }

div.no_image_holder {
    display: inline-block;
    font-family: "Glyphicons Regular";
    text-align: center;
    background-color: #dbdbdb;
    color: #b5b5b5;
    box-sizing: border-box;
    font-size: 1em;
    border-radius: 4px;
    border: 1px solid #d7d7d7;
}
div.no_image_holder.w185_and_h278 {
    width: 185px;
    height: 278px;
    line-height: 278px;
    font-size: 92px;
}

div.no_image_holder.w138_and_h175 {
    width: 138px;
    height: 175px;
    line-height: 175px;
    font-size: 55px;
}
#map{
    height: 315px;
    border: 1px solid black;
}

</style>
<script>
    function showTrailer(val){
        if(val ==1){
            $("#showtrailer").addClass('is-active');
        }else{
            $("#showtrailer").removeClass('is-active');
        }
    }
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=402810093095199&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
     

     
