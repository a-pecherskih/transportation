@extends('layout')

@section('content')  

<div class="container main-container">
	<div class="row">

		<a href="{{ route('points') }}" class="btn btn-success">Все услуги</a>

		{!! Form::open(['route' => ['point.store'], 'class'=>'form my-5 col-md-6 centered-top main-container']) !!}

		<div class="form-group">
			<label for="name">* Название: </label>
			<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>		
		</div>

		<div class="form-group">
			<button class="btn btn-success">Сохранить</button>
		</div>

		{!! Form::close() !!}

	</div>
</div>

@endsection