@extends('layouts.app')
@section('title')
{{$publication->title}}
@endsection
@section('content')
<div class="container">
  <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2">
    <div>
      <table class="show-table" style="width:100%">
        <tr>
          <th>title </th>
          <td>{{$publication->title}}</td>
        </tr>
        <tr>
          <th>target </th>
          <td>{{$publication->target}}</td>
        </tr>
        <tr>
          <th>year </th>
          <td>{{$publication->year}}</td>
        </tr>
        <tr>
          <th>paper type </th>
          <td>{{$publication->get_type()}}</td>
        </tr>
        <tr>
          <th>status </th>
          <td>{{$publication->get_status()}}</td>
        </tr>
      </table>
        <table class="table tb">
          <thead class="grey">
            <th>id</th>
            <th>picture</th>
            <th>title</th>
            <th>graduation</th>
            <th>position</th>
            <th>operations</th>
          </thead>
          <tbody>
            @foreach($publication->authors as $author)
              <tr>
                <td>{{$author->id}}</td>
                <td><img width="150" src="{{asset('storage/authors/' . $author->profile_url)}}" /></td>
                <td>{{$author->name}}</td>
                <td>{{$author->get_graduation_status()}}</td>
                <td>{{$author->get_position()}}</td>
                <td>
                  <a href="{{route('normal.authors.show', ['author' => $author])}}">
                    <i class="fa fa-file-text-o"></i>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <table class="table tb">
          <thead class="grey">
            <th>id</th>
            <th>title</th>
            <th>type</th>
            <th>operations</th>
          </thead>
          <tbody>
            @foreach($publication->datasets as $dataset)
              <tr>
                <td>{{$dataset->id}}</td>
                <td>{{$dataset->title}}</td>
                <td>{{$dataset->get_type()}}</td>
                <td>
                  <a href="{{route('normal.datasets.show', ['dataset' => $dataset])}}">
                    <i class="fa fa-file-text-o"></i>
                  </a>
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
