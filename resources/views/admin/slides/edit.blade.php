@extends('layouts.app')
@section('title')
edit slide $slide->title
@endsection
@section('content')
<form action="{{route('slides.update', ['slide' => $slide])}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  {{ method_field('PUT') }}
  @if($errors->has('title'))
    {{$errors->first('title')}}
  @endif
  <input name="title" placeholder="slide title" value="{{$errors->has('title')? old('title'): $slide->title}}" required/><br>
  @if($errors->has('caption'))
    {{$errors->first('caption')}}
  @endif
  <textarea name="caption" line="3" placeholder="slide caption" required/>{{$errors->has('caption')? old('caption'): $slide->caption}}</textarea><br>
  @if($errors->has('status'))
    {{$errors->first('status')}}
  @endif
  @if($errors->has('target_link'))
    {{$errors->first('target_link')}}
  @endif
  <input name="target_link" placeholder="slide target_link" value="{{$errors->has('target_link')? old('target_link'): $slide->target_link}}" required/><br>
  @if($errors->has('status'))
    {{$errors->first('status')}}
  @endif
  <select name="status">
    <option value="1" {{$errors->has('status')? (old('status') == 1? 'selected' : ''):($slide->status == 1? 'selected': '')}}>published</option>
    <option value="2" {{$errors->has('status')? (old('status') == 2? 'selected' : ''):($slide->status == 2? 'selected': '')}}>unpublished</option>
  </select><br>
  @if($errors->has('image'))
    {{$errors->first('image')}}
  @endif
  <input name="image" type="file" placeholder="slide image"/><br>
  <button type="submit">save</button>
</form>
@endsection
