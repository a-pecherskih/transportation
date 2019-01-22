@extends('layout')

@section('content')  

<div class="container main-container">
	<div class="row">

		<a href="{{ route('trips') }}" class="btn btn-success">Все рейсы</a>

		@if(isset($trip))
		{!! Form::open(['route' => ['trip.update', $trip->id], 'method' => 'PUT', 'class' => "main-container"]) !!}
		@else
		{!! Form::open(['route' => ['trip.store'], 'class'=>'form my-5 col-md-6 centered-top main-container']) !!}
		@endif
		<div class="form-group">
			<label for="arrival">* Откуда: </label>	
			<select id="arrival" class="form-control" name="arrival_id" required>
				@foreach ($points as $point)
				<option value="{{ $point->id }}" @if (isset($trip) && $point->id == $trip->arrival->id ) selected @endif >{{ $point->name }}</option>
				@endforeach
			</select>		
		</div>

		<div class="form-group">
			<label for="departure">* Куда: </label>
			<select id="departure" class="form-control" name="departure_id" required>
				@foreach ($points as $point)
				<option value="{{ $point->id }}" @if (isset($trip) && $point->id == $trip->departure->id ) selected @endif>{{ $point->name }}</option>
				@endforeach
			</select>		
		</div>

		<div class="form-group">
			<label for="coefficient">* Коэффициент: </label>
			<input type="number" class="form-control" name="coefficient" id="coefficient" value="@if (isset($trip)){{ $trip->coefficient }}@else{{ old('coefficient') }}@endif" required>		
		</div>

		<div class="form-group">
			<label for="lasting">* Продолжительность (ч): </label>
			<input type="number" class="form-control" name="lasting" id="lasting" value="@if (isset($trip)){{ $trip->lasting }}@else{{ old('lasting') }}@endif" required>		
		</div>

		<div class="form-group">
			<label for="price_kg">* Тарифный план (цена за руб): </label>
			<input type="number" class="form-control" name="price_kg" id="price_kg" value="@if (isset($trip)){{ $trip->price_kg }}@else{{ old('price_kg') }}@endif" required>		
		</div>

		<div class="form-group">
			<label for="overpricing">* Повышение цены: </ label>
			<input type="number" class="form-control" name="overpricing" id="overpricing" value="@if (isset($trip)){{ $trip->overpricing }}@else{{ old('overpricing') }}@endif" required>		
		</div>

		@foreach ($services as $service)
		<div class="form-check">
			<input class="form-check-input position-static" id="service-{{ $service->id }}" type="checkbox" name="services[]" value="{{ $service->id }}" @if (isset($trip) && $trip->services->find($service->id)) checked @endif >
			<label for="service-{{ $service->id }}">{{ $service->name }} ({{ $service->description }})</ label>			
		</div>
		@endforeach

		<div class="form-group">
			<button class="btn btn-success">Сохранить</button>
		</div>

		{!! Form::close() !!}

	</div>
</div>

@endsection