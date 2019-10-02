@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PAVADINIMAS</div>

                <div class="card-body">
                    <div class="form-group">
                        <form method="POST" action="{{route('truck.store')}}">
                            <label>Maker: </label>
                            <input type="text" class="form-control" name="truck_maker">
                            <small class="form-text text-muted">Įrašyti gamintoją</small>
                            <br>
                            <label>Plate: </label>
                            <input type="text" class="form-control" name="truck_plate">
                            <small class="form-text text-muted">Įrašyti numerį</small>
                            <br>
                            <label>Make_year:</label>
                            <input type="text" class="form-control" name="truck_make_year">
                            <small class="form-text text-muted">Įrašyti pagaminimo metus</small>
                            <br>
                            <label>Mechanic_notices:</label>
                            <textarea name="truck_mechanic_notices" class="form-control"id="summernote"></textarea>
                            <small class="form-text text-muted">Įrašyti užrašus</small>
                            <select name="mechanic_id">
                                @foreach ($mechanics as $mechanic)
                                <option value="{{$mechanic->id}}">{{$mechanic->name}} {{$mechanic->surname}}</option>
                                @endforeach
                            </select>
                            @csrf
                            <button type="submit">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
    </script>
@endsection