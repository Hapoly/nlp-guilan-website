@extends('layouts.app')
@section('title')
new page
@endsection
@section('content')
<form action="{{route('pages.store')}}" method="POST">
  {{csrf_field()}}
  @if($errors->has('title'))
    {{$errors->first('title')}}
  @endif
  <input name="title" placeholder="page title" value="{{old('title')}}"/><br>
  @if($errors->has('body'))
    {{$errors->first('body')}}
  @endif
  <textarea name="body" line="3" placeholder="page body" value="{{old('body')}}"/></textarea><br>
  @if($errors->has('status'))
    {{$errors->first('status')}}
  @endif
  <select name="status">
    <option value="1" {{old('status') == '1' ? 'selected': ''}}>published</option>
    <option value="2" {{old('status') == '2' ? 'selected': ''}}>unpublished</option>
  </select><br>
  <button type="submit">save</button>
</form>
@endsection
