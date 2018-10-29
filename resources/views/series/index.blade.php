@extends('layouts.app')

@section('content')

@include('layouts.tvsearch')

<div class="container">
    <div class="columns is-multiline">
    
    <?php
    foreach ($popular as $serie){
    ?>
        <div class="column is-half">
            <div class="box">
                <article class="media">
                    <div class="media-left">
                        <a href="{{ url('/series/') }}/{{$serie->getId()}}">
                            <figure class="image">
                                <img src=" http://image.tmdb.org/t/p/w185//<?= $serie->getPosterPath();?>" alt="Image">
                            </figure>
                        </a>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong><a href="{{ url('/series/') }}/{{$serie->getId()}}" style="text-decoration:none;color: black;"><?= $serie->getname();?></a></strong> <small><i>Rating {!!number_format((float)$serie->getvoteAverage(), 1, '.', '')!!}</i></small> <small></small>
                                <br>
                                {!!substr($serie->getoverview(),0, 300)!!} 
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
