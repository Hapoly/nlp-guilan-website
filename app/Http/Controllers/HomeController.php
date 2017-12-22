<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Author;
use App\Publication;

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

    public function publications(Request $request){
      $publications = Publication::all();
      
      return view('publications.index', [
        'publications'   => $publications,
      ]);
    }

    public function publication(Request $request, $publication_id){
      $publication = Publication::find($publication_id);
      return view('publications.show', ['publication' => $publication]);
    }
}
