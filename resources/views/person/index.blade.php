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
</div>

@endsection

@push('scripts')
     
 