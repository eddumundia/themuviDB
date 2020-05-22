@extends('layouts.app')

@section('content')

@include('layouts.moviesearch')

<div class="container">
    <div class="columns is-multiline"> 
    <?php
    foreach ($records as $movie){
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
</div>

    

@endsection

@push('scripts')

   