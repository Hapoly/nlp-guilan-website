@extends('layouts.app')
@section('title')
{{$dataset_request->name}} for {{$dataset_request->dataset->title}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
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
        <th>use case </th>
        <td>{{$dataset_request->use_case}}</td>
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



@endsection
