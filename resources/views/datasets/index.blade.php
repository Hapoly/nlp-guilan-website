@extends('layouts.app')
@section('title')
datasets
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2">
      <table class="table">
        <thead class="grey">
          <th>id</th>
          <th>title</th>
          <th>publication</th>
          <th>type</th>
          <th>operations</th>
        </thead>
        <tbody>
          @foreach($datasets as $dataset)
            <tr>
              <td>{{$dataset->id}}</td>
              <td>{{$dataset->title}}</td>
              <td><a href="{{route('publications.show', ['publication' => $dataset->publication])}}">{{$dataset->publication->title}}</a></td>
              <td>{{$dataset->get_type()}}</td>
              <td>
                <a href="{{route('normal.datasets.show', ['dataset' => $dataset])}}">
                <i class="fa fa-file-text-o"></i></a>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
