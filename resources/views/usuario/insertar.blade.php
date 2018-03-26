@extends('layout.templateAdmin')
@section('cuerpoInterno')
   
<br>
	<section class="invoice">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="page-header"><i class="fa fa-globe"></i> AGREGAR USUARIO</h2>

				<form id="frmInsertarUsuario" action="{{url('usuario/insertar')}}" method="post">
					<div class="form-row">
						<div class="form-group col-md-12">
							<a href="{{ url('usuario/lista') }}" class="btn btn-primary">Regresar a la Lista</a>
						</div>
					</div>
					<div class="form-row">
						
						<div class="form-group col-md-3">
								<label for="txtNombre">Nombre</label>
								<input type="text" class="form-control" id="txtNombre" placeholder="Nombre" name="txtNombre" add-class-on-xs="form-control-sm" required="" pattern="^[a-zA-Z ]+$" >
							</div>
							<div class="form-group col-md-3">
								<label for="txtApellidos">Apellidos</label>
								<input type="text" class="form-control" id="txtApellidos" placeholder="Apellidos" name="txtApellidos" add-class-on-xs="form-control-sm" required="">
							</div>
							
							<div class="form-group col-md-6">
								<label for="txtEmail">Correo Electrónico</label>
								<input type="email" class="form-control" id="txtEmail" placeholder="Correo Electronico" name="txtEmail" add-class-on-xs="form-control-sm" required pattern="^([da-z_.-]+)@([da-z.-]+).([a-z.]{2,6})">
							</div>
							<div class="form-group col-md-6">
								<label for="txtPass">Contraseña</label>
								<input type="password" class="form-control"  id="txtPass" placeholder="Password" name="txtPass" add-class-on-xs="form-control-sm" required>
							</div>
							<div class="form-group col-md-6">
								<label for="txtPassc">Confirmar contraseña</label>
								<input type="password" class="form-control" id="txtPassc" name="txtPassc" placeholder="Confirm Password" add-class-on-xs="form-control-sm" required>
							</div>					
							<div class="form-group col-md-6">
								<label for="txtDireccion">Direccion</label>
								<input type="text" class="form-control" id="txtDireccion" placeholder="Direccion" name="txtDireccion" add-class-on-xs="form-control-sm" required>
							</div>
							
							<div class="form-group col-md-6">
								<label for="txtTelefono">Numero de Telefono</label>
								<input type="text" class="form-control" id="txtTelefono" placeholder="Numero de Telefono" name="txtTelefono" add-class-on-xs="form-control-sm" required pattern="^[0-9]{9}" onKeyPress='return SoloNumeros(event);' maxlength="9">
							</div>
							<div class="form-group col-md-6">
								<label for="selectTipo">Tipo Usuario</label>
								<select name="selectTipo" class="form-control">
									<option disabled="" selected="" >Seleccione</option>
									<option value="Administrador">Administrador</option>
									<option value="Cajero">Cajero/Cajera</option>
								</select>
							</div>
							<div class="form-group col-md-6">
								{{csrf_field()}}
								<button type="submit" class="btn btn-success btn-sm my-1" ><i class="fa fa-save"></i> Registrar Usuario</button>
							</div>
					</div>
					  
				</form>
			</div>
		</div>
	</section>

@endsection