<?php

namespace App\Http\Controllers\Admin;

use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $slides = new Slide;
      $links = '';

      $sort = $request->input('sort', '###');
      $search = $request->input('search', '###');
      
      if($sort != '###' && $search == '###'){
        $slides = $slides->orderBy($request->input('sort'), 'desc');
        $slides = $slides->paginate(10);

        $links = $slides->appends(['sort' => $request->input('sort')])->links();

      }else if($sort == '###' && $search != '###'){
        $slides = $slides->where('title', 'LIKE', "%$search%");
        $slides = $slides->paginate(10);

        $links = $slides->appends(['sort' => $request->input('sort')])->links();

      }else if($sort != '###' && $search != '###'){
        $slides = $slides->where('title', 'LIKE', "%$search%");
        $slides = $slides->orderBy($request->input('sort'), 'desc');
        $slides = $slides->paginate(10);

        $links = $slides->appends(['sort' => $request->input('sort')])->links();

      }else{
        $slides = $slides->paginate(10);
      }
      
      
      return view('admin.slides.index', [
        'slides'   => $slides,
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
      return view('admin.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSlide $request)
    {
      $slide = new Slide;
      
      $slide->title         = $request->input('title');
      $slide->caption       = $request->input('caption');
      $slide->target_link   = $request->has('target_link')? $request->input('target_link'): $slide->target_link;
      $slide->status        = $request->input('status');
      
      $slide->save();

      return redirect()->route('slides.show', ['slide' => $slide]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide){
      return view('admin.slides.show', ['slide' => $slide]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide){
      return view('admin.slides.edit', ['slide' => $slide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide){
      $slide->title         = $request->input('title');
      $slide->caption       = $request->input('caption');
      $slide->target_link   = $request->has('target_link')? $request->input('target_link'): $slide->target_link;
      $slide->status        = $request->input('status');
      
      $slide->save();

      return redirect()->route('slides.show', ['slide' => $slide]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide){
      $slide->delete();
      return redirect()->route('slides.index');
    }
}
