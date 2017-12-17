<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePage;

class PageController extends Controller
{
    /**
     * Display a listing of the page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
      $pages = new Page;
      $links = '';

      $sort = $request->input('sort', '###');
      $search = $request->input('search', '###');
      
      if($sort != '###' && $search == '###'){
        $pages = $pages->orderBy($request->input('sort'), 'desc');
        $pages = $pages->paginate(10);

        $links = $pages->appends(['sort' => $request->input('sort')])->links();

      }else if($sort == '###' && $search != '###'){
        $pages = $pages->where('title', 'LIKE', "%$search%");
        $pages = $pages->paginate(10);

        $links = $pages->appends(['sort' => $request->input('sort')])->links();

      }else if($sort != '###' && $search != '###'){
        $pages = $pages->where('title', 'LIKE', "%$search%");
        $pages = $pages->orderBy($request->input('sort'), 'desc');
        $pages = $pages->paginate(10);

        $links = $pages->appends(['sort' => $request->input('sort')])->links();

      }else{
        $pages = $pages->paginate(10);
      }
      
      
      return view('admin.pages.index', [
        'pages'   => $pages,
        'links'   => $links,
        'sort'    => $sort,
        'search'  => $search,
      ]);
    }

    /**
     * Show the form for creating a new page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.pages.create');
    }

    /**
     * Store a newly created page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePage $request){
      $page = new Page;
      
      $page->title  = $request->input('title');
      $page->body   = $request->input('body');
      $page->status = $request->input('status');
      
      $page->save();

      return redirect()->route('pages.show', ['page' => $page]);
    }

    /**
     * Display the specified page.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page){
      return view('admin.pages.show', ['page' => $page]);
    }

    /**
     * Show the form for editing the specified page.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page){
      return view('admin.pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(StorePage $request, Page $page){
      $page->title  = $request->input('title');
      $page->body   = $request->input('body');
      $page->status = $request->input('status');
      
      $page->save();

      return redirect()->route('pages.show', ['page' => $page]);
    }

    /**
     * Remove the specified page from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page){
      $page->delete();
      return redirect()->route('pages.index');
    }
}
