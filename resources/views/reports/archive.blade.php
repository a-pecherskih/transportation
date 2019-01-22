@extends('layout')
@include('layouts/header')

@section('content') 
<div class="container main-container">
	<div class="row">
		<h3 class="row">Список выполненных договоров</h3>
		<div class="col-md-10 col-md-offset-1">
			<table class="table main-container">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Номер договора</th>
						<th scope="col">ФИ клиента</th>
						<th scope="col">Стоимость</th>
						<th scope="col">Завершен</th>
					</tr>
				</thead>
				<tbody>
					@if ($contracts)
					@foreach ($contracts as $contract)
					<tr>
						<td>{{ $contract->id }}</td>
						<td>{{ $contract->number }}</td>
						<td>{{ $contract->client_id }}</td>
						<td>{{ $contract->price }}</td>
						<td>{{ $contract->updated_at }}</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection