@extends('layouts.app')
@section('title')
pages
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <form action="{{route('pages.index',['sort' => $sort ,'page' => 1])}}" method="get">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="input-group">
            <input class="form-control"  name="search" placeholder="search..." value="{{$search != '###'? $search: ''}}">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="submit">Go!</button>
            </span>
          </div>
       </div>
      </div>
     </form>
      <a href="{{route('pages.create')}}">create</a>
    
      <table class="table">
        <thead class="grey">
          <tr>
            <th><a href="{{route('pages.index',['search' => $search,'sort' => 'id'    ,'page' => $pages->currentPage()])}}">id</a></th>
            <th><a href="{{route('pages.index',['search' => $search,'sort' => 'title' ,'page' => $pages->currentPage()])}}">title</a></th>
            <th><a href="{{route('pages.index',['search' => $search,'sort' => 'status','page' => $pages->currentPage()])}}">status</a></th>
            <th>operations</th>
          </tr>
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
      </div>
      
  </div>
</div>
{{ $pages->links() }}

@endsection
