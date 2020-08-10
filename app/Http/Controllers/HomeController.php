<?php

namespace App\Http\Controllers;
use Tmdb\Helper\ImageHelper;
use Tmdb\Repository\PeopleRepository;
use Tmdb\Repository\MovieRepository;

use Illuminate\Http\Request;

class HomeController extends Controller
{
     private $movies;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MovieRepository $movies, PeopleRepository $people, ImageHelper $helper)
    {
        $this->people = $people;
        $this->movies = $movies;
        $this->middleware('auth');
    }
    public function index(){
        $popular = $this->movies->getPopular();

        return view('home.index', [ 'popular' => $popular, 'title' =>'Popular', 'route' =>'index']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
}
