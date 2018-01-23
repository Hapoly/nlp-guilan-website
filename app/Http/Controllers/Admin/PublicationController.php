<?php

namespace App\Http\Controllers\Admin;

use App\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePublication;

class PublicationController extends Controller
{
    /**
     * Display a listing of the publication.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
      $publications = new Publication;
      $links = '';

      $sort = $request->input('sort', '###');
      $search = $request->input('search', '###');
      
      if($sort != '###' && $search == '###'){
        $publications = $publications->orderBy($request->input('sort'), 'desc');
        $publications = $publications->paginate(10);

        $links = $publications->appends(['sort' => $request->input('sort')])->links();

      }else if($sort == '###' && $search != '###'){
        $publications = $publications->where('title', 'LIKE', "%$search%");
        $publications = $publications->paginate(10);

        $links = $publications->appends(['sort' => $request->input('sort')])->links();

      }else if($sort != '###' && $search != '###'){
        $publications = $publications->where('title', 'LIKE', "%$search%");
        $publications = $publications->orderBy($request->input('sort'), 'desc');
        $publications = $publications->paginate(10);

        $links = $publications->appends(['sort' => $request->input('sort')])->links();

      }else{
        $publications = $publications->paginate(10);
      }
      
      
      return view('admin.publications.index', [
        'publications'    => $publications,
        'links'           => $links,
        'sort'            => $sort,
        'search'          => $search,
      ]);
    }

    /**
     * Show the form for creating a new publication.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.publications.create');
    }

    /**
     * Store a newly created publication in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublication $request){
      $publication = new Publication;
      
      $publication->title   = $request->input('title');
      $publication->target  = $request->input('target');
      $publication->year    = $request->input('year');
      $publication->type    = $request->input('type');
      $publication->status  = $request->input('status');
      
      $publication->save();

      return redirect()->route('publications.show', ['publication' => $publication]);
    }

    /**
     * Display the specified publication.
     *
     * @param  \App\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication){
      return view('admin.publications.show', ['publication' => $publication]);
    }

    /**
     * Show the form for editing the specified publication.
     *
     * @param  \App\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication){
      return view('admin.publications.edit', ['publication' => $publication]);
    }

    /**
     * Update the specified publication in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(StorePublication $request, Publication $publication){
      
      $publication->title   = $request->input('title');
      $publication->target  = $request->input('target');
      $publication->year    = $request->input('year');
      $publication->type    = $request->input('type');
      $publication->status  = $request->input('status');
      
      $publication->save();

      return redirect()->route('publications.show', ['publication' => $publication]);
    }

    /**
     * Remove the specified publication from storage.
     *
     * @param  \App\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication){
      $publication->delete();
      return redirect()->route('publications.index');
    }
}
