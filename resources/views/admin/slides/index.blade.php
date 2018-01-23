@extends('layouts.app')
@section('title')
slides
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
      <form action="{{route('slides.index',['sort' => $sort ,'slide' => 1])}}" method="get">
        <div class="row">
          <div class="col-lg-8" style="margin-top:13px;">
            <div class="input-group">
              <input  class="form-control"  name="search" placeholder="search..." value="{{$search != '###'? $search: ''}}" />
              <span class="input-group-btn">
               <button class="btn btn-secondary" type="submit">Go!</button>
              </span>
            </div>
          </div>
          <div class="col-lg-4">
            <button type="button" class="btn btn-outline-secondary create">
              <a href="{{route('slides.create')}}">create</a>
            </button>
          </div>
        </div>
      </form>
      <table class="table">
        <thead class="grey">
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
            <td>{{$slide->get_status()}}</td>
            <td>
              <a href="{{route('slides.show', ['slide' => $slide])}}">
                <i class="fa fa-file-text-o"></i>
              </a>
              <a href="{{route('slides.edit', ['slide' => $slide])}}">
               <i class="fa fa-edit"></i>
              </a>
              <form action="{{route('slides.destroy', ['slide' => $slide])}}" method="POST" class="trash-icon">
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
{{ $slides->links() }}

@endsection
