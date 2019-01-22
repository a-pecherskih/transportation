@extends('layout')

@push('scripts')
<script src="/js/contract.js"></script>
@endpush

@section('content')  

<div class="container main-container">
	<div class="row">

		<a href="{{ route('contracts') }}" class="btn btn-success">Все договоры</a>

		@if(isset($contract))
		{!! Form::open(['route' => ['contract.update', $contract->id], 'method' => 'PUT', 'class' => "main-container", 'id' => "table-contract"]) !!}
		@else
		{!! Form::open(['route' => ['contract.store'], 'class'=>'form my-5 col-md-6 centered-top main-container', 'id' => "table-contract"]) !!}
		@endif
		<div class="form-group">
			<label for="number">* Номер контракта: </label>
			<input type="number" class="form-control" name="number" id="number" value="@if (isset($contract)){{ $contract->number }}@else{{ old('number') }}@endif" required>		
		</div>

		<div class="form-group">
			<label for="client">Клиент:</label>
			<select id="client" class="form-control" name="client_id" required data-client="@if (isset($contract)){{ $contract->client_id }}@endif">
				@foreach ($clients as $client)
				<option value="{{ $client->id }}" @if (isset($contract) && $client->id == $contract->client->id ) selected @endif>{{ $client->name }} {{ $client->surname }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="arrival">Откуда:</label>
			<select id="arrival" class="form-control" name="arrival_id" required>
				@foreach ($points as $point)
				<option value="{{ $point->id }}" @if (isset($contract) && $point->id == $contract->trip->arrival->id ) selected @endif>{{ $point->name }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="departure">Куда:</label>
			<select id="departure" class="form-control" name="departure_id" required>
				@foreach ($points as $point)
				<option value="{{ $point->id }}" @if (isset($contract) && $point->id == $contract->trip->departure->id ) selected @endif>{{ $point->name }}</option>
				@endforeach
			</select>
		</div>

		<div id="trip-block">
			<label>Длительность поездки: <span id="lasting">@if (isset($contract)) {{ $contract->trip->lasting }} @endif</span> ч</label><br>
			<label>Физический объем: <span id="coefficient">@if (isset($contract)) {{ $contract->trip->coefficient }} @endif</span> кг</label><br>
			<label>Тариф (руб за кг): <span id="price_kg">@if (isset($contract)) {{ $contract->trip->price_kg }} @endif</span> руб</label><br>

			<div class="form-group main-container">
				<label for="inputDate">Выберите дату:</label>
				<input type="date" id="datePicker" class="form-control" name="leave" value="@if (isset($contract)){{ $contract->leave }}@else{{ date('Y-m-d') }}@endif">
			</div>			

			<div class="form-group col-md-6">
				<label for="volume">* Объем (м3): </label>
				<input type="number" step=0.01 class="form-control" name="volume" id="volume" value="@if (isset($contract)){{ $contract->volume }}@else{{ old('volume') }}@endif" required>		
			</div>

			<div class="form-group col-md-6">
				<label for="weight">* Вес (кг): </label>
				<input type="number" step=0.01 class="form-control" name="weight" id="weight" value="@if (isset($contract)){{ $contract->weight }}@else{{ old('weight') }}@endif" required>		
			</div>

			
			<div class="form-group">

				<label for="price">* Цена (руб): </label>
				<input type="text" class="form-control" name="price" id="price" value="@if (isset($contract)){{ $contract->price }}@else{{ old('price') }}@endif" readonly>	
				<label id="overpricing"></label>			
			</div>

			<input type="hidden" id="trip_id" name="trip_id" value="@if (isset($contract)) {{ $contract->trip->id }} @endif" readonly>
			<input type="hidden" name="user_id" value="@if (isset($contract)) {{ $contract->user->id }} @endif" readonly>

			<div  class="form-group" id="services">
				@if (isset($contract))
					@foreach ($contract->trip->services as $service_trip)
					<div class="form-check">
						<input class="form-check-input position-static" type="checkbox" name="services[]" value="{{ $service_trip->id }}" 
						@foreach ( $services as $service ) @if ($service_trip->id == $service) checked @endif @endforeach>
						{{ $service_trip->name }} ({{ $service_trip->description }})
					</div>
					@endforeach
				@endif
			</div>

			<div class="form-group">
				<button class="btn btn-success">@if (isset($contract)) Обновить @else Сохранить  @endif</button>
			</div>

		</div>

		<div id="back-block">
			<p>Извините, такой маршрут еще недействителен. Пожалуйста, выберите другой маршрут</p>
		</div>

		{!! Form::close() !!}

	</div>
</div>

@endsection