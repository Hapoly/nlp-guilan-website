@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-md-1">
      <p class="lead">
        <h1> {{$page->title}} </h1>
        {{$page->body}}
      </p>
    </div>
  </div>
</div>
@endsection
