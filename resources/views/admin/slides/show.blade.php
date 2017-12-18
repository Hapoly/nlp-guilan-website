@extends('layouts.app')
@section('title')
{{$slide->title}}
@endsection
@section('content')
<div>
  <b>title:</b>{{$slide->title}}
</div>
<div>
  <b>caption:</b>{{$slide->caption}}
</div>
<div>
  <b>status:</b>{{$slide->get_status()}}
</div>
<div>
  <img src="{{asset('storage/slides/' . $slide->image_url)}}" />
</div>
<div>
  <a href="{{route('slides.edit', ['slide' => $slide])}}">edit this slide</a>
</div>
<div>
  <form action="{{route('slides.destroy', ['slide' => $slide])}}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button type="submit">remove this slide</button>
  </form>
</div>
@endsection
