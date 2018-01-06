@extends('layouts.app')
@section('title')
new author
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <div class="card">
      <div class="edit-form">
       <form action="{{route('authors.store')}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          @if($errors->has('name'))
            {{$errors->first('name')}}
          @endif
          <div class="form-group row">
            <div class="col-3 ">
              <label for="name" class="col-form-label">name :    </label>
            </div>
            <div class="col-8">
              <input name="name" class="form-control"  placeholder="author name" value="{{old('name')}}" required/><br>
            </div>
          </div>
          @if($errors->has('graduation_status'))
           {{$errors->first('graduation_status')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="status">
                status:
              </label>
            </div>
            <div class="col-9">
              <select name="graduation_status" class="form-control" required>
                <option value="1" {{old('graduation_status') == 1? 'selected' : ''}}>graduated</option>
                <option value="2" {{old('graduation_status') == 2? 'selected' : ''}}>not graduated</option>
              </select><br>
            </div>
          </div>
          @if($errors->has('position'))
            {{$errors->first('position')}}
          @endif
          <div class="form-group row">
            <div class="col-2">
              <label for="position">
                status:
              </label>
            </div>
            <div class="col-9">
            <select name="position"  class="form-control" required>
              <option value="1" {{old('position') == 1? 'selected' : ''}}>Bachelor</option>
              <option value="2" {{old('position') == 2? 'selected' : ''}}>Master</option>
              <option value="3" {{old('position') == 3? 'selected' : ''}}>Doctorate</option>
              <option value="4" {{old('position') == 4? 'selected' : ''}}>Instructor</option>
              <option value="5" {{old('position') == 5? 'selected' : ''}}>Assistant professor</option>
              <option value="6" {{old('position') == 6? 'selected' : ''}}>Associate professor</option>
              <option value="7" {{old('position') == 7? 'selected' : ''}}>Professor</option>
              <option value="8" {{old('position') == 8? 'selected' : ''}}>distinguished Professor</option>
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
            <textarea name="biography" line="3" class="form-control"  placeholder="author biography" value="{{old('biography')}}" required/>{{old('biography')}}</textarea><br>
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
                <option value="1" {{old('shown') == 1? 'selected' : ''}}>shown</option>
                <option value="2" {{old('shown') == 2? 'selected' : ''}}>hidden</option>
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
                <option value="1" {{old('status') == 1? 'selected' : ''}}>published</option>
                <option value="2" {{old('status') == 2? 'selected' : ''}}>unpublished</option>
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
              <input name="image" class="form-control-file" type="file" placeholder="author image" required/><br>
            </div>
          </div>
          <button type="submit" class="save">save</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
