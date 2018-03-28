@extends ('layouts.principal')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Cliente </h3>
			@if($errors->any())
				<div class="alert alert-danger">
					<p>Porfavor corrige los errores:</p>
					<ul>
						@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>

			@endif

			{!! Form::open(array('url'=>'empleados','method'=>'POST','autocomplete'=>'off')) !!}
			{!! Form::token() !!}
			<div class="from-group">
				<label for="nombre"> Nombre</label>
	 			<input type="text" name="nombre" class="form-control" placeholder="nombre">
			</div>
			<div class="from-group">
				<label for="apellido"> Apellido</label>
	 			<input type="text" name="apellido" class="form-control" placeholder="apellido">
			</div>
			<div class="from-group">
				<label for="ci"> CI</label>
	 			<input type="number" required name="ci" class="form-control" placeholder="Carnet de Identidad">
			</div>
			<div class="from-group">
				<label for="direccion"> Direccion</label>
	 			<input type="text" name="direccion" class="form-control" placeholder="direcion donde vive">
			</div>
			<div class="from-group">
				<label for="telefono"> Telefono</label>
	 			<input type="number" required name="telefono" class="form-control" placeholder="Numero Telefonico">
			</div>
			<div class="from-group">
				<label for="fecha"> fecha nacimiento</label>
	 			<input type="text" name="fecha" class="form-control" placeholder="YY/MM/DD">
			</div>
			<br>
			<div class="from-group">
				<button type="submit" class="btn btn-primary">Registrar</button>
				<button type="reset" class="btn btn-danger">Cancelar</button>
			</div>

			{!!Form::close()!!}

		</div>

	</div>
@endsection