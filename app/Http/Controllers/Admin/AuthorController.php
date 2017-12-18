<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthor;
use Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
      $authors = new Author;
      $links = '';

      $sort = $request->input('sort', '###');
      $search = $request->input('search', '###');
      
      if($sort != '###' && $search == '###'){
        $authors = $authors->orderBy($request->input('sort'), 'desc');
        $authors = $authors->paginate(10);

        $links = $authors->appends(['sort' => $request->input('sort')])->links();

      }else if($sort == '###' && $search != '###'){
        $authors = $authors->where('name', 'LIKE', "%$search%");
        $authors = $authors->paginate(10);

        $links = $authors->appends(['sort' => $request->input('sort')])->links();

      }else if($sort != '###' && $search != '###'){
        $authors = $authors->where('name', 'LIKE', "%$search%");
        $authors = $authors->orderBy($request->input('sort'), 'desc');
        $authors = $authors->paginate(10);

        $links = $authors->appends(['sort' => $request->input('sort')])->links();

      }else{
        $authors = $authors->paginate(10);
      }
      
      // return json_encode($authors);
      return view('admin.authors.index', [
        'authors'   => $authors,
        'links'   => $links,
        'sort'    => $sort,
        'search'  => $search,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthor $request){
      $author = new Author;
      
      $author->name               = $request->input('name');
      $author->biography          = $request->input('biography');
      $author->graduation_status  = $request->input('graduation_status');
      $author->status             = $request->input('status');
      $author->position           = $request->input('position');
      $author->shown              = $request->input('shown');

      $image = Storage::put('public/authors', $request->file('image'), 'public');
      $image = explode('/', $image)[2];
      $author->profile_url = $image;

      $author->save();

      return redirect()->route('authors.show', ['author' => $author]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(author $author){
      return view('admin.authors.show', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(author $author){
      return view('admin.authors.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAuthor $request, author $author){
      $author->name               = $request->input('name');
      $author->biography          = $request->input('biography');
      $author->graduation_status  = $request->input('graduation_status');
      $author->status             = $request->input('status');
      $author->position           = $request->input('position');
      $author->shown              = $request->input('shown');

      if($request->hasFile('image')){
        $image = Storage::put('public/authors', $request->file('image'), 'public');
        $image = explode('/', $image)[2];
        $author->profile_url = $image;
      }

      $author->save();

      return redirect()->route('authors.show', ['author' => $author]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(author $author){
      $author->delete();
      return redirect()->route('authors.index');
    }
}
