<?php

namespace App\Http\Controllers;
use Tmdb\Helper\ImageHelper;
use Tmdb\Repository\PeopleRepository;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PeopleRepository $people, ImageHelper $helper)
    {
        $this->people = $people;
        $this->middleware('auth');
    }
    public function index(){
        $popular = $this->people->getpopular();
        return view('home.index', [ 'popular' => $popular ]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
}
