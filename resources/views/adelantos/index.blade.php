@extends ('layouts.principal')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>lista de empleados <a href="clientes/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('clientes.search')

	</div>

</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="tlable-responsive">

			<table class="table table-striped table-bordered table-condensed table-hover">
				
				<thead style="background:#A9D0f5 ;">
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>CI</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Opciones</th>
				</thead>

			@foreach($clientes as $cli)
				<tr>

					<td>{{ $cli->id }}</td>
					<td>{{ $cli->nombre }}</td>
					<td>{{ $cli->apelliddo }}</td>
					<td>{{ $cli->ci }}</td>
					<td>{{ $cli->direccion }}</td>
					<td>{{ $cli->telefono }}</td>
					<td>
						<a href="{{ URL::action('ClienteController@edit',$cli->id ) }}" ><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{ $cli->id }}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
					
				</tr>
				
				@include('clientes.modal')

			@endforeach
			</table>
			

		</div>
		{{$clientes->render()}}
	</div>

</div>
	
@endsection