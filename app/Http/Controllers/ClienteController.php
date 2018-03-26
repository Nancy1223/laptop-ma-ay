<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect; 
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Validation\Rule;

use Session;
use DB;

use App\Model\TUsuario;

class ClienteController extends Controller
{
	public function actionInsertar(Request $request,SessionManager $sessionManager)
	{
		if($_POST)
		{
			$this->validate($request,
        	[
        	'txtNombre' => ['required'],
        	'txtApellidos' => ['required'],
            'txtEmail' => ['required','email','unique:tUsuario,correoElectronico'],
            'txtDireccion' => ['required'],

        	],
       		[
       		'txtNombre.required' => 'El campo nombre es obligatorio',
       		'txtApellidos.required' => 'El campo nombre es obligatorio',
            'txtEmail.required' => 'El campo Correo Electrónico es obligatorio',
            'txtEmail.email' => 'Ingrese un formato que corresponda a Correo Electrónico',
            'txtEmail.unique' => 'El correo electrónico ingresado ya existe',
            'txtDireccion.required' =>'El Campo Dirección es obligatorio',
            'txtTelefono.required' => 'El campo número de teléfono es obligatorio',
            'txtTelefono.numeric' => "El campo número de teléfono acepta solo números", 
        	]);
			try
			{
				DB::beginTransaction();

					$tUsuario=TUsuario::whereRaw('correoElectronico=?', [trim($request->input('txtEmail'))])->first();

					if ($tUsuario!=null)
					{
						Session::flash('msj-error', 'El usuario con el correo Electrónico ya existe');
						return Redirect('cliente/insertar');
					}

					$tUsuario=new TUsuario();

					$tUsuario->codigoUsuario=uniqid();
					$tUsuario->nombre=$request->input('txtNombre');
					$tUsuario->apellidos=$request->input('txtApellidos');
					$tUsuario->correoElectronico=$request->input('txtEmail');
					$tUsuario->direccion=$request->input('txtDireccion');
					$tUsuario->numeroTelefono=$request->input('txtTelefono');
					$tUsuario->tipoUsuario="Cliente";
					$tUsuario->save();
				DB::commit();

				Session::flash('msj-correcto', 'Se insertó correctamente el cliente');
                return Redirect('cliente/insertar');

			}
			catch(\Exception $ex)
			{
				DB::rollback();

				Session::flash('msj-error', 'Se produjo un error, vuelva a intentarlo');
                return Redirect('cliente/insertar');
			}
		}

	return view('/cliente/insertar');
	}
	public function actionVer(Request $request)
	{
		
		$listaUsuario=TUsuario::All();

		return view('cliente/lista', ['listaUsuario' => $listaUsuario]);
	}
	public function actionEliminar(Request $request, $id)
    {
        $usuario = TUsuario::findOrFail($id);
        $usuario->delete();
        return Redirect::to('cliente/lista');
    }
    public function actionditar(Request $request, $id)
    {
    	$usuario = TUsuario::findOrFail($id);

        return view('cliente.editar',compact('usuario'));
    }

    public function actionEditar(Request $request)
    {
        if($_POST)
		{
	        DB::beginTransaction();
	        $tUsuario=TUsuario::whereRaw('codigoUsuario!=? and correoElectronico=?', [$request->input('codigoUsario'), trim($request->input('txtEmail'))])->first();
	        if($tUsuario!=null)
				{
					Session::flash('msj-error', 'El cliente con el correo Electrónico ya existe');
					return Redirect('cliente/editar');
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
				$tUsuario->tipoUsuario="Cliente";
	            $tUsuario->save();

	            Session::flash('msj-correcto', 'Se guardó correctamente la información');
	            return Redirect::to('cliente/lista');
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