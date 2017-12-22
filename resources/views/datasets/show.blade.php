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
@isset($request_sent)
  <div>
    you request sent successfully
  </div>
@endisset
<form action="{{route('normal.datasets.request', ['dataset' => $dataset])}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  <input name="name" placeholder="your name" required/><br>
  <input name="email" placeholder="your email" required/><br>
  <input name="university" placeholder="your university" required/><br>
  <input name="use_case" placeholder="your use case" required/><br>
  
  <button type="submit">save</button>
</form>
@endsection
