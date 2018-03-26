<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect; 
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Validation\Rule;

use Session;
use DB;
use App\Model\TUsuario;
use App\Model\TPrestamo;
use App\Model\TLaptop;
use Carbon\Carbon;

class PrestamoController extends Controller
{
	public function actionInsertar(Request $request,SessionManager $sessionManager)
	{
		$listaUsuario=TUsuario::All();
	
		$listaLaptop=TLaptop::All();

		$tPrestamo=new TPrestamo();

					
		if($_POST)
		{
			$tPrestamo->codigoPrestamo=uniqid();
					$tPrestamo->fechaAlquiler=$request->input('txtfechaAlquiler');
					$tPrestamo->fechaDevolucion=$request->input('txtfechaDevolucion');
					$tPrestamo->pago=$request->input('txtPago');
					$tPrestamo->codigoUsuario=$request->input('selectUsuario');
					$tPrestamo->codigoLaptop=$request->input('selectLaptop');
					$tPrestamo->fechaRegistro=Carbon::now()->format('Y-m-d');

					$tPrestamo->save();

			
		}

	return view('/prestamo/insertar', ['listaLaptop' => $listaLaptop , 'listaUsuario' => $listaUsuario]);
	}
	public function actionVer(Request $request)
	{
		
		$listaPrestamo=
        DB::table('tprestamo as p')
            ->join('tusuario as u',function($join){
                $join->on('p.codigoUsuario','=','u.codigoUsuario');
            })->join('tlaptop as l',function($join2){
                $join2->on('p.codigoLaptop','=','l.codigoLaptop');
            })
            ->select(
                '*'
                )
            ->get();

		return view('prestamo/lista', ['listaPrestamo' => $listaPrestamo]);
	}
	public function actionEliminar(Request $request, $id)
    {
        $prestamo = TPrestamo::findOrFail($id);
        $prestamo->delete();
        return Redirect::to('prestamo/lista');
    }
    public function actionditar(Request $request, $id)
    {
    	$usuario = TUsuario::findOrFail($id);

        return view('usuario.editar',compact('usuario'));
    }

    public function actionEditar(Request $request)
    {
        if($_POST)
		{
	        DB::beginTransaction();
	        $tUsuario=TUsuario::whereRaw('codigoUsuario!=? and correoElectronico=?', [$request->input('codigoUsario'), trim($request->input('txtEmail'))])->first();
	        if($tUsuario!=null)
				{
					Session::flash('msj-error', 'El usuario con el correo Electrónico ya existe');
					return Redirect('usuario/editar');
				}
	        try 
	        {
	            DB::commit();

	            $tUsuario=TUsuario::find($request->input('codigoUsuario'));
				$tUsuario->nombre=$request->input('txtNombre');
				$tUsuario->apellidos=$request->input('txtApellidos');
				$tUsuario->correoElectronico=$request->input('txtEmail');
				$tUsuario->direccion=$request->input('txtDireccion');
				$tUsuario->numeroTelefono=$request->input('txtTelefono');
				$tUsuario->tipoUsuario=$request->input('selectTipo');
	            $tUsuario->save();

	            Session::flash('msj-correcto', 'Se guardó correctamente la información, por favor vuelva a iniciar session para ver los cambios');
	            return Redirect::to('usuario/lista');
	        } 
	        catch (Exception $e) 
	        {
	            DB::rollback();
	                    // no se... Informemos con un echo por ejemplo
	            echo 'ERROR (' . $e->getCode() . '): ' . $e->getMessage();
	        }
	    }
    }
}