@extends('layout')
@include('layouts/modal')

@section('content') 
<div class="container main-container">
	<div class="row">
		<h3>Пункты прибытия</h3>
		<a href="" class="btn btn-success">Добавить пункт прибытия</a>
		<div class="container">
			<table class="table main-container">
				<thead>
					<tr>
						<th scope="col">Название</th>
						<th scope="col">Действия</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Ульяновск</td>
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