@extends('layouts.app')
@section('title')
edit publication $publication->title
@endsection
@section('content')
<form action="{{route('publications.update', ['publication' => $publication])}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  {{ method_field('PUT') }}

  @if($errors->has('title'))
    {{$errors->first('title')}}
  @endif
  <input name="title" placeholder="publication title" value="{{$errors->has('title')? old('title'): $publication->title}}" required/><br>
  @if($errors->has('year'))
    {{$errors->first('year')}}
  @endif
  <input name="year" type="number" max="2100" min="1990" placeholder="publication year" value="{{$errors->has('year')? old('year'): $publication->year}}" required/><br>
  @if($errors->has('target'))
    {{$errors->first('target')}}
  @endif
  <input name="target" placeholder="publication target" value="{{$errors->has('target')? old('target'): $publication->target}}" required/><br>  
  @if($errors->has('type'))
    {{$errors->first('type')}}
  @endif
  <select name="type" required>
    <option value="1" {{$errors->has('type')? (old('type') == 1? 'selected' : ''):($publication->type == 1? 'selected': '')}}>journal</option>
    <option value="2" {{$errors->has('type')? (old('type') == 2? 'selected' : ''):($publication->type == 2? 'selected': '')}}>paper</option>
  </select><br>
  @if($errors->has('status'))
    {{$errors->first('status')}}
  @endif
  <select name="status" required>
    <option value="1" {{$errors->has('status')? (old('status') == 1? 'selected' : ''):($publication->status == 1? 'selected': '')}}>published</option>
    <option value="2" {{$errors->has('status')? (old('status') == 2? 'selected' : ''):($publication->status == 2? 'selected': '')}}>unpublished</option>
  </select><br>
  <button type="submit">save</button>
</form>
@endsection
