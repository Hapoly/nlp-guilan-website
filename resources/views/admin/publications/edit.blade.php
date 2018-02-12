@extends('layouts.app')
@section('title')
edit publication $publication->title
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <div class="card">
      <div class="edit-form">
        <form action="{{route('publications.update', ['publication' => $publication])}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          {{ method_field('PUT') }}
          @if($errors->has('title'))
          {{$errors->first('title')}}
          @endif
          <div class="form-group row">
            <div class="col-3 ">
              <label for="title" class="col-form-label">publication title:    </label>
            </div>
            <div class="col-8">
              <input name="title" class="form-control" placeholder="publication title" value="{{$errors->has('title')? old('title'): $publication->title}}" required/><br>
            </div>
          </div>
          @if($errors->has('year'))
          {{$errors->first('year')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="title" class="col-form-label"> year: </label>
            </div>
            <div class="col-9">
            <input name="year" class="form-control" type="number" max="2100" min="1990" placeholder="publication year" value="{{$errors->has('year')? old('year'): $publication->year}}" required/><br>
            </div>
          </div>

          @if($errors->has('target'))
            {{$errors->first('target')}}
          @endif
          <div class="form-group row">
            <div class="col-2 ">
              <label for="target" class="col-form-label">target: </label>
            </div>
            <div class="col-9">
              <input name="target" class="form-control" placeholder="publication target" value="{{$errors->has('target')? old('target'): $publication->target}}" required/><br>  
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
              <select name="type"  class="form-control" required>
                <option value="1" {{$errors->has('type')? (old('type') == 1? 'selected' : ''):($publication->type == 1? 'selected': '')}}>journal</option>
                <option value="2" {{$errors->has('type')? (old('type') == 2? 'selected' : ''):($publication->type == 2? 'selected': '')}}>paper</option>
              </select><br>
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
                <option value="1" {{$errors->has('status')? (old('status') == 1? 'selected' : ''):($publication->status == 1? 'selected': '')}}>published</option>
                <option value="2" {{$errors->has('status')? (old('status') == 2? 'selected' : ''):($publication->status == 2? 'selected': '')}}>unpublished</option>
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
