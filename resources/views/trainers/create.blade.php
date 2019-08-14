@extends('templates/layout')

@section('content')
    <form class="form-group" enctype="multipart/form-data" method="POST" action="/laradex/public/trainers" >
      @csrf
      <div class="form-group">
        <label  for="">Nombre</label>
        <input class="form-control" type="text" name="name" value="">
      </div>

      <div class="form-group">
        <label  for="">Avatar</label>
        <input class="form-control" type="file" name="avatar" value="">

      </div>
      <button class="btn btn-primary" type="submit" name="guardar">Guardar</button>

    </form>
@endsection
