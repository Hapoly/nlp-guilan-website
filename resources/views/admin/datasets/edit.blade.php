@extends('layouts.app')
@section('title')
edit dataset $dataset->title
@endsection
@section('content')
<form action="{{route('datasets.update', ['dataset' => $dataset])}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  {{ method_field('PUT') }}
  @if($errors->has('publication_id'))
    {{$errors->first('publication_id')}}
  @endif
  <select name="publication_id" required>
    @foreach($publications as $pub)
      <option value="{{$pub->id}}" {{$errors->has('publication_id')? (old('publication_id') == $pub->id ? 'selected' : '') : ($dataset->publication_id == $pub->id? 'selected': '')}}>{{$pub->title}}</option>
    @endforeach
  </select><br>
  @if($errors->has('title'))
    {{$errors->first('title')}}
  @endif
  <input name="title" placeholder="title" value="{{$errors->has('title')? old('title'): $dataset->title}}" required/><br>
  @if($errors->has('caption'))
    {{$errors->first('caption')}}
  @endif
  <textarea name="caption" line="3" placeholder="caption" required/>{{$errors->has('caption')? old('caption'): $dataset->caption}}</textarea><br>
  @if($errors->has('type'))
    {{$errors->first('type')}}
  @endif
  <select name="type" required>
    <option value="1" {{$errors->has('type')? (old('type') == 1? 'selected' : ''): ($dataset->type == 1? 'selected': '')}}>downloadable</option>
    <option value="2" {{$errors->has('type')? (old('type') == 2? 'selected' : ''): ($dataset->type == 2? 'selected': '')}}>have to request</option>
  </select><br>
  @if($errors->has('status'))
    {{$errors->first('status')}}
  @endif
  <select name="status" required>
    <option value="1" {{$errors->has('status')? (old('status') == 1? 'selected' : ''): ($dataset->status == 1? 'selected': '')}}>published</option>
    <option value="2" {{$errors->has('status')? (old('status') == 1? 'selected' : ''): ($dataset->status == 1? 'selected': '')}}>unpublished</option>
  </select><br>
  
  @if($errors->has('file_url'))
    {{$errors->first('file_url')}}
  @endif
  <input name="file_url" placeholder="dataset file url" value="{{$errors->has('file_url')? old('file_url'): $dataset->file_url}}" required/><br>
  
  <button type="submit">save</button>
</form>
@endsection
