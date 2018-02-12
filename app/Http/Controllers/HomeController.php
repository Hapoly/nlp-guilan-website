<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Author;
use App\Publication;
use App\Dataset;
use App\DatasetRequest;
use App\Page;

use Illuminate\Support\Facades\Mail;
use App\Mail\DatasetRequestAccepted;
use App\Http\Requests\StoreDatasetRequest;

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
      // return $slides;
      return view('home', [ 
        'slides'        => Slide::      where(['status'  => 1])->get(),
        'publications'  => Publication::where(['status'  => 1])->limit(5)->get(),
      ]);
    }

    public function authors(Request $request){
      $authors = Author::
          whereIn('status', [Author::ACTIVE, Author::OLD])
        ->where('shown', Author::SHOWN)->get();
      
      return view('authors.index', [
        'authors'   => $authors,
      ]);
    }

    public function author(Request $request, $author_id){
      $author = Author::find($author_id);
      return view('authors.show', ['author' => $author]);
    }

    public function publications(Request $request){
      $publications = Publication::where(['status' => Publication::PUBLISHED])->get();
      
      return view('publications.index', [
        'publications'   => $publications,
      ]);
    }

    public function publication(Request $request, $publication_id){
      $publication = Publication::find($publication_id);
      return view('publications.show', ['publication' => $publication]);
    }

    public function datasets(Request $request){
      $datasets = Dataset::where(['status' => Dataset::PUBLISHED])->get();
      
      return view('datasets.index', [
        'datasets'   => $datasets,
      ]);
    }

    public function dataset(Request $request, $dataset_id){
      $dataset = Dataset::find($dataset_id);
      return view('datasets.show', ['dataset' => $dataset]);
    }

    public function dataset_request(StoreDatasetRequest $request, $dataset_id){
      $dataset = Dataset::find($dataset_id);
      $dataset_request = new DatasetRequest;
      
      $dataset_request->name = $request->input('name');
      $dataset_request->email = $request->input('email');
      $dataset_request->university = $request->input('university');
      $dataset_request->use_case = $request->input('use_case');
      $dataset_request->status = 1;
      $dataset_request->dataset_id = $dataset_id;

      $dataset_request->save();
      
      // Mail::to($request->user())->send(new DatasetRequestAccepted($dataset));
      return view('datasets.show', ['dataset' => $dataset, 'request_sent' => true]);
    }

    public function page(Page $page){
      return view('page', ['page' => $page]);
    }
}
