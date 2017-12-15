@extends('layouts.app')
@section('title')
new page
@endsection
@section('content')
<form action="{{route('pages.store')}}" method="POST">
  {{csrf_field()}}
  <input name="title" placeholder="page title" value="{{$page->title}}"/><br>
  <textarea name="body" line="3" placeholder="page body"/>{{$page->body}}</textarea><br>
  <select name="status">
    <option value="1" {{$page->status == 1? 'selected': ''}}>published</option>
    <option value="2" {{$page->status == 2? 'selected': ''}}>unpublished</option>
  </select><br>
  <button type="submit">save</button>
</form>
@endsection
