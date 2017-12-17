@extends('layouts.app')
@section('title')
slides
@endsection
@section('content')
<a href="{{route('slides.create')}}">create</a>
<form action="{{route('slides.index',['sort' => $sort ,'slide' => 1])}}" method="get">
  <input name="search" placeholder="search..." value="{{$search != '###'? $search: ''}}" />
  <button type="submit">search</button>
</form>
<table>
  <thead>
    <th><a href="{{route('slides.index',['search' => $search,'sort' => 'id'    ,'page' => $slides->currentPage()])}}">id</a></th>
    <th><a href="{{route('slides.index',['search' => $search,'sort' => 'title' ,'page' => $slides->currentPage()])}}">title</a></th>
    <th><a href="{{route('slides.index',['search' => $search,'sort' => 'status','page' => $slides->currentPage()])}}">status</a></th>
    <th>operations</th>
  </thead>
  <tbody>
    @foreach($slides as $slide)
      <tr>
        <td>{{$slide->id}}</td>
        <td>{{$slide->title}}</td>
        <td>{{$slide->status}}</td>
        <td>
          <a href="{{route('slides.show', ['slide' => $slide])}}">show</a>
          <a href="{{route('slides.edit', ['slide' => $slide])}}">edit</a>
          <form action="{{route('slides.destroy', ['slide' => $slide])}}" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit">remove</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $slides->links() }}

@endsection
