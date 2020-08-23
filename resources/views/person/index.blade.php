@extends('layouts.app')

@section('content')

@include('layouts.peoplesearch')


<div class="container">
    <div class="columns is-multiline">
        <?php foreach ($popular as $person){ ?> 
        <div class="column is-3">
        <a href="{{ url('/person/') }}/{{$person->getId()}}" >
            <figure>
                <img src="http://image.tmdb.org/t/p/w185//<?= $person->getprofilePath(); ?>">
                <figcaption>
                    <a href="{{ url('/person/') }}/{{$person->getId()}}" style="text-decoration:none;color: inherit;"><?= $person->getname(); ?></a>
                </figcaption>
            </figure> 
        </a> 
        </div>
        <?php } ?>
    </div>
         <nav class="pagination has-background-white" role="navigation" aria-label="pagination">
        <a class="pagination-previous">Previous</a>
        <a class="pagination-next">Next page</a>
        <ul class="pagination-list">
            <?php for( $i = 1; $i<$popular->gettotalPages(); $i++ ) {?>
            <li>
                <a href="{!! url('/person/') !!}/{{$route}}/<?= $i;?>" class="pagination-link is-light" aria-label="Goto page {}">{{$i}}</a>
            </li>
            <?php 
            if ($i==20){break;}};
            ?>
        </ul>
    </nav>
</div>

@endsection

@push('scripts')
     
 