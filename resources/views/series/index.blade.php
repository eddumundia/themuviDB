@extends('layouts.app')

@section('content')

@include('layouts.tvsearch')

<div class="container">
    <h2><span class="tag is-white">Displaying {!!$popular->gettotalResults()!!} <?= $title;?> TV series</span></h2>
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
        <nav class="pagination has-background-white" role="navigation" aria-label="pagination">
        <a class="pagination-previous">Previous</a>
        <a class="pagination-next">Next page</a>
        <ul class="pagination-list">
            <?php for( $i = 1; $i<$popular->gettotalPages(); $i++ ) {?>
            <li>
                <a href="{!! url('/series/') !!}/{{$route}}/<?= $i;?>" class="pagination-link is-light" aria-label="Goto page {}">{{$i}}</a>
            </li>
            <?php 
            if ($i==20){break;}};
            ?>
        </ul>
    </nav>
   </div> 

@endsection

@push('scripts')
