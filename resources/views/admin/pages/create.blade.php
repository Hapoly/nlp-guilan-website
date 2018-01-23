@extends('layouts.app')
@section('title')
new page
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <div class="card">
      <div class="edit-form">
        <form action="{{route('pages.store')}}" method="POST">
          {{csrf_field()}}
          @if($errors->has('title'))
            {{$errors->first('title')}}
          @endif
          <div class="form-group row">
            <div class="col-3 ">
              <label for="title" class="col-form-label">page title:    </label>
            </div>
            <div class="col-8">
              <input name="title" class="form-control"  placeholder="page title" value="{{old('title')}}"/><br>
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
              <textarea name="body" line="3" class="form-control" placeholder="page body" value="{{old('body')}}"/></textarea><br>
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
                <option value="1" {{old('status') == '1' ? 'selected': ''}}>published</option>
                <option value="2" {{old('status') == '2' ? 'selected': ''}}>unpublished</option>
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
