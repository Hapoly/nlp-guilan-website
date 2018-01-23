@extends('layouts.app')
@section('title')
edit page $page->title
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <div class="card">
      <div class="edit-form">
        <form action="{{route('pages.update', ['page' => $page])}}" method="POST">
          {{csrf_field()}}
          {{ method_field('PUT') }}
          @if($errors->has('title'))
          {{$errors->first('title')}}
          @endif
          <div class="form-group row">
            <div class="col-3 ">
              <label for="title" class="col-form-label">page title:    </label>
            </div>
            <div class="col-8">
              <input name="title" class="form-control" id="title" value="{{$errors->has('title')? old('title'): $page->title}}"/>
            </div>
          </div>
          @if($errors->has('body'))
          {{$errors->first('body')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="title" class="col-form-label"> body: </label>
            </div>
            <div class="col-9">
              <textarea name="body" class="form-control" line="3"/>{{$errors->has('body')? old('body'): $page->body}}</textarea><br>
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
                <option value="1" {{$errors->has('status')? (old('status') == 1? 'selected' : ''):($page->status == 1? 'selected': '')}}>published</option>
                <option value="2" {{$errors->has('status')? (old('status') == 2? 'selected' : ''):($page->status == 2? 'selected': '')}}>unpublished</option>
              </select><br>
            </div>
          </div>
          <button type="submit" class="save">save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
