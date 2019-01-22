@extends('layout')
@include('layouts/modal')

@section('content') 
<div class="container main-container">
	<div class="row">
		<h3>Услуги</h3>
		<a href="{{ route('service.create') }}" class="btn btn-success">Добавить услугу</a>
		<div class="container">
			<table class="table main-container">
				<thead>
					<tr>
						<th scope="col">Название</th>
						<th scope="col">Описание</th>
						<th scope="col">Действия</th>
					</tr>
				</thead>
				<tbody>
					@if ($services)
					@foreach ($services as $service)
					<tr>
						<td>{{ $service->name }}</td>
						<td>{{ $service->description }}</td>
						<td>
							{!! Form::open(['route' => ['service.destroy', $service->id], 'method' => 'DELETE']) !!}						
							<button type="submit" class="btn_delete"><i class="glyphicon glyphicon-remove"></i></button>
							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection