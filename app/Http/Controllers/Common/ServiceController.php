<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Service;

class ServiceController extends Controller
{
    //
	public function showAllServices()
	{
		$data['services'] = Service::all();

		return view('agent.service_list', $data);
    	# code...
	}

	public function create() 
	{
		return view('agent.service_create');
	}

	public function store(Request $request) 
	{
		Service::create($request->all());

		return redirect()->route('services');
	}

	public function destroy($id) 
	{
		Service::find($id)->delete();
		return redirect()->route('services');
	}
}
