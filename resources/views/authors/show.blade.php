@extends('layouts.app')
@section('title')
{{$author->name}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2">
    <div class="card">
      <div class="card-block">
        <div>
          <b>name:</b>{{$author->name}}
        </div>
        <div>
          <b>biography:</b>{{$author->biography}}
        </div>
        <div>
          <b>graduation state:</b>{{$author->get_graduation_status()}}
        </div>
        <div>
          <b>position:</b>{{$author->get_position()}}
        </div>
        <div>
          <b>status:</b>{{$author->get_status()}}
        </div>
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
                  <a href="{{route('publications.show', ['publication' => $publication])}}">show</a>
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
