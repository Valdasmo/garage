@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">PAVADINIMAS</div>

        <div class="card-body">
          <div class="form-group">
            @foreach ($trucks as $truck)
            <small class="form-text text-muted">Pakeisti sunkvežimį - spaust pavadinimą</small>
            <a href="{{route('truck.edit',[$truck])}}" class="form-control">{{$truck->maker}}
              {{$truck->truckMechanic->name}}
              {{$truck->truckMechanic->surname}}</a>
              <img src="{{asset('/img/'.$truck->file)}}" style="width:150px;">  {{--foto--}}
            <form method="POST" action="{{route('truck.destroy', [$truck])}}">
              @csrf
              <button type="submit">DELETE</button>
              <small class="form-text text-muted">Trinti sunkvežimį - spaust mygtuką</small>
            </form>
            <br>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection