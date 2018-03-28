@extends ('layouts.principal')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Empleado:{{ $empleados->nombre }} </h3>
			@if(count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>

			@endif

			{!! Form::model($empleados,['method'=>'PATCH','route'=>['empleados.update',$empleados->id ]])!!}
			{!! Form::token() !!}
			<div class="from-group">
				<label for="nombre"> Nombre</label>
	 			<input type="text" name="nombre"  class="form-control" value="{{ $empleados->nombre }}" placeholder="nombre">
			</div>
			<div class="from-group">
				<label for="apellido"> Apellido</label>
	 			<input type="text" name="apelliddo" class="form-control" value="{{ $empleados->apellido }}"  placeholder="apellido">
			</div>
			<div class="from-group">
				<label for="ci"> CI</label>
	 			<input type="text" name="ci" class="form-control" value="{{ $empleados->ci }}"  placeholder="Carnet de Identidad">
			</div>
			<div class="from-group">
				<label for="direccion"> Direccion</label>
	 			<input type="text" name="direccion" class="form-control" value="{{ $empleados->direccion }}"  placeholder="direcion donde vive">
			</div>
			<div class="from-group">
				<label for="telefono"> Telefono</label>
	 			<input type="text" name="telefono" class="form-control" value="{{ $empleados->telefono }}"  placeholder="Numero Telefonico">
			</div>
			<div class="from-group">
				<label for="fecha"> fecha nacimiento</label>
	 			<input type="text" name="fecha" class="form-control" value="{{ $empleados->fechaedad }}" placeholder="YY/MM/DD">
			</div>
			<br>
			<div class="from-group">
				<button type="submit" class="btn btn-primary">Guardar</button>
				<button type="reset" class="btn btn-danger">Cancelar</button>
			</div>

			{!!Form::close()!!}

		</div>

	</div>
@endsection