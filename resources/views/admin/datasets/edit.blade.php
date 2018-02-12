@extends('layouts.app')
@section('title')
new dataset
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <div class="card">
      <div class="edit-form">
        <form action="{{route('datasets.update', ['dataset' => $dataset])}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          {{ method_field('PUT') }}
          @if($errors->has('publication_id'))
            {{$errors->first('publication_id')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="status">
                Publication:
              </label>
            </div>
            <div class="col-9">
              <select name="publication_id" class="form-control" required>
                @foreach($publications as $publication)
                  <option value="{{$publication->id}}" {{old('publication_id', $dataset->publication_id) == $publication->id ? 'selected' : ''}}>{{$publication->title}}</option>
                @endforeach
              </select><br>
            </div>
          </div>
          @if($errors->has('title'))
            {{$errors->first('title')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="title" class="col-form-label">
                Title:
              </label>
            </div>
            <div class="col-9">
              <input name="title" class="form-control" placeholder="title" value="{{old('title', $dataset->title)}}" required/><br>
            </div>
          </div>
          @if($errors->has('caption'))
            {{$errors->first('caption')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="caption" class="col-form-label"> caption: </label>
            </div>
            <div class="col-9">
               <textarea name="caption" class="form-control" line="3" placeholder="caption" required/>{{old('caption', $dataset->caption)}}</textarea><br>
            </div>
          </div>
          @if($errors->has('type'))
            {{$errors->first('type')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="type">
                type:
              </label>
            </div>
            <div class="col-9">
              <select name="type" class="form-control" required>
                <option value="1" {{old('type', $dataset->type) == 1? 'selected' : ''}}>downloadable</option>
                <option value="2" {{old('type', $dataset->type) == 2? 'selected' : ''}}>have to request</option>
              </select><br>
            </div>
          </div>
          @if($errors->has('file_url'))
            {{$errors->first('file_url')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="caption" class="col-form-label"> File Url: </label>
            </div>
            <div class="col-9">
              <input name="file_url" class="form-control" placeholder="file_url" value="{{old('file_url', $dataset->file_url)}}" required/><br>
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
              <select name="status" class="form-control" required>
                <option value="1" {{old('status', $dataset->satatus) == 1? 'selected' : ''}}>published</option>
                <option value="2" {{old('status', $dataset->satatus) == 2? 'selected' : ''}}>unpublished</option>
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
