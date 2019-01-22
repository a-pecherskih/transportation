@extends('layout')

@section('content')  

<div class="container main-container">
	<div>

		<h1>Компания "Грузоперевозки"</h1>
		
		<p>Наша компания занимает лидирующее место среди других компаний по грузоперевозками</p>
		<h3>Наши преимущества:</h3>
		<ul>
			<li>Быстрота</li>
			<li>Надежность</li>
			<li>Низкая стоимость</li>
		</ul>
		<img src="img/trip.jpg" alt="">
		<h3>Как расчитывается стоимость перевозки:</h3>
		<ol>
			<li>Объем * вес = объемный вес</li>
			<li>Если объемный вес больше установленного коэф-та, то ОВ * Тарифный план </li>
			<li>Если объемный вес больше меньше коэф-та, то Коэф-т * Тарифный план</li>
			<li>* Важно учитывать, что цены могут подняться из-за каких-либо причин (непогода, повышение пенсионного возвраста)</li>
		</ol>

	</div>

	<div class="form-check">
		<input class="form-check-input position-static" id="global_storage" type="checkbox" >
		<label for="global_storage">Использовать хранилище json</label>			
		</div>

	</div>


	@endsection

