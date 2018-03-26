@extends('layout.templateAdmin')
@section('cuerpoInterno')
   
<br>
	<section class="invoice">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="page-header"><i class="fa fa-globe"></i> AGREGAR LAPTOP</h2>

				<form id="frmInsertarUsuario" action="{{url('laptop/insertar')}}" method="post">
					<div class="form-row">
						<div class="form-group col-md-12">
							<a href="{{ url('laptop/lista') }}" class="btn btn-primary">Regresar a la Lista</a>
						</div>
					</div>
					<div class="form-row">
						
						<div class="form-group col-md-6">
								<label for="txtMarca">Marca </label>
								<input type="text" class="form-control" id="txtMarca" placeholder="Marca " name="txtMarca" add-class-on-xs="form-control-sm" required="" pattern="^[a-zA-Z ]+$" >
							</div>
							<div class="form-group col-md-6">
								<label for="txtColor">Color</label>
								<input type="text" class="form-control" id="txtColor" placeholder="Color" name="txtColor" add-class-on-xs="form-control-sm" required="">
							</div>
							
							<div class="form-group col-md-6">
								<label for="txtProcesador">Procesador</label>
								<input type="text" class="form-control" id="txtProcesador" placeholder="Procesador" name="txtProcesador" add-class-on-xs="form-control-sm" required>
							</div>
							<div class="form-group col-md-6">
								<label for="txtRam">Ram</label>
								<input type="text" class="form-control"  id="txtRam" placeholder="Ram [GB]" name="txtRam" add-class-on-xs="form-control-sm" required>
							</div>
												
							<div class="form-group col-md-6">
								<label for="txtDiscoDuro">Disco Duro (almacenamiento)</label>
								<input type="text" class="form-control" id="txtDiscoDuro" placeholder="Disco Duro (almacenamiento)" name="txtDiscoDuro" add-class-on-xs="form-control-sm" required>
							</div>
							<div class="form-group col-md-6">
								<label for="txtCantidad">Cantidad</label>
								<input type="numeric" class="form-control" id="txtCantidad" placeholder="Cantidad" name="txtCantidad" add-class-on-xs="form-control-sm" required >
							</div>
							<div class="form-group col-md-6">
								{{csrf_field()}}
								<button type="submit" class="btn btn-success btn-sm my-1" ><i class="fa fa-save"></i> Registrar Laptop</button>
							</div>
					</div>
					  
				</form>
			</div>
		</div>
	</section>

@endsection