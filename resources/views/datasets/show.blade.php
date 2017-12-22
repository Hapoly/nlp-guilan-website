@extends('layouts.app')
@section('title')
{{$dataset->title}}
@endsection
@section('content')
<div>
  <b>title:</b>{{$dataset->title}}
</div>
<div>
  <b>caption:</b>{{$dataset->caption}}
</div>
<div>
  <b>publication:</b><a href="{{route('publications.show', ['publication' => $dataset->publication])}}">{{$dataset->publication->title}}</a>
</div>
<div>
  <b>status:</b>{{$dataset->get_status()}}
</div>
<div>
  <b>type:</b>{{$dataset->get_type()}}
</div>

<div>
  <a href="{{route('datasets.edit', ['dataset' => $dataset])}}">edit this dataset</a>
  <form action="{{route('datasets.destroy', ['dataset' => $dataset])}}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button type="submit">remove this dataset</button>
  </form>
</div>
@endsection
