@extends('layouts.app')
@section('title')
edit slide $slide->title
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <div class="card">
      <div class="edit-form">
        <form action="{{route('slides.update', ['slide' => $slide])}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          {{ method_field('PUT') }}
          @if($errors->has('title'))
            {{$errors->first('title')}}
          @endif
          <div class="form-group row">
            <div class="col-3 ">
              <label for="title" class="col-form-label">slide title:    </label>
            </div>
            <div class="col-8">
            <input name="title" class="form-control" placeholder="slide title" value="{{$errors->has('title')? old('title'): $slide->title}}" required/><br>
            </div>
          </div>
          @if($errors->has('caption'))
          {{$errors->first('caption')}}
          @endif
          <div class="form-group row">
            <div class="col-3">
              <label for="caption" class="col-form-label"> slide caption: </label>
            </div>
            <div class="col-8">
            <textarea name="caption" class="form-control" line="3" placeholder="slide caption" required/>{{$errors->has('caption')? old('caption'): $slide->caption}}</textarea><br>
            </div>
          </div>
          @if($errors->has('status'))
          {{$errors->first('status')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="status">
                status:
              </label>
            </div>
            <div class="col-9">
              <select name="status" class="form-control">
                <option value="1" {{$errors->has('status')? (old('status') == 1? 'selected' : ''):($slide->status == 1? 'selected': '')}}>published</option>
                <option value="2" {{$errors->has('status')? (old('status') == 2? 'selected' : ''):($slide->status == 2? 'selected': '')}}>unpublished</option>
              </select><br>
            </div>
          </div>
          @if($errors->has('target_link'))
            {{$errors->first('target_link')}}
          @endif
          <div class="form-group row">
            <div class="col-3">
              <label for="title" class="col-form-label"> slide link:</label>
            </div>
            <div class="col-8">
              <input name="target_link" class="form-control"  placeholder="slide target_link" value="{{$errors->has('target_link')? old('target_link'): $slide->target_link}}" required/><br>
            </div>
          </div>
          @if($errors->has('image'))
            {{$errors->first('image')}}
          @endif
          <div class="form-group row">
            <div class="col-4">
              <label for="title" class="col-form-label"> slide image:</label>
            </div>
            <div class="col-8">
              <input name="image" class="form-control-file" type="file" placeholder="slide image" /><br>
            </div>
          </div>
          <button type="submit" class="save">save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
