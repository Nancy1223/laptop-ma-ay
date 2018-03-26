@extends('layout.templateAdmin')
@section('cuerpoInterno')
   
<br>
	<section class="invoice">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="page-header"><i class="fa fa-globe"></i> Lista de Prestamos</h2>
					<div class="form-row">
						<div class="form-group col-md-12">
							<button ><a class="btn-danger" href="{{url('prestamo/insertar')}}">Nuevo Registro</a></button>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<table class="table table-condensed table-bordered table-responsive table-striped">
								<thead>
									<tr>
										<td>Cliente</td>
										<td>Laptop</td>
										<td>Fecha Alquiler</td>
										<td>Fecha Devolucion</td>
										<td>Precio</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
									@foreach($listaPrestamo as $item)
										<tr>
											<td>{{$item->nombre}} {{$item->apellidos}}</td>
											<td>{{$item->marca}} {{$item->color}}</td>
											<td>{{$item->fechaAlquiler}}</td>
											<td>{{$item->fechaDevolucion}}</td>
											<td>{{$item->pago}}</td>
											<td>
												<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o" style="font-size:20px" onclick="eliminarPrestamo('{{$item->codigoPrestamo}}')"></i></button>
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
	function cambiar(codigoPrestamo)
	{
		window.location.href='{{url('prestamo/editar')}}/'+codigoPrestamo;
	}

	function eliminarPrestamo(codigoPrestamo)
	{
		if(confirm('¿Está seguro de eliminar los registros ?'))
    	{
    
      		window.location.href='{{url('prestamo/eliminar')}}/'+codigoPrestamo;
    	} 
	}
</script>
@endsection