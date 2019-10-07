@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PAVADINIMAS</div>

                <div class="card-body">
                    <div class="form-group">
                        <form method="POST" action="{{route('truck.update',[$truck])}}" enctype="multipart/form-data">
                            <label>Maker: </label>
                            <input type="text" class="form-control" name="truck_maker" value="{{$truck->maker}}">
                            <small class="form-text text-muted">Pakeisti gamintoją</small>
                            <label>Plate: </label>
                            <input type="text" class="form-control" name="truck_plate" value="{{$truck->plate}}">
                            <small class="form-text text-muted">Pakeisti numerį</small>
                            <label>Make_year: </label>
                            <input type="text" class="form-control" name="truck_make_year"
                                value="{{$truck->make_year}}">
                            <small class="form-text text-muted">Pakeisti pagaminimo metus</small>
                            <label>Mechanic_notices: </label>
                            <textarea name="truck_mechanic_notices" class="form-control"
                                id="summernote">{{$truck->mechanic_notices}}</textarea>
                            <small class="form-text text-muted">Pakeisti užrašus</small>
                            {{-- foto --}}
                            <label>Nuotrauka</label>
                            <input type="file" class="form-control" name="truck_photo">
                            <small class="form-text text-muted">Mašinos nuotrauka.</small>
                            {{-- <img src="{{asset('/img/'.$truck->file)}}" style="width:150px;"> --}}
                            {{-- foto --}}
                            <select name="mechanic_id">
                                @foreach ($mechanics as $mechanic)
                                <option value="{{$mechanic->id}}" @if($mechanic->id == $truck->mechanic_id) selected
                                    @endif>
                                    {{$mechanic->name}} {{$mechanic->surname}}
                                </option>
                                @endforeach
                            </select>
                            @csrf
                            <button type="submit">EDIT</button>
                            <small class="form-text text-muted">Pakeisti vairuotoją</small>
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