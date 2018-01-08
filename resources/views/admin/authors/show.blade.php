@extends('layouts.app')
@section('title')
{{$author->name}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <table class="show-table" style="width:100%">
        <div>
          <b>name:</b>{{$author->name}}
        </div>
        <div>
          <b>biography:</b>{{$author->biography}}
        </div>
        <div>
          <b>graduation state:</b>{{$author->get_graduation_status()}}
        </div>
        <div>
          <b>position:</b>{{$author->get_position()}}
        </div>
        <div>
          <b>status:</b>{{$author->get_status()}}
        </div>
        <div>
          <img src="{{asset('storage/authors/' . $author->profile_url)}}" />
        </div>
        <div class="container">
          <div class="row">
           <a href="{{route('authors.edit', ['author' => $author])}}">
              <i class="fa fa-edit show-edit"></i>
            </a>
            <form action="{{route('authors.destroy', ['author' => $author])}}" method="POST">
              {{ method_field('DELETE') }}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-link"><i class="fa fa-trash-o"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
