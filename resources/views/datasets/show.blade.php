@extends('layouts.app')
@section('title')
{{$dataset->title}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
      <div class="card">
    <table class="show-table" style="width:100%">
      <tr>
        <th>title </th>
        <td>{{$dataset->title}}</td>
      </tr>
      <tr>
        <th>caption </th>
        <td>{{$dataset->caption}}</td>
      </tr>
      <tr>
        <th>publication </th>
        <td><a href="{{route('publications.show', ['publication' => $dataset->publication])}}">{{$dataset->publication->title}}</a></td>
      </tr>
      <tr>
        <th>status </th>
        <td>{{$dataset->get_status()}}</td>
      </tr>
      <tr>
        <th>type </th>
        <td>{{$dataset->get_type()}}</td>
      </tr>
    </table>
    
      <div class="edit-form">
        @isset($request_sent)
        <p>
          you request sent successfully
        </p>
      @endisset
      <form action="{{route('normal.datasets.request', ['dataset' => $dataset])}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group row">
              <div class="col-3 ">
                <label for="name" class="col-form-label"> name:    </label>
              </div>
              <div class="col-8">
                <input name="name" class="form-control"  placeholder="your name" required/><br>
              </div>
          </div>
          <div class="form-group row">
              <div class="col-3 ">
                <label for="email" class="col-form-label"> email:    </label>
              </div>
              <div class="col-8">
                <input name="email" class="form-control"  placeholder="your email" required/><br>
              </div>
          </div>
          <div class="form-group row">
              <div class="col-3 ">
                <label for="university" class="col-form-label"> university:    </label>
              </div>
              <div class="col-8">
                <input name="university" class="form-control"  placeholder="your university" required/><br>
              </div>
          </div>
          <div class="form-group row">
              <div class="col-3 ">
                <label for="use_case" class="col-form-label"> use case:    </label>
              </div>
              <div class="col-8">
                <input name="use_case" class="form-control"  placeholder="your use case" required/><br>
              </div>
          </div> 
          <button type="submit" class="save">save</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
