@extends ('layouts.principal')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar adelanto:{{ $adelantos->nombre }} </h3>
			@if(count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>

			@endif

			{!! Form::model($adelantos,['method'=>'PATCH','route'=>['adelantos.update',$adelantos->idadelanto ]])!!}
			{!! Form::token() !!}
			<div class="from-group">
				<label for="descripcion"> Descripcion</label>
	 			<input type="text" name="descripcion"  class="form-control" value="{{ $adelantos->descripcion }}" placeholder="descripcion">
			</div>
			<div class="from-group">
				<label for="fecha"> Fecha</label>
	 			<input type="text" name="fecha" class="form-control" value="{{ $adelantos->fecha }}"  placeholder="fecha">
			</div>
			<div class="from-group">
				<label for="monto"> monto</label>
	 			<input type="text" name="monto" class="form-control" value="{{ $adelantos->monto }}"  placeholder="monto">
			</div>
			<br>
			<div class="from-group">
				<button type="submit" class="btn btn-primary">Guardar cambios</button>
				<button type="reset" class="btn btn-danger">Cancelar</button>
			</div>

			{!!Form::close()!!}

		</div>

	</div>
@endsection