@extends('layouts.app')

@section('content')

    <div class="jumbotron">
      <h1 class="display-1 text-center">LaraDex</h1>
      <div class="container text-center">
        <a class="card-link" href="{{route('trainers.index')}}">Trainers</a>
        <a class="card-link" href="#">Pokemons</a>
      </div>
    </div>


@endsection
