@extends('layouts.app')
@section('title')
publication authors
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <div class="border-radius">
      <form action="{{url('admin/publication/' . $publication->id . '/authors' . ($sort != '###' ? '?sort='.$sort: ''))}}" method="get">
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
            <button type="button" class="btn btn-outline-secondary">
            <a href="{{route('publication.authors.create', ['publication_id' => $publication->id])}}">create</a>
            </button>
        </div>
        </div>
      </form>

      <table class="table">
        <thead class="grey">
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
    </div>
  </div>
</div>
</div>

@endsection
