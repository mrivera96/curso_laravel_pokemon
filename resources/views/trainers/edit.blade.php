@extends('templates/layout')
@section('title','Trainer Edit')
@section('content')
    <form class="form-group" enctype="multipart/form-data" method="POST" action="{{route('trainers.update',$trainer->slug)}}" >
      @method('PUT')
      @csrf
      <div class="form-group">
        <label  for="">Nombre</label>
        <input class="form-control" type="text" name="name" value="{{$trainer->name}}">
      </div>

      <div class="form-group">
        <label  for="">Avatar</label>
        <input class="form-control" type="file" name="avatar" value="">

      </div>
      <button class="btn btn-primary" type="submit" >Guardar</button>

    </form>
@endsection
