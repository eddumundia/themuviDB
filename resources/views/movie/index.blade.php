@extends('layouts.app')

@section('content')

@include('layouts.moviesearch')
 
<div class="container">
    <h2><span class="tag is-white">Displaying {!!$popular->gettotalPages()!!} <?= $title;?> movies</span></h2>
    <div class="columns is-multiline">
        
    <?php
    foreach ($popular as $movie){
    ?>
        <div class="column is-half">
            <div class="box">
                <article class="media">
                    <div class="media-left">
                        <a href="{{ url('/movie/') }}/{{$movie->getId()}}">
                            <?php if(empty($movie->getPosterPath())){?>
                            <div class="no_image_holder w185_and_h278"></div>
                            <?php } else {?>
                            <figure class="image">
                                <img src=" http://image.tmdb.org/t/p/w185//<?= $movie->getPosterPath(); ?>" alt="Image">
                            </figure>
                            <?php }?>
                        </a>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong><a href="{{ url('/movie/') }}/{{$movie->getId()}}" style="text-decoration:none;color: black;"><?= $movie->getoriginalTitle(); ?></a></strong> <small><i>Rating - {!!number_format((float)$movie->getvoteAverage(), 1, '.', '')!!}</i></small> <small class="is-pulled-right">{!!$movie->getReleaseDate()->format('Y')!!}</small><br>
                                <br>
                                {!!substr($movie->getoverview(),0, 300)!!} 
                            </p>
                            
                        
                        </div>
                    </div>
                </article>
            </div>
        </div>
    <?php }?>
    </div>
    <nav class="pagination has-background-white" role="navigation" aria-label="pagination">
        <a class="pagination-previous">Previous</a>
        <a class="pagination-next">Next page</a>
        <ul class="pagination-list">
            <?php for( $i = 1; $i<$popular->gettotalPages(); $i++ ) {?>
            <li>
                <a href="{!! url('/movie/') !!}/{{$route}}/<?= $i;?>" class="pagination-link is-light" aria-label="Goto page {}">{{$i}}</a>
            </li>
            <?php 
            if ($i==20){break;}};
            ?>
        </ul>
    </nav>
   </div>

@endsection

@push('scripts')

<style>
    #links{
       position: relative; bottom: 0px;  
    }
    #c2 {  margin-top: auto; }
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
div.item.card p.view_more {
    border-top: 1px solid #e3e3e3;
    position: absolute;
    bottom: 0;
    left: 0;
    padding: 16px;
}
div.item p:last-of-type {
    margin-bottom: 0;
}
div.item p {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    padding: 0;
    width: 100%;
    line-height: 1.2em;
    margin: 0;
}
</style>

     
 