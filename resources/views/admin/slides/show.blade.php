@extends('layouts.app')
@section('title')
{{$slide->title}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <div class="card">
      <div class="card-block">
        <div>
         <b>title:</b>{{$slide->title}}
         </div>
        <div>
          <b>caption:</b>{{$slide->caption}}
        </div>
        <div>
          <b>status:</b>{{$slide->get_status()}}
        </div>
        <div>
          <img src="{{asset('storage/slides/' . $slide->image_url)}}" />
        </div>
        <div class="container">
          <div class="row">
            <a href="{{route('slides.edit', ['slide' => $slide])}}">
              <i class="fa fa-edit show-edit"></i>
            </a>
            <form action="{{route('slides.destroy', ['slide' => $slide])}}" method="POST">
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
