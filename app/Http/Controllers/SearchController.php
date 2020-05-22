<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tmdb\Repository\SearchRepository;

class SearchController extends Controller
{
     private $search;
    
    public function __construct(SearchRepository $search)
    {
        $this->search = $search;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchmulti($query){
        return $query;
        exit;
        $data = $this->search->searchMulti("hahah");
        
        print_r($data);
        exit;
    }
    
    public function movie(Request $request)
    {
        $q = $request->input('q');
        $query = new \Tmdb\Model\Search\SearchQuery\MovieSearchQuery();
        $data = $this->search->searchMovie($q,$query);
        
        return view('movie.index', [ 'popular' => $data, 'title'=>'Search query', 'route' =>'']);
    }
    
    public function people(Request $request)
    {
        $q = $request->input('q');
        $query = new \Tmdb\Model\Search\SearchQuery\PersonSearchQuery();
        $data = $this->search->searchPerson($q,$query);
        
        return view('person.index', [ 'popular' => $data ]);
    }
    
    public function series(Request $request)
    {
        $q = $request->input('q');
        $query = new \Tmdb\Model\Search\SearchQuery\TvSearchQuery();
        $data = $this->search->searchTv($q,$query);
        
        return view('series.index', [ 'popular' => $data ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tv()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $q = $request->input('q');
        $query = new \Tmdb\Model\Search\SearchQuery\KeywordSearchQuery();
        $data = $this->search->searchMulti($q,$query);
        
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        return view('movie.index', [ 'popular' => $data ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
