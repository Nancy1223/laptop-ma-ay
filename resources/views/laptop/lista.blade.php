@extends('layout.templateAdmin')
@section('cuerpoInterno')
   
<br>
	<section class="invoice">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="page-header"><i class="fa fa-globe"></i> Lista de Laptops</h2>
					<div class="form-row">
						<div class="form-group col-md-12">
							<button ><a class="btn-primary" href="{{url('laptop/insertar')}}">Nuevo Registro</a></button>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<table class="table table-condensed table-bordered table-responsive table-striped">
								<thead>
									<tr>
										<td>Marca</td>
										<td>Color</td>
										<td>Procesador</td>
										<td>Ram</td>
										<td>Disco Duro</td>
										<td>Cantidad</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
									@foreach($listaLaptop as $item)
										<tr>
											<td>{{$item->marca}} </td>
											<td>{{$item->color}}</td>
											<td>{{$item->procesador}}</td>
											<td>{{$item->ram}}</td>
											<td>{{$item->discoDuro}}</td>
											<td>{{$item->cantidad}}</td>
											<td>
												<button class="btn btn-primary  btn-xs" onclick="cambiar('{{$item->codigoLaptop}}')" id="btn"><i class="fa fa-edit" style="font-size:20px"></i></button>
												<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o" style="font-size:20px" onclick="eliminarLaptop('{{$item->codigoLaptop}}')"></i></button>
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
	function cambiar(codigoLaptop)
	{
		window.location.href='{{url('laptop/editar')}}/'+codigoLaptop;
	}

	function eliminarLaptop(codigoLaptop)
	{
		if(confirm('¿Está seguro de eliminar los registros ?'))
    	{
    
      		window.location.href='{{url('laptop/eliminar')}}/'+codigoLaptop;
    	} 
	}
</script>
@endsection