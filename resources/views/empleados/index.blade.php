@extends ('layouts.principal')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>lista de Empleados <a href="empleados/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('empleados.search')

	</div>

</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="tlable-responsive">

			<table class="table table-striped table-bordered table-condensed table-hover">
				
				<thead style="background:#A9D0f5 ;">
					<th>Id</th>
					<th>fecha Na.</th>
					<th>CI</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Opciones</th>
				</thead>

			@foreach($empleados as $emp)
				<tr>

					<td>{{ $emp->id}}</td>
					<td>{{ $emp->fechaedad }}</td>
					<td>{{ $emp->ci }}</td>
					<td>{{ $emp->nombre }}</td>
					<td>{{ $emp->apellido }}</td>
					<td>{{ $emp->direccion }}</td>
					<td>{{ $emp->telefono }}</td>
					<td>
						<a href="{{ URL::action('ControllerEmpleado@edit',$emp->id ) }}" ><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{ $emp->id }}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
					
				</tr>
				
				@include('empleados.modal')

			@endforeach
			</table>
			

		</div>
		{{$empleados->render()}}
	</div>

</div>
	
@endsection