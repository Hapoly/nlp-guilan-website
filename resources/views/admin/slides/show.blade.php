@extends('layouts.app')
@section('title')
{{$slide->title}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <table class="show-table" style="width:100%">
      <div class="card-show">
        <img src="{{asset('storage/slides/' . $slide->image_url)}}" />
      </div>
      <tr>
        <th>title </th>
        <td>{{$slide->title}}</td>
      </tr>
      <tr>
        <th>caption </th>
        <td>{{$slide->caption}}</td>
      </tr>
      <tr>
        <th>status  </th>
        <td>{{$slide->get_status()}}</td>
      </tr>
      <tr>
        <th>operation </th>
        <td>
            <div class="container" style="margin-left:110px;">
                <div class="row" style=" margin-top: 0">
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
        </td>
      </tr>
    </table>
     
  </div>
</div>
@endsection
