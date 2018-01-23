<?php

namespace App\Http\Controllers\Admin;

use App\AuthorPublication;
use App\Publication;
use App\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorPublication;
use Storage;

class AuthorPublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $publication_id){
      $publication = Publication::find($publication_id);
      $authors = $publication->authors;
      $links = '';

      $sort = $request->input('sort', '###');
      $search = $request->input('search', '###');
      
      if($sort != '###')
        $authors = $authors->orderBy($request->input('sort'), 'desc');

      if($search != '###')
        $authors = $authors->where('name', 'LIKE', "%$search%");
      
      // return json_encode($authors);
      return view('admin.publications.authors.index', [
        'publication'   => $publication,
        'authors'       => $authors,
        'links'         => $links,
        'sort'          => $sort,
        'search'        => $search,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($publication_id)
    {
      $authors = Author::all();
      $publication = Publication::find($publication_id);

      return view('admin.publications.authors.create', [
        'authors'     => $authors,
        'publication' => $publication
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorPublication $request, $publication_id){
      $publicationauthor = new AuthorPublication;
      
      $publicationauthor->publication_id  = $publication_id;
      $publicationauthor->author_id       = $request->input('author_id');

      $publicationauthor->save();

      return redirect()->route('publication.authors', ['publication' => Publication::find($publication_id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\publicationauthor  $publicationauthor
     * @return \Illuminate\Http\Response
     */
    public function destroy($publication_id, $author_id){
      $publicationauthor = AuthorPublication::where([
        'publication_id'  => $publication_id,
        'author_id'       => $author_id,
      ])->delete();
      
      return redirect()->route('publication.authors', ['publication_id' => $publication_id]);
    }
}
