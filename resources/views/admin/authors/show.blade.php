@extends('layouts.app')
@section('title')
{{$author->name}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <table class="show-table" style="width:100%">
      <div class="card-show">
        <img src="{{asset('storage/authors/' . $author->profile_url)}}" />
      </div>
      <tr>
        <th>name </th>
        <td>{{$author->name}}</td>
      </tr>
      <tr>
        <th>biography </th>
        <td>{{$author->biography}}</td>
      </tr>
      <tr>
        <th>graduation state </th>
        <td>{{$author->get_graduation_status()}}</td>
      </tr>
      <tr>
        <th>position </th>
        <td>{{$author->get_position()}}</td>
      </tr>
      <tr>
        <th>status </th>
        <td>{{$author->get_status()}}</td>
      </tr>
      <tr>
        <th>position </th>
        <td>
          <div class="container" style="text-align:center">
            <div class="row" style=" margin-top: 0;display: -webkit-inline-box;">
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
        </td>
      </tr>
    </table>
  </div>
</div>


@endsection
