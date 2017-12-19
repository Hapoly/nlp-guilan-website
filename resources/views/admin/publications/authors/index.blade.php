@extends('layouts.app')
@section('title')
publication authors
@endsection
@section('content')
<a href="{{route('publication.authors.create', ['publication_id' => $publication->id])}}">create</a>
<form action="{{url('admin/publication/' . $publication->id . '/authors' . ($sort != '###' ? '?sort='.$sort: ''))}}" method="get">
  <input name="search" placeholder="search..." value="{{$search != '###'? $search: ''}}" />
  <button type="submit">search</button>
</form>
<table>
  <thead>
    <th><a href="{{url('admin/publication/' . $publication->id . '/authors?sort=id' . ($search != '###'? '&search=' . $search: ''))}}">id</a></th>
    <th><a href="{{url('admin/publication/' . $publication->id . '/authors?sort=name' . ($search != '###'? '&search=' . $search: ''))}}">name</a></th>
    <th><a href="{{url('admin/publication/' . $publication->id . '/authors?sort=position' . ($search != '###'? '&search=' . $search: ''))}}">position</a></th>
    <th>operations</th>
  </thead>
  <tbody>
    @foreach($authors as $author)
      <tr>
        <td>{{$author->id}}</td>
        <td>{{$author->name}}</td>
        <td>{{$author->get_position()}}</td>
        <td>
          <form action="{{url('admin/publication/'. $publication->id .'/authors/destroy/' . $author->id)}}" method="POST">
            {{ csrf_field() }}
            <button type="submit">remove</button>
          </form>  
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
