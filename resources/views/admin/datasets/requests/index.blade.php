@extends('layouts.app')
@section('title')
dataset requests
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-10 offset-lg-2 offset-md-2 offset-sm-1">
      <div class="border-radius">
        <form action="{{route('dataset-requests.index',['sort' => $sort ,'dataset' => 1])}}" method="get">
          <div class="row">
            <div class="col-lg-8" style="margin-top:13px;">
              <div class="input-group">
                <input class="form-control" name="search" placeholder="search..." value="{{$search != '###'? $search: ''}}" />
                <span class="input-group-btn">
                <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
              </div>
            </div>
            <div class="col-lg-4">
              <button type="button" class="btn btn-outline-secondary">
              <a href="{{route('dataset-requests.create')}}">create</a>
              </button>
            </div>
          </div>
        </form>
      <table class="table">
        <thead class="grey">
          <th><a href="{{route('dataset-requests.index',['search' => $search,'sort' => 'id'             ,'page' => $dataset_requests->currentPage()])}}">id</a></th>
          <th><a href="{{route('dataset-requests.index',['search' => $search,'sort' => 'name'           ,'page' => $dataset_requests->currentPage()])}}">name</a></th>
          <th><a href="{{route('dataset-requests.index',['search' => $search,'sort' => 'email'          ,'page' => $dataset_requests->currentPage()])}}">email</a></th>
          <th><a href="{{route('dataset-requests.index',['search' => $search,'sort' => 'datset_id' ,'page' => $dataset_requests->currentPage()])}}">dataset</a></th>
          <th>publication</th>
          <th><a href="{{route('dataset-requests.index',['search' => $search,'sort' => 'status'         ,'page' => $dataset_requests->currentPage()])}}">status</a></th>
          <th>operations</th>
        </thead>
        <tbody>
          @foreach($dataset_requests as $dataset_request)
          <tr>
            <td>{{$dataset_request->id}}</td>
            <td>{{$dataset_request->name}}</td>
            <td>{{$dataset_request->email}}</td>
            <td><a href="{{route('datasets.show', ['publication' => $dataset_request->dataset->publication])}}">{{$dataset_request->dataset->title}}</a></td>
            <td><a href="{{route('publications.show', ['publication' => $dataset_request->dataset])}}">{{$dataset_request->dataset->publication->title}}</a></td>
            <td>{{$dataset_request->get_status()}}</td>
            <td>
            <a href="{{route('dataset-requests.show', ['dataset_request' => $dataset_request])}}">
            <i class="fa fa-file-text-o"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
{{ $dataset_requests->links() }}

@endsection
