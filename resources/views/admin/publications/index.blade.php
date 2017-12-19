@extends('layouts.app')
@section('title')
publications
@endsection
@section('content')
<a href="{{route('publications.create')}}">create</a>
<form action="{{route('publications.index',['sort' => $sort ,'publication' => 1])}}" method="get">
  <input name="search" placeholder="search..." value="{{$search != '###'? $search: ''}}" />
  <button type="submit">search</button>
</form>
<table>
  <thead>
    <th><a href="{{route('publications.index',['search' => $search,'sort' => 'id'    ,'page' => $publications->currentPage()])}}">id</a></th>
    <th><a href="{{route('publications.index',['search' => $search,'sort' => 'title' ,'page' => $publications->currentPage()])}}">title</a></th>
    <th><a href="{{route('publications.index',['search' => $search,'sort' => 'status','page' => $publications->currentPage()])}}">status</a></th>
    <th><a href="{{route('publications.index',['search' => $search,'sort' => 'shown','page' => $publications->currentPage()])}}">type</a></th>
    <th>operations</th>
  </thead>
  <tbody>
    @foreach($publications as $publication)
      <tr>
        <td>{{$publication->id}}</td>
        <td>{{$publication->title}}</td>
        <td>{{$publication->get_status()}}</td>
        <td>{{$publication->get_type()}}</td>
        <td>
          <a href="{{route('publications.show', ['publication' => $publication])}}">show</a>
          <a href="{{route('publications.edit', ['publication' => $publication])}}">edit</a>
          <form action="{{route('publications.destroy', ['publication' => $publication])}}" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit">remove</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $publications->links() }}

@endsection
