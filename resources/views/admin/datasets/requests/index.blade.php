@extends('layouts.app')
@section('title')
dataset requests
@endsection
@section('content')
<a href="{{route('dataset-requests.create')}}">create</a>
<form action="{{route('dataset-requests.index',['sort' => $sort ,'dataset' => 1])}}" method="get">
  <input name="search" placeholder="search..." value="{{$search != '###'? $search: ''}}" />
  <button type="submit">search</button>
</form>
<table>
  <thead>
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
          <a href="{{route('dataset-requests.show', ['dataset_request' => $dataset_request])}}">show</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $dataset_requests->links() }}

@endsection
