@extends('layouts.app')
@section('title')
new page
@endsection
@section('content')
<form action="{{route('pages.store')}}" method="POST">
  {{csrf_field()}}
  <input name="title" placeholder="page title" value=""/><br>
  <textarea name="body" line="3" placeholder="page body" value=""/></textarea><br>
  <select name="status">
    <option value="1">published</option>
    <option value="2">unpublished</option>
  </select><br>
  <button type="submit">save</button>
</form>
@endsection
