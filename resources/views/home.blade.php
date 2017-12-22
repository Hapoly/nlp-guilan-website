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
<div class="row">
  <div class="col-md-10 offset-md-1">
    <p class="lead">
      <h1> Guilan NLP Group </h1>
      <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Purus ut faucibus pulvinar elementum integer. Ut faucibus pulvinar elementum integer enim neque volutpat. Facilisi cras fermentum odio eu. Malesuada fames ac turpis egestas. Praesent tristique magna sit amet purus gravida. Sed enim ut sem viverra. Amet dictum sit amet justo. Felis imperdiet proin fermentum leo vel orci porta non pulvinar. Lectus urna duis convallis convallis tellus id. Nec ullamcorper sit amet risus nullam eget felis. Nec sagittis aliquam malesuada bibendum arcu. Morbi tristique senectus et netus et malesuada fames. Gravida quis blandit turpis cursus in hac habitasse. Dolor sed viverra ipsum nunc aliquet bibendum enim. Felis eget velit aliquet sagittis id. Donec et odio pellentesque diam volutpat commodo.
      </p>
      <p>
      Porta nibh venenatis cras sed felis eget. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Mi in nulla posuere sollicitudin aliquam ultrices sagittis. Gravida in fermentum et sollicitudin ac. Imperdiet sed euismod nisi porta lorem. Pretium fusce id velit ut. Nec tincidunt praesent semper feugiat nibh sed. Lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique. Felis imperdiet proin fermentum leo vel orci porta. Ut aliquam purus sit amet luctus venenatis. Proin nibh nisl condimentum id venenatis a condimentum vitae sapien. Ultricies mi eget mauris pharetra et ultrices neque. Nibh nisl condimentum id venenatis a condimentum. Pellentesque sit amet porttitor eget dolor morbi non. Varius morbi enim nunc faucibus a pellentesque sit amet porttitor. Facilisis gravida neque convallis a cras semper auctor. Phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. Ultricies mi eget mauris pharetra et.
      </p>
      <p>
      In aliquam sem fringilla ut morbi tincidunt augue interdum. Diam sit amet nisl suscipit. Tellus cras adipiscing enim eu turpis egestas. Id aliquet risus feugiat in ante metus dictum. Tellus molestie nunc non blandit massa enim nec dui nunc. Porttitor lacus luctus accumsan tortor posuere ac. Porttitor lacus luctus accumsan tortor posuere ac. Faucibus pulvinar elementum integer enim neque volutpat ac tincidunt. Elit pellentesque habitant morbi tristique senectus. Neque egestas congue quisque egestas diam. Consequat id porta nibh venenatis cras sed felis eget. Tincidunt praesent semper feugiat nibh sed pulvinar. Posuere lorem ipsum dolor sit amet consectetur adipiscing elit duis. A iaculis at erat pellentesque adipiscing. Sit amet porttitor eget dolor. Ultricies lacus sed turpis tincidunt id. Dictum non consectetur a erat nam at lectus urna. Sodales ut eu sem integer vitae justo. Maecenas accumsan lacus vel facilisis volutpat. Nisi lacus sed viverra tellus in hac habitasse platea dictumst.
      </p>
      <p>
      Neque sodales ut etiam sit amet nisl purus in. Egestas maecenas pharetra convallis posuere morbi. Fusce ut placerat orci nulla. Ac felis donec et odio pellentesque diam. Duis at consectetur lorem donec massa sapien faucibus. Sed odio morbi quis commodo odio aenean sed adipiscing. Feugiat nisl pretium fusce id velit ut. Volutpat lacus laoreet non curabitur gravida arcu ac. Duis ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Quisque non tellus orci ac auctor augue. Massa placerat duis ultricies lacus sed turpis tincidunt id aliquet. Hac habitasse platea dictumst quisque sagittis purus. Ut tellus elementum sagittis vitae et leo. Faucibus in ornare quam viverra orci. Tortor pretium viverra suspendisse potenti nullam. Pellentesque pulvinar pellentesque habitant morbi tristique. At lectus urna duis convallis convallis tellus id interdum velit. Molestie ac feugiat sed lectus vestibulum mattis ullamcorper velit sed.
      </p>
    </p>
  </div>
</div>
@endsection
