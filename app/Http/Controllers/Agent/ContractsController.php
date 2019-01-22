<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContractRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\Contract;
use App\Models\Point;
use App\Models\Client;
use App\Models\Trip;

use Fpdf;

class ContractsController extends Controller
{
  public function showAllContracts()
  {
    $id = Auth::id();
    $data['contracts'] = Contract::where('archivation', 0)->where('user_id', '=', $id)->get();

    return view('agent.contract_list', $data);
    
  }

  public function create() 
  {
    $data['clients'] = Client::all();
    $data['points'] = Point::all();

    return view('agent.contract_form', $data);
  }

  public function store(CreateContractRequest $request) 
  {
    $request['archivation'] = 0;
    $request['user_id'] = Auth::id();
    $request['volume_weight'] = $request['volume'] * $request['weight'];
    $request['services'] = $request->valideServices($request['services']);

    Contract::create($request->all());
    return redirect()->route('contracts');
  }

  public function edit($id) 
  {
    $contract = Contract::find($id);

    $data['contract'] = $contract;
    $data['points'] = Point::all();
    $data['clients'] = Client::all();
    $data['trips'] = Trip::all();
    $data['services'] = explode(",", $contract->services);

    return view('agent.contract_form', $data);
  }

  public function update(CreateContractRequest $request, $id) 
  {
    $contract = Contract::find($id);
    $request['volume_weight'] = $request['volume'] * $request['weight'];
    $request['services'] = $request->valideServices($request['services']);

    $contract->fill($request->all());
    $contract->save();

    return redirect()->route('contracts');
  }

  public function destroy($id) 
  {
    Contract::find($id)->delete();
    return redirect()->route('contracts');
  }

  public function archive($id) 
  {
    $contract = Contract::find($id);

    $contract->fill(['archivation' => true]);
    $contract->save();

    return redirect()->route('contracts');
  }

  public function showArchiveContracts()
  {
    $id = Auth::id();
    $data['contracts'] = Contract::all()->where('archivation', 1)->where('user_id', '=', $id);

    return view('reports.archive', $data);
      # code...
  }

  public function getContractMonthAndYear(Request $request)
  {
   $id = Auth::id();

   $contracts = Contract::whereMonth('created_at', $request['month'])
   ->whereYear('created_at', $request['year'])->where('user_id', '=', $id)
   ->get();

   if (!$contracts->isEmpty()) {
    foreach ($contracts as $contract) {
      $data[$contract->number] = $contract->id;
    }

    $json = json_encode($data);
    return Response::json($json);
  }

  return Response::json(['msg'=>"Empty"]);

}

}
