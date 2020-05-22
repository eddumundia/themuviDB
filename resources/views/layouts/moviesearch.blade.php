<div class="container search-holder">
    <form action="{{ url('/search/movie') }}" method="POST" role="search">
         {{ csrf_field() }}
        <div class="box">
            <div class="field has-addons">
                <div class="control is-expanded">
                    <input class="input" type="search" name="q" placeholder="Search movies">
                </div>
                <div class="control">
                    <button type="submit" class="button is-info">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
