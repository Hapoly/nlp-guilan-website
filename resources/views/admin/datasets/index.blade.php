@extends('layouts.app')
@section('title')
datasets
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-10 offset-lg-2 offset-md-2 offset-sm-1">
    <div class="border-radius">
    <form action="{{route('datasets.index',['sort' => $sort ,'dataset' => 1])}}" method="get">
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
          <button type="button" class="btn btn-outline-secondary create">
          <a href="{{route('datasets.create')}}">create</a>
          </button>
      </div>
      </div>
     </form>

  <table class="table">
    <thead class="grey">
      <th><a href="{{route('datasets.index',['search' => $search,'sort' => 'id'             ,'page' => $datasets->currentPage()])}}">id</a></th>
      <th><a href="{{route('datasets.index',['search' => $search,'sort' => 'title'          ,'page' => $datasets->currentPage()])}}">title</a></th>
      <th><a href="{{route('datasets.index',['search' => $search,'sort' => 'publication_id' ,'page' => $datasets->currentPage()])}}">publication</a></th>
      <th><a href="{{route('datasets.index',['search' => $search,'sort' => 'type'           ,'page' => $datasets->currentPage()])}}">type</a></th>
      <th><a href="{{route('datasets.index',['search' => $search,'sort' => 'status'         ,'page' => $datasets->currentPage()])}}">status</a></th>
      <th>operations</th>
    </thead>
    <tbody>
      @foreach($datasets as $dataset)
        <tr>
          <td>{{$dataset->id}}</td>
          <td>{{$dataset->title}}</td>
          <td><a href="{{route('publications.show', ['publication' => $dataset->publication])}}">{{$dataset->publication->title}}</a></td>
          <td>{{$dataset->get_type()}}</td>
          <td></td>
          <td>
            <a href="{{route('datasets.show', ['dataset' => $dataset])}}">
            <i class="fa fa-file-text-o"></i></a>
            <a href="{{route('datasets.edit', ['dataset' => $dataset])}}">
            <i class="fa fa-edit"></i></a>
            <form action="{{route('datasets.destroy', ['dataset' => $dataset])}}" method="POST" class="trash-icon">
              {{ method_field('DELETE') }}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-link"><i class="fa fa-trash-o"></i></button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
      </table>
      </div>
    </div>
  </div>
  </div>
  {{ $datasets->links() }}

  @endsection
