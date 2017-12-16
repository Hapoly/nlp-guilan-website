@extends('layouts.app')
@section('title')
pages
@endsection
@section('content')
<a href="{{route('pages.create')}}">create</a>
<form action="{{route('pages.index',['sort' => $sort ,'page' => 1])}}" method="get">
  <input name="search" placeholder="search..." value="{{$search != '###'? $search: ''}}" />
  <button type="submit">search</button>
</form>
<table>
  <thead>
    <th><a href="{{route('pages.index',['search' => $search,'sort' => 'id'    ,'page' => $pages->currentPage()])}}">id</a></th>
    <th><a href="{{route('pages.index',['search' => $search,'sort' => 'title' ,'page' => $pages->currentPage()])}}">title</a></th>
    <th><a href="{{route('pages.index',['search' => $search,'sort' => 'status','page' => $pages->currentPage()])}}">status</a></th>
    <th>operations</th>
  </thead>
  <tbody>
    @foreach($pages as $page)
      <tr>
        <td>{{$page->id}}</td>
        <td>{{$page->title}}</td>
        <td>{{$page->status}}</td>
        <td>
          <a href="{{route('pages.show', ['page' => $page])}}">show</a>
          <a href="{{route('pages.edit', ['page' => $page])}}">edit</a>
          <form action="{{route('pages.destroy', ['page' => $page])}}" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit">remove</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $pages->links() }}

@endsection
