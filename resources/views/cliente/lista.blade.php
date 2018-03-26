@extends('layout.templateAdmin')
@section('cuerpoInterno')
   
<br>
	<section class="invoice">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="page-header"><i class="fa fa-globe"></i> Lista de Clientes</h2>
					<div class="form-row">
						<div class="form-group col-md-12">
							<a  href="{{url('cliente/insertar')}}"><button class="btn btn-primary">Nuevo Registro</button></a>
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
										@if($item->tipoUsuario == "Cliente")

											<tr>
												<td>{{$item->nombre}} </td>
												<td>{{$item->apellidos}}</td>
												<td>{{$item->correoElectronico}}</td>
												<td>{{$item->direccion}}</td>
												<td>{{$item->numeroTelefono}}</td>
												<td>
													<button class="btn btn-primary  btn-xs" onclick="cambiar('{{$item->codigoUsuario}}')" id="btn"><i class="fa fa-edit" style="font-size:20px"></i></button>
													<button class="btn btn-danger btn-xs" onclick="eliminarUsuario('{{$item->codigoUsuario}}')"><i class="fa fa-trash-o" style="font-size:20px" ></i></button>
												</td>										
											</tr>
										@endif
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
		window.location.href='{{url('cliente/editar')}}/'+codigoUsuario;
	}

	function eliminarUsuario(codigoUsuario)
	{
		if(confirm('¿Está seguro de eliminar los registros ?'))
    	{
    
      		window.location.href='{{url('cliente/eliminar')}}/'+codigoUsuario;
    	} 
	}
</script>
@endsection