@extends('templates/layout')

@section('title','Create Trainer')

@section('content')
  @if ($errors->any())

    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>

    </div>


  @endif
  <form class="form-group" enctype="multipart/form-data" method="POST" action="{{route('trainers.store')}}" >
    @csrf
    <div class="form-group">
      <label  for="">Nombre</label>
      <input class="form-control" type="text" name="name" value="">
    </div>

    <div class="form-group">
      <label  for="">Avatar</label>
      <input class="form-control" type="file" name="avatar" value="">

    </div>
    <button class="btn btn-primary" type="submit" >Guardar</button>

  </form>


@endsection
