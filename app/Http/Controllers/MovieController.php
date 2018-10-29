<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tmdb\Laravel\Facades\Tmdb;
use Tmdb\Helper\ImageHelper;
use Tmdb\Repository\MovieRepository;

use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $movies;
    
    public function __construct(MovieRepository $movies, ImageHelper $helper)
    {
        $this->movies = $movies;
    }
    public function index()
    {
        $popular = $this->movies->getPopular();
        return view('movie.index', [ 'popular' => $popular, 'title' =>'Popular' ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $movie = $this->movies->load($id);
       
//        echo "<pre>";
//            print_r($movie);
//            echo "</pre>";
//            exit;
//        $data = $movie->getGenres();
//        foreach ($data as $value) {
//            echo "<pre>";
//            print_r($value->getName());
//            echo "</pre>";
//        }
//       
//        exit;
      
        return view('movie.show', [ 'movie' => $movie ]);
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
    
    public function toprated(){
        $toprated = $this->movies->getTopRated();
        return view('movie.index', ['popular' => $toprated, 'title' =>'Top rated' ]);
    }
    
    public function upcoming(){
      $upcoming = $this->movies->getUpcoming();
      return view('movie.index', [ 'popular' => $upcoming , 'title' =>'Upcoming' ]);
    }
    
    public function nowplaying(){
      $nowplaying = $this->movies->getNowPlaying();
      return view('movie.index', [ 'popular' => $nowplaying, 'title' =>'Now playing'  ]);
    }
    
    public function mymovies($id){
        if (Auth::guest()){
            return redirect("/login")->with('danger', 'Please login to access it');
        }else{
         $data = Movie::where(['tmdb_id' =>$id])->first();
         if(empty($data)){
            $movie = Movie::create([
               'user_id' => \Auth::user()->id,
               'tmdb_id' =>$id,
               'category_id' =>1,
           ]);

           \Session::flash('success','Record added');
           return redirect("/movie/$id");
         }
         return redirect("/movie/$id")->with('danger', 'The movie is already in your list');
        }
    }
    
    public function listmovies(){
        $data = Movie::where(['user_id' => \Auth::user()->id])->get();
        $records = [];
        foreach ($data as $movie) {
            $records[] = $this->movies->load($movie->tmdb_id);
        }
        
        echo "<pre>";
        print_r($records);
        echo "</pre>";
        
    }
}
