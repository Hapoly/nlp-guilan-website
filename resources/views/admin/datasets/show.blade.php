@extends('layouts.app')
@section('title')
{{$dataset->title}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <table class="show-table" style="width:100%">
      <tr>
        <th>title </th>
        <td>{{$dataset->title}}</td>
      </tr>
      <tr>
        <th>caption </th>
        <td>{{$dataset->caption}}</td>
      </tr>
      <tr>
        <th>publication </th>
        <td><a href="{{route('publications.show', ['publication' => $dataset->publication])}}">{{$dataset->publication->title}}</a></td>
      </tr>
      <tr>
        <th>status </th>
        <td>{{$dataset->get_status()}}</td>
      </tr>
      <tr>
        <th>type </th>
        <td>{{$dataset->get_type()}}</td>
      </tr>
      <tr>
        <th>operation </th>
        <td>
          <div class="container" style="text-align:center">
              <div class="row" style=" margin-top: 0;display: -webkit-inline-box;">
                <a href="{{route('datasets.edit', ['dataset' => $dataset])}}">
                  <i class="fa fa-edit show-edit"></i>
                </a>
                <form action="{{route('datasets.destroy', ['dataset' => $dataset])}}" method="POST">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                </form>
            </div>
          </div>
        </td>
      </tr>
    </table>
  </div>
</div>

@endsection
