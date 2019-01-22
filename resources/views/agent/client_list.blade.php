@extends('layout')

@push('scripts')
    <script src="/js/search.js"></script>
@endpush

@section('content') 
<div class="container main-container">
	<div class="row">
		<h3>Список клиентов</h3>
		<a href="" class="btn btn-success">Добавить клиента</a>
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
					<tr class="client" data-id="{{ $client->id }}">
						<td>Ивано Иванович</td>
						<td>25254425</td>
						<td>login1</td>
						<td>
							<a href="{{ route('client.edit', $client->id) }}"><i class="glyphicon glyphicon-edit"></i></a>							
							<button type="submit" class="btn_delete"><i class="glyphicon glyphicon-remove"></i></button>
						</td>
					</tr>
					<tr class="client" data-id="{{ $client->id }}">
						<td>Семен Семенович</td>
						<td>32434</td>
						<td>login2</td>
						<td>
							<a href="{{ route('client.edit', $client->id) }}"><i class="glyphicon glyphicon-edit"></i></a>							
							<button type="submit" class="btn_delete"><i class="glyphicon glyphicon-remove"></i></button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection