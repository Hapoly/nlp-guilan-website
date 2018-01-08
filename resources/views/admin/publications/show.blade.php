@extends('layouts.app')
@section('title')
{{$publication->title}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <table class="show-table" style="width:100%">
      <tr>
        <th>title </th>
        <td>{{$publication->title}}</td>
      </tr>
      <tr>
        <th>target </th>
        <td>{{$publication->target}}</td>
      </tr>
      <tr>
        <th>year </th>
        <td>{{$publication->year}}</td>
      </tr>
      <tr>
        <th>paper type </th>
        <td>{{$publication->get_type()}}</td>
      </tr>
      <tr>
        <th>status </th>
        <td>{{$publication->get_status()}}</td>
      </tr>
      <tr>
        <th>publications operation </th>
        <td>
        <div class="container" >
          <div class="row" style=" margin-top: 0;display: -webkit-inline-box;">
              <a href="{{route('publications.edit', ['publication' => $publication])}}">
                <i class="fa fa-edit show-edit"></i>
              </a>
              <form action="{{route('publications.destroy', ['publication' => $publication])}}" method="POST">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-link"><i class="fa fa-trash-o trash-icon"></i></button>
              </form>
            </div>
          </div>
        </td>
      </tr>
      <tr>
          <th>authors operation </th>
          <td>
          <div class="container" >
            <div class="row" style=" margin-top: 0;display: -webkit-inline-box;">
                <a href="{{route('publication.authors', ['publication' => $publication])}}">
                  <i class="fa fa-edit show-edit"></i>
                </a>
                
              </div>
            </div>
          </td>
        </tr>
    </table>
  </div>
</div>

@endsection
