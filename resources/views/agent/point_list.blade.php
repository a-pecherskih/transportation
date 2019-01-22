@extends('layout')
@include('layouts/modal')

@section('content') 
<div class="container main-container">
	<div class="row">
		<h3>Пункты прибытия</h3>
		<a href="{{ route('point.create') }}" class="btn btn-success">Добавить пункт прибытия</a>
		<div class="container">
			<table class="table main-container">
				<thead>
					<tr>
						<th scope="col">Название</th>
						<th scope="col">Действия</th>
					</tr>
				</thead>
				<tbody>
					@if ($points)
					@foreach ($points as $point)
					<tr>
						<td>{{ $point->name }}</td>
						<td>
							{!! Form::open(['route' => ['point.destroy', $point->id], 'method' => 'DELETE']) !!}						
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