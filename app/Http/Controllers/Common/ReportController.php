<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTripRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\Contract;
use App\Models\Trip;
use App\Models\Point;

use Fpdf;

class ReportController extends Controller
{
    //
	public function getCommission () {
		$id = Auth::id();
		$data['contracts'] = Contract::where('user_id', '=', $id)->get();

		return view('agent.commission', $data);
	}

	public function crossReport() {
		header("content-type:text/html; charset=utf-8");

		$trips = Trip::distinct('departure_id')->get();
		$points = Point::get();
		// $trips = Trip::with(['point'=>function($query){
		// 	return $query->orderBy('name');
		// }])->get();

		$months = array('Jan', 'Feb', 'March', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

		Fpdf::AddPage('L'); 
		Fpdf::SetFont('Arial', 'I', 15);
		Fpdf::Cell(30, 25, 'Cross report', 0, 0, 'C');
		Fpdf::Ln(25);
		Fpdf::SetFont('Arial', 'I', 10);
		Fpdf::Cell(30, 15, 'Departure/Month', 1);
		foreach ($months as $month) {
			Fpdf::Cell(20, 15, $month, 1);
		}
		Fpdf::Ln(15);
		foreach ($points as $point) {
			$id_departure = $point->id;
			Fpdf::Cell(30, 15, $this->translit($point->name), 1);
			foreach ($months as $key => $value) {
				$contracts = Contract::whereMonth('contracts.created_at', ++$key)
				->leftJoin('trips', 'trips.id', '=', 'contracts.trip_id')->where('trips.departure_id', '=', $id_departure)->get()->count();
				Fpdf::Cell(20, 15, $contracts, 1);
			}
			Fpdf::Ln(15);
		}
		Fpdf::Cell(200);
		Fpdf::Cell(30, 15, 'Date: '.date('Y-m-d'));

		Fpdf::Output();
	}

	function translit($str) {
		$rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
		$lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
		return str_replace($rus, $lat, $str);
	}

}
