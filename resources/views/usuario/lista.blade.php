@extends('layout.templateAdmin')
@section('cuerpoInterno')
   
<br>
	<section class="invoice">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="page-header"><i class="fa fa-globe"></i> Lista de Usuario</h2>
					<div class="form-row">
						<div class="form-group col-md-12">
							<button ><a class="btn btn-primary" href="{{url('usuario/insertar')}}">Nuevo Registro</a></button>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<table class="table table-condensed table-bordered table-responsive table-striped">
								<thead>
									<tr>
										<td>Nombre</td>
										<td>Apellidos</td>
										<td>Correo Electronico</td>
										<td>Dirección</td>
										<td>Telefono</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
									@foreach($listaUsuario as $item)
										<tr>
											<td>{{$item->nombre}} </td>
											<td>{{$item->apellidos}}</td>
											<td>{{$item->correoElectronico}}</td>
											<td>{{$item->direccion}}</td>
											<td>{{$item->numeroTelefono}}</td>
											<td>
												<button class="btn btn-primary  btn-xs" onclick="cambiar('{{$item->codigoUsuario}}')" id="btn"><i class="fa fa-edit" style="font-size:20px"></i></button>
												<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o" style="font-size:20px" onclick="eliminarUsuario('{{$item->codigoUsuario}}')"></i></button>
											</td>										
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					  
				</form>
			</div>
		</div>
	</section>
<script >
	function cambiar(codigoUsuario)
	{
		window.location.href='{{url('usuario/editar')}}/'+codigoUsuario;
	}

	function eliminarUsuario(codigoUsuario)
	{
		if(confirm('¿Está seguro de eliminar los registros ?'))
    	{
    
      		window.location.href='{{url('usuario/eliminar')}}/'+codigoUsuario;
    	} 
	}
</script>
@endsection