@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PAVADINIMAS</div>

                <div class="card-body">
                    <div class="form-group">
                        <form method="POST" action="{{route('mechanic.store')}}">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="mechanic_name">
                            <small class="form-text text-muted">Įrašyti vardą</small>
                            <label>Surname:</label>
                            <input type="text" class="form-control"name="mechanic_surname">
                            <small class="form-text text-muted">Įrašyti pavardę</small>
                            @csrf
                            <button type="submit">ADD</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection