@extends('layout.templateAdmin')
@section('cuerpoInterno')
   
<br>
	<section class="invoice">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="page-header"><i class="fa fa-globe"></i> MODIFICANDO DATOS</h2>

				<form action="{{url('laptop/editar')}}" method="post">
					<div class="form-row">
						<div class="form-group col-md-12">
							<a href="{{ url('laptop/lista') }}" class="btn btn-primary">Regresar a la Lista</a>
						</div>
					</div>
					<div class="form-row">
						{{csrf_field()}}
                		<input type="hidden" name="codigoLaptop" value="{{$laptop->codigoLaptop}}">
						<div class="form-group col-md-6">
							<label for="txtMarca">Marca </label>
							<input type="text" class="form-control" id="txtMarca" placeholder="Marca " name="txtMarca" add-class-on-xs="form-control-sm" required="" pattern="^[a-zA-Z ]+$" value="{{$laptop->marca}}">
						</div>
						<div class="form-group col-md-6">
							<label for="txtColor">Color</label>
							<input type="text" class="form-control" id="txtColor" placeholder="Color" name="txtColor" add-class-on-xs="form-control-sm" required="" value="{{$laptop->color}}">
						</div>
						
						<div class="form-group col-md-6">
							<label for="txtProcesador">Procesador</label>
							<input type="text" class="form-control" id="txtProcesador" placeholder="Procesador" name="txtProcesador" add-class-on-xs="form-control-sm" required value="{{$laptop->procesador}}">
						</div>
						<div class="form-group col-md-6">
							<label for="txtRam">Ram</label>
							<input type="text" class="form-control"  id="txtRam" placeholder="Ram [GB]" name="txtRam" add-class-on-xs="form-control-sm" required value="{{$laptop->ram}}">
						</div>
											
						<div class="form-group col-md-6">
							<label for="txtDiscoDuro">Disco Duro (almacenamiento)</label>
							<input type="text" class="form-control" id="txtDiscoDuro" placeholder="Disco Duro (almacenamiento)" name="txtDiscoDuro" add-class-on-xs="form-control-sm" required value="{{$laptop->discoDuro}}">
						</div>
						<div class="form-group col-md-6">
								<label for="txtCantidad">Cantidad</label>
								<input type="numeric" class="form-control" id="txtCantidad" placeholder="Cantidad" name="txtCantidad" add-class-on-xs="form-control-sm" required value="{{$laptop->cantidad}}">
							</div>
						<div class="form-group col-md-6">
							{{csrf_field()}}
							<button type="submit" class="btn btn-success btn-sm my-1" ><i class="fa fa-save"></i> Guardar Laptop</button>
						</div>
					</div>
					  
				</form>
			</div>
		</div>
	</section>

@endsection