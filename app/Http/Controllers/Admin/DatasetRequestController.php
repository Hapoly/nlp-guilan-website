<?php

namespace App\Http\Controllers\Admin;

use App\DatasetRequest;
use App\Dataset;
use App\Publication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDatasetRequest;
use Storage;

class DatasetRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
      $dataset_requests = new DatasetRequest;
      $links = '';

      $sort = $request->input('sort', '###');
      $search = $request->input('search', '###');
      
      if($sort != '###' && $search == '###'){
        $dataset_requests = $dataset_requests->orderBy($request->input('sort'), 'desc');
        $dataset_requests = $dataset_requests->paginate(10);

        $links = $dataset_requests->appends(['sort' => $request->input('sort')])->links();

      }else if($sort == '###' && $search != '###'){
        $dataset_requests = $dataset_requests->where('title', 'LIKE', "%$search%");
        $dataset_requests = $dataset_requests->paginate(10);

        $links = $dataset_requests->appends(['sort' => $request->input('sort')])->links();

      }else if($sort != '###' && $search != '###'){
        $dataset_requests = $dataset_requests->where('title', 'LIKE', "%$search%");
        $dataset_requests = $dataset_requests->orderBy($request->input('sort'), 'desc');
        $dataset_requests = $dataset_requests->paginate(10);

        $links = $dataset_requests->appends(['sort' => $request->input('sort')])->links();

      }else{
        $dataset_requests = $dataset_requests->paginate(10);
      }
      
      // return json_encode($dataset_requests[0]->dataset->publication);
      return view('admin.datasets.requests.index', [
        'dataset_requests'    => $dataset_requests,
        'links'               => $links,
        'sort'                => $sort,
        'search'              => $search,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      $publications = Publication::all();
      return view('admin.datasets.requests.create', ['publications' => $publications]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storedataset $request){
      $dataset = new DatasetRequest;
      
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
    public function show(DatasetRequest $dataset_request){
      return view('admin.datasets.requests.show', ['dataset_request' => $dataset_request]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dataset  $dataset
     * @return \Illuminate\Http\Response
     */
    public function edit(dataset $dataset){
      return view('admin.datasets.requests.edit', ['dataset' => $dataset, 'publications' => Publication::all()]);
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
