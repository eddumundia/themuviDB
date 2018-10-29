@extends('layouts.app')

@section('content')

@include('layouts.peoplesearch')
    <div class="container">
        <div class="box">
            <article class="media">
                <div class="media-left">
                    <a href="{{ url('/movie/') }}/{{$person->getId()}}">
                        <figure class="image">
                            <img src="http://image.tmdb.org/t/p/w342//<?= $person->getprofilePath();?>" >
                        </figure>
                    </a>
                </div>
                <div class="media-content">
                    <div class="content">
                        <p>
                            <span class="title"><a href="{{ url('/movie/') }}/{{$person->getId()}}" style="text-decoration:none;color: inherit;">{!!$person->getname()!!}</a></span><hr>
                            <span class="bioinfo">Biography</span>
                            {!!substr($person->getbiography(),0, 400)!!}..<button class="btn btn-link" onclick="showReadMore(1)">Read more</button>
                            </p>
                    </div>
                </div>
            </article>
        </div>
    </div>
        <hr>
        <div class="container">
            <div class="columns">
                <div class="column  is-two-fifths">
                    <div class="notification is-primary">
                        <h4>Personal info</h4>
                        <p>Birthday</p>
                        <p>{!!$person->getbirthday()->format('Y-m-d')!!}</p>

                        <p>place of birth</p>
                        <p>{!!$person->getPlaceOfBirth()!!}</p>


                        <p>Official site</p>
                        <p><a href='{!!$person->gethomepage()!!}'>{!!$person->gethomepage()!!}</a></p><hr>
                        <h4>Acting</h4>
     
        <ul>
        <?php 
        $i = 0;
        foreach ($person->getmovieCredits()->getcast() as $cast) {?>
            <li>
                <?php if(!empty($cast) && !empty($cast->getreleaseDate())){?>
                {!!$cast->getreleaseDate()->format('Y-m-d')!!} - <a href="{{ url('/movie/') }}/{{$cast->getId()}}"><span class="realname"><b>{!!$cast->getoriginalTitle()!!}</b> </a> as <span class="character">{!!$cast->getcharacter()!!}</span></span><br>
                <?php }?>
            </li>
        <?php 
        }?>
        </ul>
                    </div>
                </div>
                <div class="column">
                    <div class="notification">
                        <h4>Known for</h4>
                        <div class="columns is-multiline">
                            <?php foreach ($person->getmovieCredits()->getcast() as $cast) {?>
                            <div class="column is-2">
                                <a href="{{ url('/movie/') }}/{{$cast->getId()}}"><img class="img-circleWW" src=" http://image.tmdb.org/t/p/w92//<?= $cast->getposterPath(); ?>"></a><br>
                                    <span class="hide"><b>{!!$cast->getoriginalTitle()!!}</b></span><br>
                                    <span class="character">{!!$cast->getcharacter()!!}</span>
                            </div>
                            <?php };?>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        


@endsection

@push('scripts')


<script>
    function showReadMore(val){
        if(val==1){
            $("#person-bio").addClass('is-active');
        }else{
            $("#person-bio").removeClass('is-active');
        }
    }
</script>



<div id="person-bio" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">{!!$person->getname()!!}'s biography</p>
      <button class="delete" aria-label="close" onclick="showReadMore(2)"></button>
    </header>
    <section class="modal-card-body">
      {!!$person->getbiography()!!}
    </section> class="button">Cancel</button>
    </footer>
  </div>
</div>

     