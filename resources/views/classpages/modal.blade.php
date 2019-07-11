@extends('layouts.app')
@section('content')
  <div>
    <div class="jumbotron">
      <div class="container">
        <h1>{{ $class->Building }}</h1>
        <p>Pli plu korpo kaj sciis vin, pro mia ne por longeco devas. Kaj cxiuj tiom mian kaj mi bona okazo por sxangxo, liberigota terbordon por estis nomo mi. Malproksime cxar la malproksime nelonge pafilo malgraux, ni al la tial la.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
  </div>

<div class="pull-right">
    <a href="/class" class="btn btn-light">Go Back</a>
  </div>
<hr>
<form action="{{  route('class.destroy', $class->id)}}" method="post">
  {{csrf_field()}}
  <input name="_method" type="hidden" value="DELETE">
  <button class="btn btn-danger" type="submit">Delete</button>
<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
<a href="/class/{{ $class->id }}/edit">Edit</a>
</button>
@endsection

