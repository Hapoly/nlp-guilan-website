@extends('layouts.app')
@section('title')
authors
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2">
      <table class="table">
        <thead class="grey">
          <th>id</th>
          <th>picture</th>
          <th>title</th>
          <th>graduation</th>
          <th>position</th>
          <th>operations</th>
        </thead>
        <tbody>
          @foreach($authors as $author)
            <tr>
              <td>{{$author->id}}</td>
              <td><img width="150" src="{{asset('storage/authors/' . $author->profile_url)}}" /></td>
              <td>{{$author->name}}</td>
              <td>{{$author->get_graduation_status()}}</td>
              <td>{{$author->get_position()}}</td>
              <td>
                <a href="{{route('normal.authors.show', ['author' => $author])}}">
                <i class="fa fa-file-text-o"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
