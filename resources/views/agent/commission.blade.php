@extends('layout')

@push('scripts')
   <script src="/js/commission.js"></script>
@endpush

@section('content') 
<div class="container main-container">
	<div>
		<a href="" class="btn btn-info"  target="_blank">Перекрестный отчёт</a>
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
					<tr class="contract" data-id="{{ $contract->id }}">
						<td>1</td>
						<td>32443</td>
						<td class="tr_hidden">Иван Иванович</td>
						<td class="tr_hidden"><span class="price">1000</span> руб</td>
						<td><span class="commission">100</span> руб</td>
					</tr>
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