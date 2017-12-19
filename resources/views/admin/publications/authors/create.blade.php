@extends('layouts.app')
@section('title')
new author for {{$publication->title}}
@endsection
@section('content')
new author for {{$publication->title}}
<form action="{{route('publication.authors.store', ['id' => $publication->id])}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  <input name="publication_id" value="{{$publication->id}}" hidden required/><br>
  @if($errors->has('author_id'))
    {{$errors->first('author_id')}}
  @endif
  <select name="author_id" required>
    @foreach($authors as $author)
      <option value="{{$author->id}}" {{old('author_id') == 1? 'selected' : ''}}>{{$author->name}}</option>
    @endforeach
  </select><br>
  
  <button type="submit">save</button>
</form>
@endsection
