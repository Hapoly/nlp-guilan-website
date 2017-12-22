@extends('layouts.app')
@section('title')
datasets
@endsection
@section('content')
<table>
  <thead>
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
          <a href="{{route('normal.datasets.show', ['dataset' => $dataset])}}">show</a>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
