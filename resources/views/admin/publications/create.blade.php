@extends('layouts.app')
@section('title')
new publication
@endsection
@section('content')
<form action="{{route('publications.store')}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  @if($errors->has('title'))
    {{$errors->first('title')}}
  @endif
  <input name="title" placeholder="publication title" value="{{old('title')}}" required/><br>
  @if($errors->has('year'))
    {{$errors->first('year')}}
  @endif
  <input name="year" type="number" max="2100" min="1990" placeholder="publication year" value="{{old('year')}}" required/><br>
  @if($errors->has('target'))
    {{$errors->first('target')}}
  @endif
  <input name="target" placeholder="publication target" value="{{old('target')}}" required/><br>
  @if($errors->has('type'))
    {{$errors->first('type')}}
  @endif
  <select name="type" required>
    <option value="1" {{old('type') == 1? 'selected' : ''}}>journal</option>
    <option value="2" {{old('type') == 2? 'selected' : ''}}>conference</option>
  </select><br>
  @if($errors->has('status'))
    {{$errors->first('status')}}
  @endif
  <select name="status" required>
    <option value="1" {{old('status') == 1? 'selected' : ''}}>published</option>
    <option value="2" {{old('status') == 2? 'selected' : ''}}>unpublished</option>
  </select><br>
  
  <button type="submit">save</button>
</form>
@endsection
