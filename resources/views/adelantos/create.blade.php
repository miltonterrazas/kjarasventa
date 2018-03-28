@extends ('layouts.principal')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Adelanto </h3>
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

			{!! Form::open(array('url'=>'adelantos','method'=>'POST','autocomplete'=>'off')) !!}
			{!! Form::token() !!}
			<div class="from-group">
				<label for="descripcion"> descripcion</label>
	 			<input type="text" name="descripcion" class="form-control" placeholder="descripcion">
			</div>
			<div class="from-group">
				<label for="fecha"> fecha</label>
	 			<input type="text" name="fecha" class="form-control" placeholder="fecha">
			</div>
			<div class="from-group">
				<label for="monto"> Monto</label>
	 			<input type="number" required name="monto" class="form-control" placeholder="Monto adelanto">
			</div>
			<br>
			<div class="from-group">
				<button type="submit" class="btn btn-primary">Guardar Adelanto</button>
				<button type="reset" class="btn btn-danger">Cancelar</button>
			</div>

			{!!Form::close()!!}

		</div>

	</div>
@endsection