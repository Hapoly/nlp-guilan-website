<?php

namespace App\Http\Controllers\Admin;

use App\Dataset;
use App\Publication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataset;
use Storage;

class DatasetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
      $datasets = new Dataset;
      $links = '';

      $sort = $request->input('sort', '###');
      $search = $request->input('search', '###');
      
      if($sort != '###' && $search == '###'){
        $datasets = $datasets->orderBy($request->input('sort'), 'desc');
        $datasets = $datasets->paginate(10);

        $links = $datasets->appends(['sort' => $request->input('sort')])->links();

      }else if($sort == '###' && $search != '###'){
        $datasets = $datasets->where('title', 'LIKE', "%$search%");
        $datasets = $datasets->paginate(10);

        $links = $datasets->appends(['sort' => $request->input('sort')])->links();

      }else if($sort != '###' && $search != '###'){
        $datasets = $datasets->where('title', 'LIKE', "%$search%");
        $datasets = $datasets->orderBy($request->input('sort'), 'desc');
        $datasets = $datasets->paginate(10);

        $links = $datasets->appends(['sort' => $request->input('sort')])->links();

      }else{
        $datasets = $datasets->paginate(10);
      }
      
      // return json_encode($datasets);
      return view('admin.datasets.index', [
        'datasets'   => $datasets,
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
    public function create(){
      $publications = Publication::all();
      return view('admin.datasets.create', ['publications' => $publications]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storedataset $request){
      $dataset = new Dataset;
      
      $dataset->title           = $request->input('title');
      $dataset->caption         = $request->input('caption');
      $dataset->file_url        = $request->input('file_url');
      $dataset->type            = $request->input('type');
      $dataset->status          = $request->input('status');
      $dataset->publication_id  = $request->input('publication_id');

      $dataset->save();

      return redirect()->route('datasets.show', ['dataset' => $dataset]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dataset  $dataset
     * @return \Illuminate\Http\Response
     */
    public function show(dataset $dataset){
      return view('admin.datasets.show', ['dataset' => $dataset]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dataset  $dataset
     * @return \Illuminate\Http\Response
     */
    public function edit(dataset $dataset){
      return view('admin.datasets.edit', ['dataset' => $dataset, 'publications' => Publication::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dataset  $dataset
     * @return \Illuminate\Http\Response
     */
    public function update(Storedataset $request, dataset $dataset){
      $dataset->title           = $request->input('title');
      $dataset->caption         = $request->input('caption');
      $dataset->file_url        = $request->input('file_url');
      $dataset->type            = $request->input('type');
      $dataset->status          = $request->input('status');
      $dataset->publication_id  = $request->input('publication_id');

      $dataset->save();

      return redirect()->route('datasets.show', ['dataset' => $dataset]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dataset  $dataset
     * @return \Illuminate\Http\Response
     */
    public function destroy(dataset $dataset){
      $dataset->delete();
      return redirect()->route('datasets.index');
    }
}
