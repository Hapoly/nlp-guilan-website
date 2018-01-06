@extends('layouts.app')
@section('title')
edit author $author->title
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <div class="card">
      <div class="edit-form">
       <form action="{{route('authors.update', ['author' => $author])}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        @if($errors->has('name'))
          {{$errors->first('name')}}
        @endif
          <div class="form-group row">
            <div class="col-3 ">
              <label for="name" class="col-form-label"> name:    </label>
            </div>
            <div class="col-8">
             <input name="name" placeholder="author name" class="form-control" value="{{$errors->has('name')? old('name'): $author->name}}" required/><br>
            </div>
          </div>
           @if($errors->has('graduation_status'))
            {{$errors->first('graduation_status')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="graduation_status">
              graduation:
              </label>
            </div>
            <div class="col-9">
            <select name="graduation_status" class="form-control" required>
              <option value="1" {{$errors->has('graduation_status')? (old('graduation_status') == 1? 'selected' : ''):($author->graduation_status == 1? 'selected': '')}}>graduated</option>
              <option value="2" {{$errors->has('graduation_status')? (old('graduation_status') == 2? 'selected' : ''):($author->graduation_status == 2? 'selected': '')}}>not graduated</option>
            </select><br>
            </div>
          </div>
          @if($errors->has('position'))
            {{$errors->first('position')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="position">
              position:
              </label>
            </div>
            <div class="col-9">
            <select name="position" class="form-control" required>
            <option value="1" {{$errors->has('position')? (old('position') == 1? 'selected' : ''):($author->position == 1? 'selected': '')}}>Bachelor</option>
            <option value="2" {{$errors->has('position')? (old('position') == 2? 'selected' : ''):($author->position == 2? 'selected': '')}}>Master</option>
            <option value="3" {{$errors->has('position')? (old('position') == 3? 'selected' : ''):($author->position == 3? 'selected': '')}}>Doctorate</option>
            <option value="4" {{$errors->has('position')? (old('position') == 4? 'selected' : ''):($author->position == 4? 'selected': '')}}>Instructor</option>
            <option value="5" {{$errors->has('position')? (old('position') == 5? 'selected' : ''):($author->position == 5? 'selected': '')}}>Assistant professor</option>
            <option value="6" {{$errors->has('position')? (old('position') == 6? 'selected' : ''):($author->position == 6? 'selected': '')}}>Associate professor</option>
            <option value="7" {{$errors->has('position')? (old('position') == 7? 'selected' : ''):($author->position == 7? 'selected': '')}}>Professor</option>
            <option value="8" {{$errors->has('position')? (old('position') == 8? 'selected' : ''):($author->position == 8? 'selected': '')}}>distinguished Professor</option>
          </select><br>
            </div>
          </div>
          @if($errors->has('biography'))
            {{$errors->first('biography')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="biography" class="col-form-label"> biography: </label>
            </div>
            <div class="col-9">
              <textarea name="biography" class="form-control" line="3" placeholder="author biography" value="" required/>{{$errors->has('biography')? old('biography'): $author->biography}}</textarea><br>
            </div>
          </div>
          @if($errors->has('shown'))
            {{$errors->first('shown')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="shown">
              show:
              </label>
            </div>
            <div class="col-9">
              <select name="shown" class="form-control" required>
                <option value="1" {{$errors->has('shown')? (old('shown') == 1? 'selected' : ''):($author->shown == 1? 'selected': '')}}>shown</option>
                <option value="2" {{$errors->has('shown')? (old('shown') == 2? 'selected' : ''):($author->shown == 2? 'selected': '')}}>hidden</option>
              </select><br>
            </div>
          </div>
          @if($errors->has('status'))
            {{$errors->first('status')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="shown">
              show:
              </label>
            </div>
            <div class="col-9">
              <select name="status" class="form-control" required>
                <option value="1" {{$errors->has('status')? (old('status') == 1? 'selected' : ''):($author->status == 1? 'selected': '')}}>published</option>
                <option value="2" {{$errors->has('status')? (old('status') == 2? 'selected' : ''):($author->status == 2? 'selected': '')}}>unpublished</option>
              </select><br>
            </div>
          </div>
          @if($errors->has('image'))
            {{$errors->first('image')}}
          @endif
          <div class="form-group row">
            <div class="col-4">
              <label for="title" class="col-form-label"> author image:</label>
            </div>
            <div class="col-8">
              <input name="image"  class="form-control-file" type="file" placeholder="author image"/><br>
            </div>
          </div>
          <button type="submit" class="save">save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
