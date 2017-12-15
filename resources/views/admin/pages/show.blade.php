@extends('layouts.app')
@section('title')
new page
@endsection
@section('content')
<div>
  <b>title:</b>{{$page->title}}
</div>
<div>
  <b>body:</b>{{$page->body}}
</div>
<div>
  <b>status:</b>{{$page->get_status()}}
</div>
<div>
  <a href="{{route('pages.edit', ['page' => $page])}}">edit this page</a>
</div>
@endsection
