<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

use App\Models\Client;


class Json
{
	public static function changeStore (Request $request) {
		Config::set('store.store_json', $request['json']);
		return Response::json(['msg'=>Config::get('store.store_json')]);
	}

	public static function getClients () {
		$jsonString = Storage::disk('local')->get('client.json');
		$data = json_decode($jsonString);
		// dd($data->clients);
		return $data;
	}

	public static function store ($filename, $model) {
		try {
			$jsonString = Storage::disk('local')->exists($filename.'.json') ? json_decode(Storage::disk('local')->get($filename.'.json')) : [];
			$new_id = self::getNewId($jsonString) + 1;
			$model->id = $new_id;
			array_push($jsonString, $model);
			Storage::disk('local')->put($filename.'.json', json_encode($jsonString));
			return true;
		} catch(Exception $e) {
			return ['error' => true, 'message' => $e->getMessage()];
		}
	}

	public static function getNewId ($data) {
		if (!empty($data)) {
			$lastKey = end($data);
			return $lastKey->id;
		} else 
		{
			return 0;
		}
	}

	public static function getEntry ($filename, $id) {

		$jsonString = Storage::disk('local')->exists($filename.'.json') ? json_decode(Storage::disk('local')->get($filename.'.json')) : [];
		foreach ($jsonString as $entry) {
			if ($entry->id == $id) {
				return $entry;
			}
		}
	}

	public static function deleteEntry ($filename, $id) 
	{
		$jsonString = Storage::disk('local')->exists($filename.'.json') ? json_decode(Storage::disk('local')->get($filename.'.json')) : [];
		foreach ($jsonString as $key => $entry) {
			if ($entry->id == $id) {
				unset($jsonString[$key]);
				Storage::disk('local')->put($filename.'.json', json_encode($jsonString));
				return;
			}
		}
	}

	public static function editClient ($filename, $model) 
	{
		try {
			$jsonString = Storage::disk('local')->exists($filename.'.json') ? json_decode(Storage::disk('local')->get($filename.'.json')) : [];
			foreach ($jsonString as $entry) {
				if ($entry->id == $model->id) {
					$entry->name = $model->name;
					$entry->surname = $model->surname;
					$entry->login = $model->login;
					$entry->password = $model->password;
					$entry->passport = $model->passport;
					Storage::disk('local')->put($filename.'.json', json_encode($jsonString));
					return;
				}
			}
			array_push($jsonString, $model);
			Storage::disk('local')->put($filename.'.json', json_encode($jsonString));
			return true;
		} catch(Exception $e) {
			return ['error' => true, 'message' => $e->getMessage()];
		}
	}

	public static function getClientOnPassport ($filename, $number) 
	{
		$jsonString = Storage::disk('local')->exists($filename.'.json') ? json_decode(Storage::disk('local')->get($filename.'.json')) : [];
		foreach ($jsonString as $key => $entry) {
			if ($entry->passport == $number) {
				return $entry->id;
			}
		}
	}
}