@extends('layout')

@push('scripts')
    <script src="/js/search.js"></script>
@endpush

@section('content') 
<div class="container main-container">
	<div class="row">
		<h3>Список клиентов</h3>
		<a href="{{ route('client.create') }}" class="btn btn-success">Добавить клиента</a>
		<div class="form-search">
			Поиск клиента:
			<input type="number" id="search" class="input-medium search-query">
			<button type="submit" id="search_client" class="btn">Поиск</button>
			<button type="submit" id="search_clear" class="btn">X</button>
		</div>
		<div class="container">
			<table class="table main-container">
				<meta name="csrf-token" content="{{ csrf_token() }}">
				<thead>
					<tr>
						<th scope="col">ФИ</th>
						<th scope="col">Номер паспорта</th>
						<th scope="col">Логин</th>
						<th scope="col">Действия</th>
					</tr>
				</thead>
				<tbody>
					@if ($clients)
					@foreach ($clients as $client)
					<tr class="client" data-id="{{ $client->id }}">
						<td>{{ $client->name }} {{ $client->surname }}</td>
						<td>{{ $client->passport }}</td>
						<td>{{ $client->login }}</td>
						<td>
							{!! Form::open(['route' => ['client.destroy', $client->id], 'method' => 'DELETE']) !!}
							<a href="{{ route('client.edit', $client->id) }}"><i class="glyphicon glyphicon-edit"></i></a>							
							<button type="submit" class="btn_delete"><i class="glyphicon glyphicon-remove"></i></button>
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