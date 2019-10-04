<?php

namespace App\Http\Controllers;

use App\Truck;
use Illuminate\Http\Request;
use App\Mechanic;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;


class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trucks = Truck::all();
        return view('truck.index', ['trucks' => $trucks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mechanics = Mechanic::all();
        return view('truck.create', ['mechanics' => $mechanics]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'truck_maker' => ['required', 'min:2', 'max:64'],
            'truck_plate' => ['required', 'min:1', 'max:6'],
            'truck_make_year' => ['required', 'min:4','max:4'],
            'truck_mechanic_notices' => ['required', 'min:3', 'max:255'],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->route('truck.create')->withErrors($validator);
        }
 

        $truck = new Truck;

// foto start

$file = $request->file('truck_photo');
$img = Image::make($file);
// resize the image to a width of 300 and constrain aspect ratio (auto height)
$img->resize(300, null, function ($constraint) {
    $constraint->aspectRatio();
});
$photo = basename($file->getClientOriginalName());// failo vardas
$img->save(public_path('/img/'.$photo));

// foto end ----- komandos is $img->resize kodo galo: ->pixelate(4)->rotate(-45) 
//                 kurios papixelioja ir pasuka foto

        $truck->maker = $request->truck_maker;
        $truck->plate = $request->truck_plate;
        $truck->make_year = $request->truck_make_year;
        $truck->mechanic_notices = $request->truck_mechanic_notices;
        $truck->mechanic_id = $request->mechanic_id;
        $truck->file = $photo; //foto
        $truck->save();
        return redirect()->route('truck.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck $truck)
    {
        $mechanics = Mechanic::all();
        return view('truck.edit', ['truck' => $truck, 'mechanics' => $mechanics]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck $truck)
    {
        $validator = Validator::make($request->all(),
        [
            'truck_maker' => ['required', 'min:2', 'max:64'],
            'truck_plate' => ['required', 'min:1', 'max:6'],
            'truck_make_year' => ['required', 'min:4','max:4'],
            'truck_mechanic_notices' => ['required', 'min:3', 'max:255'],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->route('truck.create')->withErrors($validator);
        }
 

        $truck->maker = $request->truck_maker;
        $truck->plate = $request->truck_plate;
        $truck->make_year = $request->truck_make_year;
        $truck->mechanic_notices = $request->truck_mechanic_notices;
        $truck->mechanic_id = $request->mechanic_id;
        $truck->save();
        return redirect()->route('truck.index')->with('success_message', 'Sėkmingai pakeistas.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck $truck)
    {
        $truck->delete();
        return redirect()->route('truck.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
