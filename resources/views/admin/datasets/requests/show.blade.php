@extends('layouts.app')
@section('title')
{{$dataset_request->name}} for {{$dataset_request->dataset->title}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <div class="card">
      <div class="card-block">
        <div>
          <b>requestor name:</b>{{$dataset_request->name}}
        </div>
        <div>
          <b>requestor email:</b>{{$dataset_request->email}}
        </div>
        
        <div>
          <b>use case:</b>{{$dataset_request->use_case}}
        </div>
        <div>
          <b>email:</b>{{$dataset_request->email}}
        </div>
        <div>
        <b>dataset:</b><a href="{{route('datasets.show', ['dataset' => $dataset_request->datset_set])}}">{{$dataset_request->dataset->publication->title}}</a>
        </div>
        <div>
          <b>publication:</b><a href="{{route('publications.show', ['publication' => $dataset_request->dataset->publication])}}">{{$dataset_request->dataset->publication->title}}</a>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
