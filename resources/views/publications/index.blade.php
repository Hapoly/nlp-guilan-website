@extends('layouts.app')
@section('title')
publications
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2">
      <table class="table">
        <thead class="grey">
          <th>title</th>
          <th>status</th>
          <th>type</th>
          <th>target</th>
          <th>operations</th>
        </thead>
        <tbody>
          @foreach($publications as $publication)
            <tr>
              <td>{{$publication->title}}</td>
              <td>{{$publication->get_status()}}</td>
              <td>{{$publication->get_type()}}</td>
              <td>{{$publication->target}}</td>
              <td>
                <a href="{{route('normal.publications.show', ['publication' => $publication])}}">
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
