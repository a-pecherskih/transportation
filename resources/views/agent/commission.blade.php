@extends('layout')

@push('scripts')
   <script src="/js/commission.js"></script>
@endpush

@section('content') 
<div class="container main-container">
	<div>
		<a href="{{ route('report.cross') }}" class="btn btn-info"  target="_blank">Перекрестный отчёт</a>
		<h3 class="row">Рассчёт комиссионных</h3>
		<div class="form-search">
			<label for="month">Выберите месяц: </label>
			<input type="text" id="month" name="month" class="monthPicker" autocomplete="off"/>
		</div>

		<div class="container">
			<meta name="csrf-token" content="{{ csrf_token() }}">
			<table class="table main-container" style="display:none">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Номер договора</th>
						<th class="tr_hidden" scope="col">ИФ клиента</th>
						<th class="tr_hidden" scope="col">Стоимость</th>
						<th scope="col">Комиссионные</th>
					</tr>
				</thead>
				<tbody>
					@if ($contracts)
					@foreach ($contracts as $contract)
					<tr class="contract" data-id="{{ $contract->id }}">
						<td>{{ $contract->id }}</td>
						<td>{{ $contract->number }}</td>
						<td class="tr_hidden">{{ $contract->client->name }} {{ $contract->client->surname }}</td>
						<td class="tr_hidden"><span class="price">{{ $contract->price }}</span> руб</td>
						<td><span class="commission">{{ $contract->price/10 }}</span> руб</td>
					</tr>
					@endforeach
					@endif
					<tr>
						<td colspan="2" >Итого</td>
						<td><span id="total_sum"></span></td>
						<td colspan="2">Комиссионные</td>
						<td><span id="total_commission"></span></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection