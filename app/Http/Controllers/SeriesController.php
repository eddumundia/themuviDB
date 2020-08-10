<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tmdb\Repository\TvRepository;
use Tmdb\Helper\ImageHelper;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $series;
    
    public function __construct(TvRepository $series, ImageHelper $helper)
    {
        $this->series = $series;
    }
      
    public function index($id = NULL)
    {
        $popular = $this->series->getPopular(array('page'=>$id));
       // $popular = $this->series->getPopular();
        
      // echo "<pre>";
      // print_r($popular);
      // echo "</pre>";
      // exit;
//        
         return view('series.index', [ 'popular' => $popular,'title' =>'Popular', 'route' => 'index' ]);
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
        $series = $this->series->load($id);
//        echo "<pre>";
//            print_r($series->getSeasons());
//            echo "</pre>";
//            exit();
//        
//        foreach ($series->getSeasons() as $value) {
//            echo "<pre>";
//            print_r($value);
//            echo "</pre>";
//        }
//       
//        exit;
//        
        return view('series.show', [ 'series' => $series ]);
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
        $toprated = $this->series->getTopRated(array('page'=>$id));
//        print_r($toprated);
//        exit;
        return view('series.index', [ 'popular' => $toprated,'title' =>'Popular', 'route' =>'toprated' ]);
    }
    
    public function upcoming($id = NULL){
      $upcoming = $this->series->getOnTheAir(array('page'=>$id));
      return view('series.index', [ 'popular' => $upcoming, 'title' =>'Upcoming', 'route' =>'upcoming'  ]);
    }
    
    public function nowplaying($id = NULL){
        $nowplaying = $this->series->getAiringToday(array('page'=>$id));
      
//      foreach ($nowplaying as $value) {
//          print_r($value->getLastAirDate());
//          exit;
//      }
      
//      
//      echo "<pre>";
//      print_r($nowplaying);
//      echo "</pre>";
//      exit;
      return view('series.index', [ 'popular' => $nowplaying, 'title' =>'Now playing', 'route' =>'nowplaying' ]);
    }
}
