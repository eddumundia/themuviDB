@extends('layouts.app')

@section('content')


    <div class="container-fluid">
      <div class="row">
          <div class="col">
              <div class="center-block carbonads-bg">
                    <div class="imgholder">
                        <a href="{{ url('/movie/') }}/{{$movie->getId()}}"><img class="img-circleWW" src=" http://image.tmdb.org/t/p/w342//<?= $movie->getPosterPath();?>"></a>
                    </div>
                    <div class="float-right">
                        <h4 class="title"><a href="{{ url('/movie/') }}/{{$movie->getId()}}" style="text-decoration:none;color: inherit;"><?= $movie->getoriginalTitle();?></a></h4>
                        <div><span class="pull-left"><span class="glyphicon glyphicon-calendar"></span> {!!$movie->getReleaseDate()->format('Y')!!}</span><span class="pull-right">{!!number_format((float)$movie->getvoteAverage(), 1, '.', '')!!}<span class="glyphicon glyphicon-star"></span></span></div><br>
                         <p class="overview">{!!substr($movie->getoverview(),0, 300)!!}</p>
                    </div>
                </div>
          </div>
      </div>
    </div>

<div class="container">
<div class="bs-example">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#sectionA">Reviews</a></li>
        <li><a data-toggle="tab" href="#sectionB">Videos</a></li>
        <li><a data-toggle="tab" href="#sectionC">Images</a></li>
    </ul>
    <div class="tab-content">
        <div id="sectionA" class="tab-pane fade in active">
            <p>
                <?php foreach ($movie->getReviews()->getIterator() as $review) {?>
                <h4>{!!$review->getauthor()!!}</h4>     
                <p>{!!substr($review->getcontent(), 0, 300)!!}</p>
                <?php }?>
            </p>
        </div>
        <div id="sectionB" class="tab-pane fade">
            <h3>Videos</h3>
            <p>
                <?php foreach ($movie->getVideos() as $video) {?>
                <iframe title="YouTube video player" class="youtube-player" type="text/html" 
width="640" height="390" src="http://www.youtube.com/watch?v={!!$video->getkey()!!}"
frameborder="0" allowFullScreen></iframe>
                   <?php }?>
            </p>
        </div>
         <div id="sectionC" class="tab-pane fade">
            <h3>Images</h3>
            <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
        </div>
    </div>
</div>
</div>   

@endsection

@push('scripts')

     

<style>
    a {
       color: inherit;
        text-decoration: none; 
    }
     a.title {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: inline-block;
        padding-right: 20px;
        font-size: 2.1em;
        line-height: 24px;
    }
    .carbonads-bg {
    position: static;
    display: block;
    max-width: 950px;
    padding: 5px 0px 5px 0px;
    margin: 0.5rem 0;
    overflow: hidden;
    font-size: 13px;
    line-height: 1.4;
    text-align: left;
    background-color: rgba(0,0,0,.05);
}
.imgholder{
    float: left;
}
.overview{
    padding-left: 10px;
    word-wrap: break-word;
}
.imgholder{
    margin-right: 10px;
}
</style>
     

     