@extends('layouts.app')
@section('title')
{{$dataset->title}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
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
  </div>
</div>





@isset($request_sent)
  <div>
    you request sent successfully
  </div>
@endisset
<form action="{{route('normal.datasets.request', ['dataset' => $dataset])}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  <input name="name" placeholder="your name" required/><br>
  <input name="email" placeholder="your email" required/><br>
  <input name="university" placeholder="your university" required/><br>
  <input name="use_case" placeholder="your use case" required/><br>
  
  <button type="submit">save</button>
</form>
@endsection
