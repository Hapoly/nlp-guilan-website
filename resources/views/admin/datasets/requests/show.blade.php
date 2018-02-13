@extends('layouts.app')
@section('title')
{{$dataset_request->name}} for {{$dataset_request->dataset->title}}
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2">
      <table class="show-table" style="width:100%">
        <tr>
          <th>requestor name </th>
          <td>{{$dataset_request->name}}</td>
        </tr>
        <tr>
          <th>requestor email </th>
          <td>{{$dataset_request->email}}</td>
        </tr>
        <tr>
          <th>email </th>
          <td>{{$dataset_request->email}}</td>
        </tr>
        <tr>
          <th>dataset </th>
          <td><a href="{{route('datasets.show', ['dataset' => $dataset_request->datset_set])}}">{{$dataset_request->dataset->publication->title}}</a></td>
        </tr>
        <tr>
          <th>publication </th>
          <td><a href="{{route('publications.show', ['publication' => $dataset_request->dataset->publication])}}">{{$dataset_request->dataset->publication->title}}</a></td>
        </tr>
      </table>
    </div>
  </div>
  <div class="row">
    <p>{{$dataset_request->use_case}}</p>
  </div>
</div>



@endsection
