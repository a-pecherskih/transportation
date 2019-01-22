@extends('layout')
@include('layouts/modal')

@section('content') 
<div class="container main-container">
	<div class="row">
		<h3>Список договоров</h3>
		<a href="" class="btn btn-success">Добавить договор</a>

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
					<tr>
						<td>1</td>
						<td>84651</td>
						<td>Ульяновск</td>
						<td>Иван Иванович</td>
						<td class="tr_hidden">2 кг</td>
						<td class="tr_hidden">500труб</td>
						<td>
							<a href="{{ route('contract.edit', $contract->id) }}"><i class="glyphicon glyphicon-edit"></i></a>							
							<button type="submit" class="btn_delete"><i class="glyphicon glyphicon-remove"></i></button>

						</td>
						<td>
							<button onclick="return confirm('Архивировать контракт?')">Архивация</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection