@extends('layout.templateAdmin')
@section('cuerpoInterno')

	<section class="content">
	    <div class="row">
	        <div class="col-xs-12">
		        <div class="box">
		            <div class="box-header">
		              <h3 class="box-title">REPORTE: GANANCIA DEL DIA</h3>
		            </div>
		            <div class="box-header">
		            </div>
		            <div class="box-body">
		            	<form id="frmBuscar" action="{{url('reporte/ganancia')}}" method="post">
		            		<div class="form-group">
		            			<label id="fecha">Seleccione Fecha</label><br>
								<input class="form-control" type="date" id="fecha" name="dateFecha" style="width: 50%;">
								{{csrf_field()}}
								<a href=""><button type="submit" class="btn btn-primary"><i class="fa fa-download"></i> ver(PDF)</button></a>
		            		</div>
		              	</form>
		            </div>
		        </div>
	        </div>
	    </div>
    </section>

@endsection
