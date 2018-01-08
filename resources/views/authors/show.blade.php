@extends('layouts.app')
@section('title')
{{$author->name}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2">
    <table class="show-table" style="width:100%">
      <tr>
        <th>name </th>
        <td>{{$author->name}}</td>
      </tr>
      <tr>
        <th>biography </th>
        <td>{{$author->biography}}</td>
      </tr>
      <tr>
        <th>graduation state </th>
        <td>{{$author->get_graduation_status()}}</td>
      </tr>
      <tr>
        <th>position </th>
        <td>{{$author->get_position()}}</td>
      </tr>
      <tr>
        <th>status </th>
        <td>{{$author->get_status()}}</td>
      </tr>
    </table>
        <div>
          <img width="150" src="{{asset('storage/authors/' . $author->profile_url)}}" />
        </div>
        <table class="table">
          <thead class="grey">
            <th>id</th>
            <th>title</th>
            <th>status</th>
            <th>type</th>
            <th>target</th>
            <th>operations</th>
          </thead>
          <tbody>
            @foreach($author->publications as $publication)
              <tr>
                <td>{{$publication->id}}</td>
                <td>{{$publication->title}}</td>
                <td>{{$publication->get_status()}}</td>
                <td>{{$publication->get_type()}}</td>
                <td>{{$publication->target}}</td>
                <td>
                  <a href="{{route('publications.show', ['publication' => $publication])}}">
                  <i class="fa fa-file-text-o"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

            
          </div>
        </div>



@endsection
