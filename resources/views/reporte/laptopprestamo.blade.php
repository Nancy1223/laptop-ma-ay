@extends('layout.templateAdmin')
@section('cuerpoInterno')

	<section class="content">
	    <div class="row">
	        <div class="col-xs-12">
		        <div class="box">
		            <div class="box-header">
		              <h3 class="box-title">REPORTE: LAPTOP MAS PRESTADOS </h3>
		            </div>
		            <div class="box-header">
		            </div>
		            <div class="box-body">
		            	<form id="frmBuscar" action="{{url('reporte/laptopprestamo')}}" method="post">
		            		<div class="form-group">
		            			<label id="fecha">Seleccione Fecha</label><br>
								<input type="date" id="fecha" name="dateFecha">
		            		</div>
		              		{{csrf_field()}}
			                <div class="form-group">
			                	<a href=""><button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Descargar reporte (EXEL)</button></a>
			                </div>
		              	</form>
		            </div>
		        </div>
	        </div>
	    </div>
    </section>
@endsection
