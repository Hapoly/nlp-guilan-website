@extends('layouts.app')
@section('title')
datasets
@endsection
@section('content')
<a href="{{route('datasets.create')}}">create</a>
<form action="{{route('datasets.index',['sort' => $sort ,'dataset' => 1])}}" method="get">
  <input name="search" placeholder="search..." value="{{$search != '###'? $search: ''}}" />
  <button type="submit">search</button>
</form>
<table>
  <thead>
    <th><a href="{{route('datasets.index',['search' => $search,'sort' => 'id'       ,'page' => $datasets->currentPage()])}}">id</a></th>
    <th><a href="{{route('datasets.index',['search' => $search,'sort' => 'title'    ,'page' => $datasets->currentPage()])}}">title</a></th>
    <th><a href="{{route('datasets.index',['search' => $search,'sort' => 'type'     ,'page' => $datasets->currentPage()])}}">type</a></th>
    <th><a href="{{route('datasets.index',['search' => $search,'sort' => 'status'   ,'page' => $datasets->currentPage()])}}">status</a></th>
    <th>operations</th>
  </thead>
  <tbody>
    @foreach($datasets as $dataset)
      <tr>
        <td>{{$dataset->id}}</td>
        <td>{{$dataset->title}}</td>
        <td>{{$dataset->get_type()}}</td>
        <td>
          <a href="{{route('datasets.show', ['dataset' => $dataset])}}">show</a>
          <a href="{{route('datasets.edit', ['dataset' => $dataset])}}">edit</a>
          <form action="{{route('datasets.destroy', ['dataset' => $dataset])}}" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit">remove</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $datasets->links() }}

@endsection
