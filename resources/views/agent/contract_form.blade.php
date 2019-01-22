@extends('layout')

@push('scripts')
<script src="/js/contract.js"></script>
@endpush

@section('content')  

<div class="container main-container">
	<div class="row">

		<a href="" class="btn btn-success">Все договоры</a>

		<div class="form-group">
			<label for="number">* Номер контракта: </label>
			<input type="number" class="form-control" name="number" id="number" value="f" required>		
		</div>

		<div class="form-group">
			<label for="client">Клиент:</label>
			<select id="client" class="form-control" name="client_id" required data-client="">
				<option value="{{ $client->id }}">Иван Иванович</option>
			</select>
		</div>

		<div class="form-group">
			<label for="arrival">Откуда:</label>
			<select id="arrival" class="form-control" name="arrival_id" required>
				<option value="1">Ульяновск</option>
			</select>
		</div>

		<div class="form-group">
			<label for="departure">Куда:</label>
			<select id="departure" class="form-control" name="departure_id" required>
				<option value="1">Ульяновск</option>
			</select>
		</div>

		<div id="trip-block">
			<label>Длительность поездки: <span id="lasting"></span> ч</label><br>
			<label>Физический объем: <span id="coefficient"></span> кг</label><br>
			<label>Тариф (руб за кг): <span id="price_kg"></span> руб</label><br>

			<div class="form-group main-container">
				<label for="inputDate">Выберите дату:</label>
				<input type="date" id="datePicker" class="form-control" name="leave" value="">
			</div>			

			<div class="form-group col-md-6">
				<label for="volume">* Объем (м3): </label>
				<input type="number" step=0.01 class="form-control" name="volume" id="volume" value="" required>		
			</div>

			<div class="form-group col-md-6">
				<label for="weight">* Вес (кг): </label>
				<input type="number" step=0.01 class="form-control" name="weight" id="weight" value="" required>		
			</div>

			
			<div class="form-group">

				<label for="price">* Цена (руб): </label>
				<input type="text" class="form-control" name="price" id="price" value="" readonly>	
				<label id="overpricing"></label>			
			</div>

			<input type="hidden" id="trip_id" name="trip_id" value="" readonly>
			<input type="hidden" name="user_id" value="" readonly>

			<div class="form-group">
				<button class="btn btn-success">Сохранить</button>
			</div>

		</div>


	</div>
</div>

@endsection