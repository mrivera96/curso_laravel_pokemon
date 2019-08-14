@extends('templates.layout')


@section('content')
<img class="rounded-circle mx-auto d-block" src="/laradex/public/images/{{$trainer->avatar}}" alt="NO IMG" style="height:200px;width:200px;background-color:#EFEFEF;margin:20px;">
<div class="text-center">
  <h5>{{$trainer->name}}</h5>
  <p>Some quick example text to build on the card title and make up the bulk of the card's content.
  Some quick example text to build on the card title and make up the bulk of the card's content.
Some quick example text to build on the card title and make up the bulk of the card's content.
Some quick example text to build on the card title and make up the bulk of the card's content.</p>

</div>
@endsection
