@extends('layouts.app')
@section('title')
new slide
@endsection
@section('content')
<form action="{{route('slides.store')}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  @if($errors->has('title'))
    {{$errors->first('title')}}
  @endif
  <input name="title" placeholder="slide title" value="{{old('title')}}"/><br>
  @if($errors->has('caption'))
    {{$errors->first('caption')}}
  @endif
  <textarea name="caption" line="3" placeholder="slide caption" value="{{old('caption')}}"/></textarea><br>
  @if($errors->has('status'))
    {{$errors->first('status')}}
  @endif
  <select name="status">
    <option value="1">published</option>
    <option value="2">unpublished</option>
  </select><br>
  @if($errors->has('target_link'))
    {{$errors->first('target_link')}}
  @endif
  <input name="target_link" placeholder="slide target link" value="{{old('target_link')}}"/><br>
  
  @if($errors->has('image'))
    {{$errors->first('image')}}
  @endif
  <input name="image" type="file" placeholder="slide image" value="{{old('image')}}"/><br>
  
  <button type="submit">save</button>
</form>
@endsection
