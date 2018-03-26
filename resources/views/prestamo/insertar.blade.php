@extends('layout.templateAdmin')
@section('cuerpoInterno')
   
<br>
	<section class="invoice">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="page-header"><i class="fa fa-globe"></i> AGREGAR PRESTAMO</h2>

				<form id="frmInsertarUsuario" action="{{url('prestamo/insertar')}}" method="post">
					<div class="form-row">
						<div class="form-group col-md-12">
							<a href="{{ url('prestamo/lista') }}" class="btn btn-primary">Regresar a la Lista</a>
						</div>
					</div>
					<div class="form-row">
						
						<div class="form-group col-md-3">
								<label for="txtfechaAlquiler">Fecha Alquiler</label>
								<input type="date" class="form-control" id="txtfechaAlquiler" name="txtfechaAlquiler" add-class-on-xs="form-control-sm" >
							</div>
							<div class="form-group col-md-3">
								<label for="txtfechaDevolucion">Fecha Devolución</label>
								<input type="date" class="form-control" id="txtfechaDevolucion" name="txtfechaDevolucion" add-class-on-xs="form-control-sm">
							</div>
							
							<div class="form-group col-md-6">
								<label for="txtPago">Pago</label>
								<input type="numeric" class="form-control" id="txtPago" placeholder="S/." name="txtPago" add-class-on-xs="form-control-sm" required >
							</div>
										
							<div class="form-group col-md-6">
								<label for="selectUsuario">Cliente</label>
								<select name="selectUsuario" class="form-control">
									<option disabled="" selected="" >Seleccione cliente</option>
									@foreach($listaUsuario as $item)
										@if($item->tipoUsuario =="Cliente")
											<option value="{{$item->codigoUsuario}}">{{$item->nombre}} {{$item->apellidos}}</option>
										@endif
										
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="selectUsuario">Laptop</label>
								<select name="selectLaptop" class="form-control">
									<option disabled="" selected="" >Seleccione Laptop</option>
									
									@foreach($listaLaptop as $item)
										
										<option value="{{$item->codigoLaptop}}">{{$item->marca}} {{$item->color}} {{$item->procesador}}</option>
									@endforeach
								</select>
							</div>
							
							<div class="form-group col-md-6">
								{{csrf_field()}}
								<button type="submit" class="btn btn-success btn-sm my-1" ><i class="fa fa-save"></i> Registrar Alquiler</button>
							</div>
					</div>
					  
				</form>
			</div>
		</div>
	</section>

@endsection