@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PAVADINIMAS</div>
                <div class="card-body">
                    <div class="form-group">
                        <form method="POST" action="{{route('mechanic.update',[$mechanic])}}">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="mechanic_name" value="{{$mechanic->name}}">
                            <small class="form-text text-muted">Pakeisti vardą</small>
                            
                            <label>Surname:</label>
                            <input type="text" class="form-control" name="mechanic_surname" value="{{$mechanic->surname}}">
                            <small class="form-text text-muted">Pakeisti pavardę</small>
                            @csrf
                            <button type="submit">EDIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection