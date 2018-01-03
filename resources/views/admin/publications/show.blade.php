@extends('layouts.app')
@section('title')
{{$publication->title}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <div class="card">
      <div class="card-block">
        <div>
        <b>title:</b>{{$publication->title}}
        </div>
        <div>
          <b>target:</b>{{$publication->target}}
        </div>
        <div>
          <b>year:</b>{{$publication->year}}
        </div>
        <div>
          <b>paper type:</b>{{$publication->get_type()}}
        </div>
        <div>
          <b>status:</b>{{$publication->get_status()}}
        </div>
        <div class="container">
          <div class="row pub-icons">
            <label for="publication" >
              publication :  
            </label>
            <a href="{{route('publications.edit', ['publication' => $publication])}}"
              <i class="fa fa-edit show-edit"></i>
            </a>
            <form action="{{route('publications.destroy', ['publication' => $publication])}}" method="POST">
              {{ method_field('DELETE') }}
              {{ csrf_field() }}
              <i class="fa fa-trash-o trash-icon"></i>
            </form>
          </div>
        </div>
        
        <div class="container">
          <div class="row pub-icons">
            <label for="publication" >
              authors :  
            </label>
            <a href="{{route('publication.authors', ['publication' => $publication])}}">
              <i class="fa fa-edit show-edit"></i>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
