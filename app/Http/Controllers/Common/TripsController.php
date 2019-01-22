<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTripRequest;
use Illuminate\Http\RedirectResponse;

use App\Models\Trip;
use App\Models\Point;
use App\Models\Service;

class TripsController extends Controller
{
    //
	public function showAllTrips()
	{
		$data['trips'] = Trip::all();
		$data['points'] = Point::all();

		return view('agent.trip_list', $data);
    	# code...
	}

	public function create() 
	{
		$data['points'] = Point::all();
		$data['services'] = Service::all();

		return view('agent.trip_form', $data);
	}

	public function store(CreateTripRequest $request) 
	{
		$trip = Trip::where('id', '=', $request['arrival_id'])
		->where('departure_id', '=', $request['departure_id'])->first();
		if (isset($trip->id)) {
			return back()->withInput($request->input())->withErrors(['field_name' => ['Такой маршрут уже есть']]);
		}
		$trip = Trip::create($request->except(['services']));
		if (isset($request['services'])) 
		{
			foreach ($request['services'] as $service) {
				$trip->services()->attach($service);
			}
		}
		return redirect()->route('trips');
	}

	public function edit($id) 
	{
		$data['trip'] = Trip::find($id);
		$data['points'] = Point::all();
		$data['services'] = Service::all();

		return view('agent.trip_form', $data);
	}

	public function update(Request $request, $id) 
	{
		$trip = Trip::find($id);
		$trip->fill($request->all());
		$trip->save();

		$trip->services()->detach();
		if (isset($request['services'])) {
			foreach ($request['services'] as $service) {
				$trip->services()->attach($service);
			}
		}

		return redirect()->route('trips');
	}

	public function destroy($id) 
	{
		$trip = Trip::find($id);
		$trip->services()->detach();
		Trip::find($id)->delete();
		return redirect()->route('trips');
	}

	public function getTrip(Request $request) 
	{
		$trip = Trip::where('id', '=', $request['arrival'])
		->where('departure_id', '=', $request['departure'])->first();

		$data['id'] = $trip->id;
		$data['price_kg'] = $trip->price_kg;
		$data['lasting'] = $trip->lasting;
		$data['coefficient'] = $trip->coefficient;
		$data['overpricing'] = $trip->overpricing;

		$data['services'] = $trip->services()->get();

		$json = json_encode($data);

		if (isset($trip)) {
			return Response::json($json);
		} else {
			return Response::json(['msg'=>"NO"]);
		}
		
	}
}
