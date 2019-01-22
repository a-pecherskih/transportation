@extends('layout')
@include('layouts/modal')

@section('content') 
<div class="container main-container">
	<div class="row">
		<h3>Услуги</h3>
		<a href="" class="btn btn-success">Добавить услугу</a>
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
					<tr>
						<td>Услуга</td>
						<td>Описание</td>
						<td>				
							<button type="submit" class="btn_delete"><i class="glyphicon glyphicon-remove"></i></button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection