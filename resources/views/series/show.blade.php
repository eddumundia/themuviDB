@extends('layouts.app')

@section('content')

@include('layouts.tvsearch')
<section class="hero bg_drop">
    <div class="container">
        <div class="box">
            <article class="media">
                <div class="media-left">
                    <a href="{{ url('/series/') }}/{{$series->getId()}}">
                        <figure class="image">
                            <img src=" http://image.tmdb.org/t/p/w342//{!!$series->getPosterPath()!!}">
                        </figure>
                    </a>
                </div>
                <div class="media-content">
                    <div class="content">
                        <h4><span class="title"><a href="{{ url('/series/') }}/{{$series->getId()}}" style="text-decoration:none;color: inherit;"><?= $series->getname();?>  <span class="smalltitle">({!!$series->getfirstairdate()->format('Y')!!})</span></a></span><span class="subtitle is-6 is-pulled-right"> {!!$series->getvoteAverage()!!} &#9733;&#9733;&#9733;</span><br>
                          <small>
                                <?php
                                foreach ($series->getGenres() as $value) {
                                    echo "<span class='tag is-rounded is-success'>".$value->getName()."</span>";
                                    echo ", ";
                                }
                                ?>
                          </small></h4><hr>
                        <h4>Biography</h4>
                        Homepage: <a href="{!!$series->getHomepage()!!}">{!!$series->getHomepage()!!}</a><br>
                        
                            {!!substr($series->getoverview(),0, 600)!!}...<button class="btn btn-link" onclick="showReadMore()">Read more</button>
                            
                        </p>
                        <div class="columns">
                            <div class="column is-centered">
                                <h4>Official Trailer</h4>
                                <p>
                                    <?php $i = 0;
                                    foreach ($series->getVideos() as $video) {
                                        ?>
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{!!$video->getKey()!!}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        <?php
                                        $i++;
                                        if ($i == 1)
                                            break;
                                    }
                                    ?></p>
                            </div>
                           <!--  <div class="column">
                                <a href="#">Watched</a>
                            </div>
                            <div class="column">
                                <a href="#">Where to find</a>
                            </div> -->
                           
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
        <hr>
        
      <section>
    <div class="container">
        <div class="columns">
            <div class="column is-half">
                <div class="notification">
                <h4>Top Billed Cast</h4>
                <div class="columns is-multiline">
                    <?php $i = 0; foreach ($series->getCredits()->getCast() as $cast) {?>
                 
                        <div class="column">
                            <div class="card">
                                    <figure class="image">
                                        <a href="{{ url('/series/') }}/{{$cast->getId()}}">
                                            <img src="http://image.tmdb.org/t/p/w92//<?= $cast->getprofilepath(); ?>" alt="Image">
                                        </a>
                                    </figure>
                                    <div class="content">
                                        <p class="subtitle is-6">{!!substr($cast->getname(), 0, 12)!!}..</p>
                                    <p class="subtitle is-6">{!!substr($cast->getcharacter(), 0, 12)!!}..</p>
                                    </div>
                            </div>
                        </div>
                    <?php 
                     $i++;
                    if($i==4) break;
                    }; ?>
                </div>
                <hr>
                <h4 class="title">Current season</h4>
                <div class="box">
                    <article class="media">
                        <div class="media-left">
                            <?php if (empty($cast->getprofilepath())) { ?>
                                <div class="no_image_holder w138_and_h175"></div>
                            <?php } else { ?>
                                <a href="{{ url('/series/') }}/{{$series->getId()}}">
                                    <figure class="image">
                                        <img src=" http://image.tmdb.org/t/p/w92//<?= $series->getPosterPath(); ?>" alt="Image">
                                    </figure>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="media-content">
                            <div class="content">
                            <p>
                            <h2>{!!$series->getFirstAirDate()->format('Y')!!}</h2>
                            Season {!!$series->getnumberOfSeasons()!!}
                            </p>
                            </div>
                        </div>
                    </article>
                </div>
                <p> 
                <h4>All seasons</h4> 
                </p>
                </div>
                <div class="notification">
                    <h4>All seasons</h4>
                    <?php foreach ($series->getSeasons() as $season) {?>
                    <div class="box">
                            <article class="media">
                                <div class="media-left">
                                    <a href="">
                                        <figure class="image">
                                            <img src="http://image.tmdb.org/t/p/w92/{!!$season->getPosterPath()!!}" alt="Image">
                                        </figure>
                                    </a>
                                </div>
                                <div class="media-content">
                                    <div class="content">
                                        <h4>{!!$season->getName()!!} |  <small>{!!$season->getAirDate()->format('Y')!!}</small></h4>
                                        <p>
                                            {!!$season->getOverview()!!}
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </div>
                     <?php }?>
                </div>
            </div>
            <div class="column is-half notification">
                <h4>Recommendations</h4>
                <div class="columns is-multiline">
                    <?php foreach ($series->getSimilar() as $similar) {?>
                    <div class="column is-2">
                        <a href="{{ url('/series/') }}/{{$similar->getId()}}"><img class="img-circleWW" src=" http://image.tmdb.org/t/p/w92/{!!$similar->getPosterPath()!!}"></a><br>
                        <small>{!!substr($similar->getOriginalName(),0,6)!!}..</small><br>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
       
    </div>
</section>     

    <div id="showtrailer" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <p>Official trailer
                <?php $i = 0;
                foreach ($series->getVideos() as $video) { ?>
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
        background-image: url("http://image.tmdb.org/t/p/original//<?= $series->getbackdroppath();?>");
        background-repeat: no-repeat;
        b/ackground-color: rgb(0,0,0);
        o/pacity: 0.5;
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
     

