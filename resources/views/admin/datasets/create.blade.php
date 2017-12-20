@extends('layouts.app')
@section('title')
new dataset
@endsection
@section('content')
<form action="{{route('datasets.store')}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  @if($errors->has('publication_id'))
    {{$errors->first('publication_id')}}
  @endif
  <select name="publication_id" required>
    @foreach($publications as $publication)
      <option value="{{$publication->id}}" {{old('publication_id') == $publication->id ? 'selected' : ''}}>{{$publication->title}}</option>
    @endforeach
  </select><br>
  @if($errors->has('title'))
    {{$errors->first('title')}}
  @endif
  <input name="title" placeholder="title" value="{{old('title')}}" required/><br>
  @if($errors->has('caption'))
    {{$errors->first('caption')}}
  @endif
  <textarea name="caption" line="3" placeholder="caption" required/>{{old('caption')}}</textarea><br>
  @if($errors->has('type'))
    {{$errors->first('type')}}
  @endif
  <select name="type" required>
    <option value="1" {{old('type') == 1? 'selected' : ''}}>downloadable</option>
    <option value="2" {{old('type') == 2? 'selected' : ''}}>have to request</option>
  </select><br>
  @if($errors->has('status'))
    {{$errors->first('status')}}
  @endif
  <select name="status" required>
    <option value="1" {{old('status') == 1? 'selected' : ''}}>published</option>
    <option value="2" {{old('status') == 2? 'selected' : ''}}>unpublished</option>
  </select><br>
  @if($errors->has('file_url'))
    {{$errors->first('file_url')}}
  @endif
  <input name="file_url" placeholder="dataset file url" value="{{old('file_url')}}" required/><br>
  
  <button type="submit">save</button>
</form>
@endsection
