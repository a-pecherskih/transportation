@extends('layout')

@push('scripts')
    <script src="/js/search.js"></script>
@endpush

@section('content') 
<div class="container main-container">
	<div class="row">
		<h3>Список рейсов</h3>
		<a href="{{ route('trip.create') }}" class="btn btn-success">Добавить рейс</a>
		<div class="form-search row col-md-offset-6">
			<label for="search_departure">Выбор пункт прибытия:</label>
			<select id="search_departure" class="input-medium search-query" name="search_departure">
				<option value="0">Показать все</option>
				<option value="1">Ульяновск</option>
			</select>
		</div>
		<div class="container">
			<table class="table main-container">
				<thead>
					<tr>
						<th scope="col">Откуда</th>
						<th scope="col">Куда</th>
						<th scope="col">Объемный вес</th>
						<th scope="col">Тариф</th>
						<th scope="col">Продолжительность</th>
						<th scope="col">Действия</th>
					</tr>
				</thead>
				<tbody>
					<tr class="trip" data-departure="{{ $trip->departure->id }}">
						<td>Ульяновск</td>
						<td>Казань</td>
						<td>333 кг</td>
						<td>20 руб за кг</td>
						<td>1 ч</td>
						<td>
							<a href="{{ route('trip.edit', $trip->id) }}"><i class="glyphicon glyphicon-edit"></i></a>								
							<button type="submit" class="btn_delete"><i class="glyphicon glyphicon-remove"></i></button>

						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection