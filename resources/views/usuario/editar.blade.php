@extends('layout.templateAdmin')
@section('cuerpoInterno')
   
<br>
	<section class="invoice">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="page-header"><i class="fa fa-globe"></i> MODIFICANDO USUARIO</h2>

				<form id="frmInsertarUsuario" action="{{url('usuario/editar')}}" method="post">
					<div class="form-row">
						<div class="form-group col-md-12">
							<a href="{{url('usuario/lista')}}" class="btn btn-primary">Regresar a la Lista</a>
						</div>
					</div>
					<div class="form-row">
						{{csrf_field()}}
                		<input type="hidden" name="codigoUsuario" value="{{$usuario->codigoUsuario}}">
						<div class="form-group col-md-3">
							<label for="txtNombre">Nombre</label>
							<input type="text" class="form-control" id="txtNombre" placeholder="Nombre" name="txtNombre" add-class-on-xs="form-control-sm" required="" pattern="^[a-zA-Z ]+$" value="{{$usuario->nombre}}">
						</div>
						<div class="form-group col-md-3">
							<label for="txtApellidos">Apellidos</label>
							<input type="text" class="form-control" id="txtApellidos" placeholder="Apellidos" name="txtApellidos" add-class-on-xs="form-control-sm" required="" value="{{$usuario->apellidos}}">
						</div>
						
						<div class="form-group col-md-6">
							<label for="txtEmail">Correo Electrónico</label>
							<input type="email" class="form-control" id="txtEmail" placeholder="Correo Electronico" name="txtEmail" add-class-on-xs="form-control-sm" required pattern="^([da-z_.-]+)@([da-z.-]+).([a-z.]{2,6})" value="{{$usuario->correoElectronico}}">
						</div>				
						<div class="form-group col-md-6">
							<label for="txtDireccion">Direccion</label>
							<input type="text" class="form-control" id="txtDireccion" placeholder="Direccion" name="txtDireccion" add-class-on-xs="form-control-sm" required value="{{$usuario->direccion}}">
						</div>
						
						<div class="form-group col-md-6">
							<label for="txtTelefono">Numero de Telefono</label>
							<input type="text" class="form-control" id="txtTelefono" placeholder="Numero de Telefono" name="txtTelefono" add-class-on-xs="form-control-sm" required pattern="^[0-9]{9}" onKeyPress='return SoloNumeros(event);' maxlength="9" value="{{$usuario->numeroTelefono}}">
						</div>
						<div class="form-group col-md-6">
							<label for="selectTipo">Tipo Usuario</label>
							<select name="selectTipo" class="form-control">
								@if($usuario->tipoUsuario == "Administrador" )
									<option value="Administrador" selected >Administrador</option>
									<option value="Cajero">Cajero/Cajera</option>
								@else
									<option value="Administrador" >Administrador</option>
									<option value="Cajero" selected >Cajero/Cajera</option>
								@endif

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