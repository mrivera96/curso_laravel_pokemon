@extends('layouts.app')

@section('title','Trainers')
@section('content')

  <div class="row">
  @foreach ($trainers as $trainer)

      <div class="col-sm">
        <div class="card" style="width: 18rem;margin-top:70px">
          <img class="card-img-top rounded-circle mx-auto d-block" style="height:100px;width:100px; background-color:#EFEFEF;margin:20px;" src="images/{{$trainer->avatar}}" alt="">
          <div class="card-body text-center">
            <h5 class="card-title ">{{$trainer->name}}</h5>
            <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="{{route('trainers.show',$trainer->slug)}} " class="btn btn-primary ">Ver más...</a>
          </div>
        </div>
      </div>



  @endforeach
  </div>
@endsection
