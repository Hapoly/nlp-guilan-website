@extends('layouts.app')
@section('title')
authors
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2">
    <div class="border-radius">
    <form action="{{route('authors.index',['sort' => $sort ,'author' => 1])}}" method="get">
        <div class="row">
          <div class="col-lg-8" style="margin-top:13px;">
            <div class="input-group">
            <input class="form-control"  name="search" placeholder="search..." value="{{$search != '###'? $search: ''}}" />
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="submit">Go!</button>
              </span>
            </div>
        </div>
        <div class="col-lg-4">
            <button type="button" class="btn btn-outline-secondary create">
            <a href="{{route('authors.create')}}">create</a>
            </button>
        </div>
        </div>
      </form>


<table class="table">
  <thead class="grey">
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
          <a href="{{route('authors.show', ['author' => $author])}}">
          <i class="fa fa-file-text-o"></i></a>
          <a href="{{route('authors.edit', ['author' => $author])}}">
          <i class="fa fa-edit"></i></a>
          <form action="{{route('authors.destroy', ['author' => $author])}}" method="POST" class="trash-icon">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <i class="fa fa-trash-o"></i>
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
{{ $authors->links() }}

@endsection
