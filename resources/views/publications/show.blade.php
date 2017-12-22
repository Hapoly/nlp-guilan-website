@extends('layouts.app')
@section('title')
{{$publication->title}}
@endsection
@section('content')
<div>
  <b>title:</b>{{$publication->title}}
</div>
<div>
  <b>target:</b>{{$publication->target}}
</div>
<div>
  <b>year:</b>{{$publication->year}}
</div>
<div>
  <b>paper type:</b>{{$publication->get_type()}}
</div>
<div>
  <b>status:</b>{{$publication->get_status()}}
</div>
<table>
  <thead>
    <th>id</th>
    <th>picture</th>
    <th>title</th>
    <th>graduation</th>
    <th>position</th>
    <th>operations</th>
  </thead>
  <tbody>
    @foreach($publication->authors as $author)
      <tr>
        <td>{{$author->id}}</td>
        <td><img width="150" src="{{asset('storage/authors/' . $author->profile_url)}}" /></td>
        <td>{{$author->name}}</td>
        <td>{{$author->get_graduation_status()}}</td>
        <td>{{$author->get_position()}}</td>
        <td>
          <a href="{{route('normal.authors.show', ['author' => $author])}}">show</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
