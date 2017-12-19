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
  <img src="{{asset('storage/authors/' . $author->profile_url)}}" />
</div>
<div>
  <a href="{{route('authors.edit', ['author' => $author])}}">edit this author</a>
</div>
<div>
  <form action="{{route('authors.destroy', ['author' => $author])}}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button type="submit">remove this author</button>
  </form>
</div>
@endsection
