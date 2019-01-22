@extends('layout')


@section('content')  

<div class="container main-container">
	<div class="row">

		<a href="" class="btn btn-success">Все услуги</a>

		<div class="form-group">
			<label for="name">* Название: </label>
			<input type="text" class="form-control" name="name" id="name" value="" required>		
		</div>

		<div class="form-group">
			<label for="description">* Описание: </label>
			<input type="text" class="form-control" name="description" id="description" value="" required>		
		</div>


		<div class="form-group">
			<button class="btn btn-success">Сохранить</button>
		</div>


	</div>
</div>

@endsection