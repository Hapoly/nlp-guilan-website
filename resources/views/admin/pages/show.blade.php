@extends('layouts.app')
@section('title')
{{$page->title}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2">
    <table class="show-table" style="width:100%">
      <tr>
          <th>title </th>
          <td>{{$page->title}}</td>
      </tr>
      <tr>
          <th>body </th>
          <td>{{$page->body}}</td>
      </tr>
      <tr>
          <th>status  </th>
          <td>{{$page->get_status()}}</td>
      </tr>
      <tr>
          <th>operation </th>
          <td>
              <div class="container" style="margin-left:110px;">
                  <div class="row" style=" margin-top: 0">
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
          </td>
      </tr>
    </table>
  </div>
</div>
@endsection
