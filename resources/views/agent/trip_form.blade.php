@extends('layout')

@section('content')  

<div class="container main-container">
	<div class="row">

		<a href="" class="btn btn-success">Все рейсы</a>

		<div class="form-group">
			<label for="arrival">* Откуда: </label>	
			<select id="arrival" class="form-control" name="arrival_id" required>
				<option value="1" >Ульяновск</option>
			</select>		
		</div>

		<div class="form-group">
			<label for="departure">* Куда: </label>
			<select id="departure" class="form-control" name="departure_id" required>
				<option value="1" >Ульяновск</option>
			</select>		
		</div>

		<div class="form-group">
			<label for="coefficient">* Коэффициент: </label>
			<input type="number" class="form-control" name="coefficient" id="coefficient" value="" required>		
		</div>

		<div class="form-group">
			<label for="lasting">* Продолжительность (ч): </label>
			<input type="number" class="form-control" name="lasting" id="lasting" value="" required>		
		</div>

		<div class="form-group">
			<label for="price_kg">* Тарифный план (цена за руб): </label>
			<input type="number" class="form-control" name="price_kg" id="price_kg" value="" required>		
		</div>

		<div class="form-group">
			<label for="overpricing">* Повышение цены: </ label>
			<input type="number" class="form-control" name="overpricing" id="overpricing" value="" required>		
		</div>

		<div class="form-group">
			<button class="btn btn-success">Сохранить</button>
		</div>

	</div>
</div>

@endsection