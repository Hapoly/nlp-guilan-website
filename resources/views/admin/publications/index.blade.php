@extends('layouts.app')
@section('title')
publications
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <div class="border-radius">
    <form action="{{route('publications.index',['sort' => $sort ,'publication' => 1])}}" method="get">
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
          <a href="{{route('publications.create')}}">create</a>
          </button>
      </div>
      </div>
     </form>

<table class="table">
  <thead class="grey">
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
          <a href="{{route('publications.show', ['publication' => $publication])}}">
          <i class="fa fa-file-text-o"></i></a>
          <a href="{{route('publications.edit', ['publication' => $publication])}}">
          <i class="fa fa-edit"></i></a>
          <form action="{{route('publications.destroy', ['publication' => $publication])}}" method="POST" class="trash-icon">
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
{{ $publications->links() }}

@endsection
