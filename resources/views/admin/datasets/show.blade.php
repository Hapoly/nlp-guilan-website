@extends('layouts.app')
@section('title')
{{$dataset->title}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <div class="card">
      <div class="card-block">
        <div>
          <b>title:</b>{{$dataset->title}}
        </div>
        <div>
          <b>caption:</b>{{$dataset->caption}}
        </div>
        <div>
          <b>publication:</b><a href="{{route('publications.show', ['publication' => $dataset->publication])}}">{{$dataset->publication->title}}</a>
        </div>
        <div>
          <b>status:</b>{{$dataset->get_status()}}
        </div>
        <div>
          <b>type:</b>{{$dataset->get_type()}}
        </div>
    
        <div class="container">
          <div class="row">
            <a href="{{route('datasets.edit', ['dataset' => $dataset])}}">
              <i class="fa fa-edit show-edit"></i>
            </a>
            <form action="{{route('datasets.destroy', ['dataset' => $dataset])}}" method="POST">
              {{ method_field('DELETE') }}
              {{ csrf_field() }}
              <i class="fa fa-trash-o"></i>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
