@extends('layouts.app')
@section('title')
new author for {{$publication->title}}
@endsection
@section('content')

<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <div class="card">
      <div class="edit-form">
        <form action="{{route('publication.authors.store', ['id' => $publication->id])}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <input name="publication_id" value="{{$publication->id}}" hidden required/><br>
          @if($errors->has('author_id'))
            {{$errors->first('author_id')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="author_id">
                author:
              </label>
            </div>
            <div class="col-9">
              <select name="author_id" class="form-control" required>
                @foreach($authors as $author)
                  <option value="{{$author->id}}" {{old('author_id') == 1? 'selected' : ''}}>{{$author->name}}</option>
                @endforeach
              </select><br>
            </div>
          </div>
          <button class="btn btn-default" type="submit" >save</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
