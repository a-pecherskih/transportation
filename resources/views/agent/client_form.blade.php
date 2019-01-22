@extends('layout')

@section('content')  

<div class="container main-container">
	<div class="row">

		<h3>Клиент - Иван Иванович</h3>
		<a href="" class="btn btn-success">Все клиенты</a>
		

		<div class="form-group">
			<label for="name">* Имя: </label>
			<input type="text" class="form-control" name="name" id="name" value="" required>		
		</div>

		<div class="form-group">
			<label for="surname">* Фамилия: </label>
			<input type="text" class="form-control" name="surname" id="surname" value="" required>		
		</div>

		<div class="form-group">
			<label for="login">* Логин: </label>
			<input type="text" class="form-control" name="login" id="login" value="" required>		
		</div>

		<div class="form-group">
			<label for="password">* Пароль: </label>
			<input type="password" class="form-control" name="password" id="password" value="" required>		
		</div>

		<div class="form-group">
			<label for="passport">* Паспорт: </label>
			<input type="number" class="form-control" name="passport" id="passport" value="" maxlength="10" required>		
		</div>

		<div class="form-group">
			<button class="btn btn-success">Сохранить</button>
		</div>

	</div>
</div>

@endsection