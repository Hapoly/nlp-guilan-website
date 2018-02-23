@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-10 offset-md-1 d-none d-sm-block">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        @for($i=0; $i<sizeof($slides); $i++)
          @if($i == 0)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$slides[$i]->id}}" class="active"></li>
          @else
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$slides[$i]->id}}"></li>
          @endif
        @endfor
      </ol>
      <div class="carousel-inner">
        @for($i=0; $i<sizeof($slides); $i++)
          @if($i == 0)
            <div class="carousel-item active">
              <img class="d-block w-100" src="{{asset('storage/slides/' . $slides[$i]->image_url)}}" alt="{{$slides[$i]->title}}">
            </div>
          @else
            <div class="carousel-item">
              <img class="d-block w-100" src="{{asset('storage/slides/' . $slides[$i]->image_url)}}" alt="{{$slides[$i]->title}}">
            </div>
          @endif
        @endfor
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2">
<table class="table">
  <thead  class="grey">
    <th>title</th>
    <th>status</th>
    <th>type</th>
    <th>target</th>
    <th>operations</th>
  </thead>
  <tbody>
    @foreach($publications as $publication)
      <tr>
        <td>{{$publication->title}}</td>
        <td>{{$publication->get_status()}}</td>
        <td>{{$publication->get_type()}}</td>
        <td>{{$publication->target}}</td>
        <td>
          <a href="{{route('normal.publications.show', ['publication' => $publication])}}">
          <i  class="fa fa-file-text-o"></i></a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
<div class="row">
  <div class="col-md-10 offset-md-1">
    <p class="lead">
      <h1> Guilan NLP Group </h1>
      <p>
        Natural Language Processing Group of Guilan University was founded in February 2014, and publicized its activities shortly after by launching its own official website.The NLP group aims at, conducting novel research work, sharing the results of such efforts with those interested both inside the country and abroad, and providing a platform to exchange ideas with fellows in academia and industry. These efforts are in accord with broader efforts of the Department of Computer Engineering of the Guilan University in establishing itself as a center of excellence in research and innovation.
      </p>
    </p>
  </div>
</div>
@endsection
