@extends('layouts.app')
@section('title')
new author
@endsection
@section('content')
<form action="{{route('authors.store')}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  @if($errors->has('name'))
    {{$errors->first('name')}}
  @endif
  <input name="name" placeholder="author name" value="{{old('name')}}" required/><br>
  @if($errors->has('graduation_status'))
    {{$errors->first('graduation_status')}}
  @endif
  <select name="graduation_status" required>
    <option value="1" {{old('graduation_status') == 1? 'selected' : ''}}>graduated</option>
    <option value="2" {{old('graduation_status') == 2? 'selected' : ''}}>not graduated</option>
  </select><br>
  @if($errors->has('position'))
    {{$errors->first('position')}}
  @endif
  <select name="position" required>
    <option value="1" {{old('position') == 1? 'selected' : ''}}>Bachelor</option>
    <option value="2" {{old('position') == 2? 'selected' : ''}}>Master</option>
    <option value="3" {{old('position') == 3? 'selected' : ''}}>Doctorate</option>
    <option value="4" {{old('position') == 4? 'selected' : ''}}>Instructor</option>
    <option value="5" {{old('position') == 5? 'selected' : ''}}>Assistant professor</option>
    <option value="6" {{old('position') == 6? 'selected' : ''}}>Associate professor</option>
    <option value="7" {{old('position') == 7? 'selected' : ''}}>Professor</option>
    <option value="8" {{old('position') == 8? 'selected' : ''}}>distinguished Professor</option>
  </select><br>
  @if($errors->has('biography'))
    {{$errors->first('biography')}}
  @endif
  <textarea name="biography" line="3" placeholder="author biography" value="{{old('biography')}}" required/>{{old('biography')}}</textarea><br>
  
  @if($errors->has('shown'))
    {{$errors->first('shown')}}
  @endif
  <select name="shown" required>
    <option value="1" {{old('shown') == 1? 'selected' : ''}}>shown</option>
    <option value="2" {{old('shown') == 2? 'selected' : ''}}>hidden</option>
  </select><br>
  
  @if($errors->has('status'))
    {{$errors->first('status')}}
  @endif
  <select name="status" required>
    <option value="1" {{old('status') == 1? 'selected' : ''}}>published</option>
    <option value="2" {{old('status') == 2? 'selected' : ''}}>unpublished</option>
  </select><br>
  
  @if($errors->has('image'))
    {{$errors->first('image')}}
  @endif
  <input name="image" type="file" placeholder="author image" required/><br>
  
  <button type="submit">save</button>
</form>
@endsection
