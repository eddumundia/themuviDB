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
                                <strong><a href="{{ url('/series/') }}/{{$serie->getId()}}" style="text-decoration:none;color: black;"><?= $serie->getname();?></a></strong> <small class="subtitle is-6 is-pulled-right"><i>Rating {!!number_format((float)$serie->getvoteAverage(), 1, '.', '')!!}</i></small> <small></small>
                                <br>
                                   {{ str_limit($serie->getoverview(), $limit = 150, $end = '...') }}<a href="{{ url('/series/') }}/{{$serie->getId()}}">Details</a>
                            
                            </p><br><br><br><br><br>
                        </div>
                         <nav class="level is-mobile">
                          <div class="level-left">
                            <a class="level-item" href="hahha">
                              <i class="fas fa-heart" ></i>&nbsp; Watched
                            </a>

                            <a class="level-item">
                              <i class="fas fa-heart"></i>&nbsp; Locate
                            </a>

                            <a class="level-item">
                              <i class="fas fa-heart"></i>&nbsp; Tweet
                            </a>
                          </div>
                        </nav>
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
