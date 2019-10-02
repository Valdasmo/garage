@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">PAVADINIMAS</div>

        <div class="card-body">
          <div class="form-group">
            @foreach ($mechanics as $mechanic)
            <small class="form-text text-muted">Pakeisti vardą - spaust vardą</small>
            <a href="{{route('mechanic.edit',[$mechanic])}}" class="form-control">{{$mechanic->name}}
              {{$mechanic->surname}}</a>
            <form method="POST" action="{{route('mechanic.destroy', [$mechanic])}}">
              @csrf
              <button type="submit">DELETE</button>
              <small class="form-text text-muted">Ištrinti vairuotoją - spaust mygtuką</small>
            </form>
            <br>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection