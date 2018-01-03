@extends('layouts.app')
@section('title')
{{$page->title}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <div class="card">
      <div class="card-block">
        <div>
        <b>title : </b>{{$page->title}}
        </div>
        <div>
        <b>body : </b>{{$page->body}}
        </div>
        <div>
        <b>status : </b>{{$page->get_status()}}
        </div>
        <div class="container">
          <div class="row">
            <a href="{{route('pages.edit', ['page' => $page])}}">
              <i class="fa fa-edit show-edit"></i>
            </a>
            <form action="{{route('pages.destroy', ['page' => $page])}}" method="POST">
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
