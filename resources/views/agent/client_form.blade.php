@extends('layout')

@section('content')  

<div class="container main-container">
	<div class="row">

		@if(isset($client))<h3>Клиент - {{ $client->name }} {{ $client->surname }}</h3>@endif
		<a href="{{ route('clients') }}" class="btn btn-success">Все клиенты</a>
		
		@if (count($errors) > 0)
		<div class="main-container">			
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		</div>
		@endif

		@if(isset($client))
		{!! Form::open(['route' => ['client.update', $client->id], 'method' => 'PUT', 'class' => "main-container"]) !!}
		@else
		{!! Form::open(['route' => ['client.store'], 'class'=>'form my-5 col-md-6 centered-top main-container']) !!}
		@endif
		<div class="form-group">
			<label for="name">* Имя: </label>
			<input type="text" class="form-control" name="name" id="name" value="@if(isset($client)){{ $client->name }}@else{{ old('name') }}@endif" required>		
		</div>

		<div class="form-group">
			<label for="surname">* Фамилия: </label>
			<input type="text" class="form-control" name="surname" id="surname" value="@if(isset($client)){{ $client->surname }}@else{{ old('surname') }}@endif" required>		
		</div>

		<div class="form-group">
			<label for="login">* Логин: </label>
			<input type="text" class="form-control" name="login" id="login" value="@if(isset($client)){{ $client->login }}@else{{ old('login') }}@endif" required>		
		</div>

		<div class="form-group">
			<label for="password">* Пароль: </label>
			<input type="password" class="form-control" name="password" id="password" value="@if(isset($client)){{ $client->password }}@endif" required>		
		</div>

		<div class="form-group">
			<label for="passport">* Паспорт: </label>
			<input type="number" class="form-control" name="passport" id="passport" value="@if(isset($client)){{ $client->passport }}@else{{ old('passport') }}@endif" maxlength="10" required>		
		</div>

		<div class="form-group">
			<button class="btn btn-success">@if(isset($client))Обновить данные @else Сохранить @endif</button>
		</div>

		{!! Form::close() !!}

	</div>
</div>

@endsection