@extends('layouts.app')
@section('title')
edit author $author->title
@endsection
@section('content')
<form action="{{route('authors.update', ['author' => $author])}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  {{ method_field('PUT') }}

  @if($errors->has('name'))
    {{$errors->first('name')}}
  @endif
  <input name="name" placeholder="author name" value="{{$errors->has('name')? old('name'): $author->name}}" required/><br>
  @if($errors->has('graduation_status'))
    {{$errors->first('graduation_status')}}
  @endif
  <select name="graduation_status" required>
    <option value="1" {{$errors->has('graduation_status')? (old('graduation_status') == 1? 'selected' : ''):($author->graduation_status == 1? 'selected': '')}}>graduated</option>
    <option value="2" {{$errors->has('graduation_status')? (old('graduation_status') == 2? 'selected' : ''):($author->graduation_status == 2? 'selected': '')}}>not graduated</option>
  </select><br>
  @if($errors->has('position'))
    {{$errors->first('position')}}
  @endif
  <select name="position" required>
    <option value="1" {{$errors->has('position')? (old('position') == 1? 'selected' : ''):($author->position == 1? 'selected': '')}}>Bachelor</option>
    <option value="2" {{$errors->has('position')? (old('position') == 2? 'selected' : ''):($author->position == 2? 'selected': '')}}>Master</option>
    <option value="3" {{$errors->has('position')? (old('position') == 3? 'selected' : ''):($author->position == 3? 'selected': '')}}>Doctorate</option>
    <option value="4" {{$errors->has('position')? (old('position') == 4? 'selected' : ''):($author->position == 4? 'selected': '')}}>Instructor</option>
    <option value="5" {{$errors->has('position')? (old('position') == 5? 'selected' : ''):($author->position == 5? 'selected': '')}}>Assistant professor</option>
    <option value="6" {{$errors->has('position')? (old('position') == 6? 'selected' : ''):($author->position == 6? 'selected': '')}}>Associate professor</option>
    <option value="7" {{$errors->has('position')? (old('position') == 7? 'selected' : ''):($author->position == 7? 'selected': '')}}>Professor</option>
    <option value="8" {{$errors->has('position')? (old('position') == 8? 'selected' : ''):($author->position == 8? 'selected': '')}}>distinguished Professor</option>
  </select><br>
  @if($errors->has('biography'))
    {{$errors->first('biography')}}
  @endif
  <textarea name="biography" line="3" placeholder="author biography" value="" required/>{{$errors->has('biography')? old('biography'): $author->biography}}</textarea><br>
  
  @if($errors->has('shown'))
    {{$errors->first('shown')}}
  @endif
  <select name="shown" required>
    <option value="1" {{$errors->has('shown')? (old('shown') == 1? 'selected' : ''):($author->shown == 1? 'selected': '')}}>shown</option>
    <option value="2" {{$errors->has('shown')? (old('shown') == 2? 'selected' : ''):($author->shown == 2? 'selected': '')}}>hidden</option>
  </select><br>
  
  @if($errors->has('status'))
    {{$errors->first('status')}}
  @endif
  <select name="status" required>
    <option value="1" {{$errors->has('status')? (old('status') == 1? 'selected' : ''):($author->status == 1? 'selected': '')}}>published</option>
    <option value="2" {{$errors->has('status')? (old('status') == 2? 'selected' : ''):($author->status == 2? 'selected': '')}}>unpublished</option>
  </select><br>
  
  @if($errors->has('image'))
    {{$errors->first('image')}}
  @endif
  <input name="image" type="file" placeholder="author image"/><br>
  
  <button type="submit">save</button>
</form>
@endsection
