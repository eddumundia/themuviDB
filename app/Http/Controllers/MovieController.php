<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tmdb\Laravel\Facades\Tmdb;
use Tmdb\Helper\ImageHelper;
use Tmdb\Repository\MovieRepository;
use Tmdb\Repository\GenreRepository;

use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $movies;
    
    public function __construct(MovieRepository $movies, GenreRepository $genre, ImageHelper $helper)
    {
        $this->movies = $movies;
        $this->genres = $genre;
    }
    public function index($id = NULL)
    {
        $popular = $this->movies->getPopular(array('page'=>$id));
        return view('movie.index', [ 'popular' => $popular, 'title' =>'Popular', 'route' =>'index']);
        
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
//            print_r($movie->getGenres());
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
    
    public function toprated($id = NULL){
        $toprated = $this->movies->getTopRated(array('page'=>$id));
        return view('movie.index', ['popular' => $toprated, 'title' =>'Top rated', 'route' =>'toprated']);
    }
    
    public function upcoming($id = NULL){
      $upcoming = $this->movies->getUpcoming(array('page'=>$id));
      return view('movie.index', [ 'popular' => $upcoming , 'title' =>'Upcoming', 'route' =>'upcoming']);
    }
    
    public function nowplaying($id = NULL){
      $nowplaying = $this->movies->getNowPlaying(array('page'=>$id));
      return view('movie.index', [ 'popular' => $nowplaying, 'title' =>'Now playing', 'route' =>'nowplaying']);
    }
    
    public function mymovies($id){
        if (\Auth::guest()){
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
           return redirect("/movie/listmovies");
         }
         return redirect("/movie/listmovies")->with('danger', 'The movie is already in your list');
        }
    }
    
    public function listmovies(){
        $test = geoip($ip = '192.168.100.203');
        echo "<pre>";
        print_r($test);
        exit;
//        $data = Movie::where(['user_id' => \Auth::user()->id])
//                ->orderBy('id','DESC')
//                ->get();
//        $records = [];
//        foreach ($data as $movie) {
//            $records[] = $this->movies->load($movie->tmdb_id);
//        }
//        return view('movie.mymovies', [ 'records' => $records]);      
   }
   
   
    
    public function collection(){
        $genre = $this->genres->loadMovieCollection();
        $toprated = $this->movies->getTopRated();
        $movieTmdb = \App\Random::all()->random(1);
        $image = $movieTmdb[0]->image;
        $bannerdetails = $this->movies->load($movieTmdb[0]->tmdb_id);
        return view('movie.home', ['popular' => $toprated, 'genres' => $genre, 'bannerdetails' =>$bannerdetails]);
    }
}
