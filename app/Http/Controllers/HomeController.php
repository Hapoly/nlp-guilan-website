<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Author;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $slides = Slide::all();
      // return $slides;
      return view('home', [ 
        'slides' => $slides
      ]);
    }

    public function authors(Request $request){
      $authors = Author::all();
      
      return view('authors.index', [
        'authors'   => $authors,
      ]);
    }

    public function author(Request $request, $author_id){
      $author = Author::find($author_id);
      return view('authors.show', ['author' => $author]);
    }
}
