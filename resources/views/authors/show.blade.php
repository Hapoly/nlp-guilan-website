@extends('layouts.app')
@section('title')
{{$author->name}}
@endsection
@section('content')
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
<table>
  <thead>
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
@endsection
