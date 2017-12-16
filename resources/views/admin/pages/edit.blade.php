@extends('layouts.app')
@section('title')
edit page $page->title
@endsection
@section('content')
<form action="{{route('pages.update', ['page' => $page])}}" method="POST">
  {{csrf_field()}}
  {{ method_field('PUT') }}
  @if($errors->has('title'))
    {{$errors->first('title')}}
  @endif
  <input name="title" placeholder="page title" value="{{$errors->has('title')? old('title'): $page->title}}"/><br>
  @if($errors->has('body'))
    {{$errors->first('body')}}
  @endif
  <textarea name="body" line="3" placeholder="page body"/>{{$errors->has('body')? old('body'): $page->body}}</textarea><br>
  @if($errors->has('status'))
    {{$errors->first('status')}}
  @endif
  <select name="status">
    <option value="1" {{$errors->has('status')? (old('status') == 1? 'selected' : ''):($page->status == 1? 'selected': '')}}>published</option>
    <option value="2" {{$errors->has('status')? (old('status') == 2? 'selected' : ''):($page->status == 2? 'selected': '')}}>unpublished</option>
  </select><br>
  <button type="submit">save</button>
</form>
@endsection
