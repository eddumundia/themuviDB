<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tmdb\Laravel\Facades\Tmdb;
use Tmdb\Helper\ImageHelper;
use Tmdb\Repository\GenreRepository;


class GenreController extends Controller
{
    private $movies;
    
    public function __construct(GenreRepository $genre, ImageHelper $helper)
    {
        $this->genres = $genre;
    }
    
    
    public function index($id, $page = NULL){

        
        $genres = $this->genres->getMovies($id, array('page' =>$page));
        return view('genres.index', ['popular' => $genres, 'title' =>'Movies based on genres', 'route' =>$id]);
    }
}
