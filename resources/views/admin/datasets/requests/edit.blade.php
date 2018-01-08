@extends('layouts.app')
@section('title')
edit dataset $dataset->title
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
            <div class="col-3">
              <label for="publication_id">
              publication:
              </label>
            </div>
            <div class="col-8">
              <select name="publication_id" required>
                @foreach($publications as $pub)
                  <option value="{{$pub->id}}" {{$errors->has('publication_id')? (old('publication_id') == $pub->id ? 'selected' : '') : ($dataset->publication_id == $pub->id? 'selected': '')}}>{{$pub->title}}</option>
                @endforeach
              </select><br>
            </div>
          </div>
          @if($errors->has('title'))
            {{$errors->first('title')}}
          @endif
          <div class="form-group row">
            <div class="col-3 ">
              <label for="title" class="col-form-label"> title:    </label>
            </div>
            <div class="col-8">
              <input name="title" class="form-control" placeholder="title" value="{{$errors->has('title')? old('title'): $dataset->title}}" required/><br>
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
              <textarea name="caption" class="form-control" line="3" placeholder="caption" required/>{{$errors->has('caption')? old('caption'): $dataset->caption}}</textarea><br>
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
                <option value="1" {{$errors->has('type')? (old('type') == 1? 'selected' : ''): ($dataset->type == 1? 'selected': '')}}>downloadable</option>
                <option value="2" {{$errors->has('type')? (old('type') == 2? 'selected' : ''): ($dataset->type == 2? 'selected': '')}}>have to request</option>
             </select><br>
            </div>
          </div>
          @if($errors->has('status'))
            {{$errors->first('status')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="status">
                publication:
              </label>
            </div>
            <div class="col-9">
              <select name="status" class="form-control" required>
                <option value="1" {{$errors->has('status')? (old('status') == 1? 'selected' : ''): ($dataset->status == 1? 'selected': '')}}>published</option>
                <option value="2" {{$errors->has('status')? (old('status') == 1? 'selected' : ''): ($dataset->status == 1? 'selected': '')}}>unpublished</option>
              </select><br>
            </div>
          </div>
          @if($errors->has('file_url'))
            {{$errors->first('file_url')}}
          @endif
          <div class="form-group row">
            <div class="col-3 ">
              <label for="link" class="col-form-label"> dataset link:    </label>
            </div>
            <div class="col-8">
              <a  class="form-control" href="{{$errors->has('file_url')? old('file_url'): $dataset->file_url}}" >{{$errors->has('file_url')? old('file_url'): $dataset->file_url}}</a>
            </div>
          </div>
          <button type="submit" class="save">save</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
