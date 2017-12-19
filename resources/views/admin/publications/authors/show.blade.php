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
<div>
  <a href="{{route('publications.edit', ['publication' => $publication])}}">edit this publication</a>
</div>
<div>
  <form action="{{route('publications.destroy', ['publication' => $publication])}}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button type="submit">remove this publication</button>
  </form>
</div>
@endsection
