@extends('layouts.app')
@section('title')
authors
@endsection
@section('content')
<a href="{{route('authors.create')}}">create</a>
<form action="{{route('authors.index',['sort' => $sort ,'author' => 1])}}" method="get">
  <input name="search" placeholder="search..." value="{{$search != '###'? $search: ''}}" />
  <button type="submit">search</button>
</form>
<table>
  <thead>
    <th><a href="{{route('authors.index',['search' => $search,'sort' => 'id'    ,'page' => $authors->currentPage()])}}">id</a></th>
    <th><a href="{{route('authors.index',['search' => $search,'sort' => 'title' ,'page' => $authors->currentPage()])}}">title</a></th>
    <th><a href="{{route('authors.index',['search' => $search,'sort' => 'status','page' => $authors->currentPage()])}}">status</a></th>
    <th><a href="{{route('authors.index',['search' => $search,'sort' => 'shown','page' => $authors->currentPage()])}}">shown</a></th>
    <th>operations</th>
  </thead>
  <tbody>
    @foreach($authors as $author)
      <tr>
        <td>{{$author->id}}</td>
        <td>{{$author->name}}</td>
        <td>{{$author->get_status()}}</td>
        <td>{{$author->is_shown()}}</td>
        <td>
          <a href="{{route('authors.show', ['author' => $author])}}">show</a>
          <a href="{{route('authors.edit', ['author' => $author])}}">edit</a>
          <form action="{{route('authors.destroy', ['author' => $author])}}" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit">remove</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $authors->links() }}

@endsection
