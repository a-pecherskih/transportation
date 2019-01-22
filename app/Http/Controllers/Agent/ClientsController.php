<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Json;
use App\Http\Requests\CreateClientRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

use App\Models\Client;
use App\Models\Contract;
use App\User;

use Fpdf;

class ClientsController extends Controller
{
    //
	public function showAllClients()
	{
		if (Config::get('store.store_json') == 0) {
			$data['clients'] = Client::all();
		} else {
			$data['clients'] = Json::getClients('client');
		}
		
		return view('agent.client_list', $data);
	}

	public function create() 
	{
		return view('agent.client_form');
	}

	public function store(CreateClientRequest $request) 
	{
		if ($errors = $request->validatePassport($request['passport'])) {
			return back()->withInput($request->input())->withErrors($errors);
		}

		if (Config::get('store.store_json') == 0) {
			Client::create($request->all());
		} else { 
			$client = new Client; 
			$client->fill($request->all());
			$responce = Json::store('client', $client);
		}

		return redirect()->route('clients');
	}

	public function edit($id) 
	{
		if (Config::get('store.store_json') == 0) {
			$client = Client::find($id);
		} else { 
			$client = Json::getEntry('client', $id);
		}
		return view('agent.client_form', ['client' => $client]);
	}

	public function update(CreateClientRequest $request, $id) 
	{
		if ($errors = $request->validatePassport($request['passport'])) {
			return back()->withInput($request->input())->withErrors($errors);
		}

		if (Config::get('store.store_json') == 0) {
			$client = Client::find($id);
			$client->fill($request->all());
			$client->save();
		} else { 
			$client = new Client; 
			$client->id = $id;
			$client->fill($request->all());
			$responce = Json::editClient('client', $client);
		}

		return redirect()->route('clients');
	}

	public function destroy($id) 
	{
		if (Config::get('store.store_json') == 0) {
			Client::find($id)->delete();
		} else { 
			$client = Json::deleteEntry('client', $id);
		}
		return redirect()->route('clients');
	}

	public function getClientsPassportOrContract(Request $request) 
	{
		if (Config::get('store.store_json') == 0) {
			$client = Client::where('passport', '=', $request['number'])->first();
			if (isset($client['id'])) {
				$data['id'] = $client['id'];
			} else {
				$contract = Contract::where('number', '=', $request['number'])->first();
				$data['id'] = $contract->client->id;
			}
		} else { 
			$client_id = Json::getClientOnPassport('client', $request['number']);
			$data['id'] = $client_id;
		}
		

		$json = json_encode($data);

		if (isset($data['id'])) {
			return Response::json($json);
		} else {
			return Response::json(['msg'=>"NO"]);
		}
	}
}
