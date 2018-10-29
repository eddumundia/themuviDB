<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tmdb\Helper\ImageHelper;
use Tmdb\Repository\PeopleRepository;

class PersonController extends Controller
{
    
    private $people;
    
    public function __construct(PeopleRepository $people, ImageHelper $helper)
    {
        $this->people = $people;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popular = $this->people->getpopular();
        
//        echo "<pre>";
//        foreach ($popular as $value) {
//           print_r($value);
//        }
//        
//        echo "</pre>";
//        exit;
//        
        return view('person.index', [ 'popular' => $popular ]);
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
        $person = $this->people->load($id);
//        echo "<pre>";
//        foreach ($person->getmovieCredits()->getcast() as $release){
//            print_r($release->getreleaseDate());
//            echo "<br>";
//        };
//        echo "</pre>";
//        exit;
        
//        foreach ($person->getmovieCredits()->getcast() as $value) {
//            echo $value->getreleaseDate()->format("Y");
//            exit;
//        }
      
        return view('person.show', [ 'person' => $person ]);
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
