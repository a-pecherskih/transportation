@extends('layout')
@include('layouts/modal')

@section('content') 
<div class="container main-container">
	<div class="row">
		<h3>Список договоров</h3>
		<a href="{{ route('contract.create') }}" class="btn btn-success">Добавить договор</a>

		<div class="container">
			<table class="table main-container">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Номер договора</th>
						<th scope="col">Куда</th>
						<th scope="col">ИФ клиента</th>
						<th class="tr_hidden" scope="col">Объемный вес</th>
						<th class="tr_hidden" scope="col">Стоимость</th>
						<th scope="col">Действия</th>
					</tr>
				</thead>
				<tbody>
					@if ($contracts)
					@foreach ($contracts as $contract)
					<tr>
						<td>{{ $contract->id }}</td>
						<td>{{ $contract->number }}</td>
						<td>{{ $contract->trip->departure->name }}</td>
						<td>{{ $contract->client->name }} {{ $contract->client->surname }}</td>
						<td class="tr_hidden">{{ $contract->volume_weight }} кг</td>
						<td class="tr_hidden">{{ $contract->price }} руб</td>
						<td>
							{!! Form::open(['route' => ['contract.destroy', $contract->id], 'method' => 'DELETE']) !!}
							<a href="{{ route('contract.edit', $contract->id) }}"><i class="glyphicon glyphicon-edit"></i></a>							
							<button type="submit" class="btn_delete"><i class="glyphicon glyphicon-remove"></i></button>
							{!! Form::close() !!}

						</td>
						<td>
							{!! Form::open(['route' => ['contract.archive', $contract->id], 'method' => 'POST']) !!}
							<button onclick="return confirm('Архивировать контракт?')">Архивация</button>
							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection