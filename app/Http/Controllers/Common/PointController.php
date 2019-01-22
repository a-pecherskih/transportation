<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Point;

class PointController extends Controller
{
    //
    public function showAllPoints()
	{
		$data['points'] = Point::all();

		return view('agent.point_list', $data);
    	# code...
	}

	public function create() 
	{
		return view('agent.point_create');
	}

	public function store(Request $request) 
	{
		Point::create($request->all());

		return redirect()->route('points');
	}

	public function destroy($id) 
	{
		Point::find($id)->delete();
		return redirect()->route('points');
	}
}
