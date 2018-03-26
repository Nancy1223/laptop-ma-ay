<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect; 
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Encryption\Encrypter;
use Illuminate\Validation\Rule;

use Session;
use DB;

use App\Model\TUsuario;

class UsuarioController extends Controller
{
	public function actionInsertar(Request $request,Encrypter $encrypter,SessionManager $sessionManager)
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
						return Redirect('usuario/insertar');
					}

					if ($request->input('txtPass')!= $request->input('txtPassc')) 
					{
						Session::flash('msj-error', 'Las Contraseñas ingresadas no coinciden');
						return Redirect('usuario/insertar');
					}
				
					$tUsuario=new TUsuario();

					$tUsuario->codigoUsuario=uniqid();
					$tUsuario->nombre=$request->input('txtNombre');
					$tUsuario->apellidos=$request->input('txtApellidos');
					$tUsuario->correoElectronico=$request->input('txtEmail');
					$tUsuario->contrasenia=$encrypter->encrypt($request->input('txtPass'));
					$tUsuario->direccion=$request->input('txtDireccion');
					$tUsuario->numeroTelefono=$request->input('txtTelefono');
					$tUsuario->tipoUsuario=$request->input('selectTipo');
					$tUsuario->save();
				DB::commit();

				Session::flash('msj-correcto', 'Se insertó correctamente el usuario');
                return Redirect('usuario/insertar');

			}
			catch(\Exception $ex)
			{
				DB::rollback();

				Session::flash('msj-error', 'Se produjo un error, vuelva a intentarlo');
                return Redirect('usuario/insertar');
			}
		}

	return view('/usuario/insertar');
	}
	public function actionVer(Request $request)
	{
		
		$listaUsuario=TUsuario::All();

		return view('usuario/lista', ['listaUsuario' => $listaUsuario]);
	}
	public function actionEliminar(Request $request, $id)
    {
        $usuario = TUsuario::findOrFail($id);
        $usuario->delete();
        return Redirect::to('usuario/lista');
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
	        $tUsuario=TUsuario::whereRaw('codigoUsuario!=? and correoElectronico=?', [$request->input('codigoUsuario'), trim($request->input('txtEmail'))])->first();
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
    public function actionLogOut(SessionManager $sessionManager)
	{
   				
		$sessionManager->flush();

		return redirect('/');
	}
	public function actionLogIn(Request $request, SessionManager $sessionManager, Encrypter $encrypter)
	{

		$tUsuario=TUsuario::whereRaw('correoElectronico=?', [$request->input('InputUsername')])->first();

             
		if($tUsuario==null)
		{   
			return redirect('/');
		}

		if($encrypter->decrypt($tUsuario->contrasenia)!=$request->input('InputPassword'))
		{
			return redirect('/');
		}

		if($encrypter->decrypt($tUsuario->contrasenia)==$request->input('InputPassword') && $tUsuario->tipoUsuario=='Administrador' )
		{ 
			$sessionManager->put('codigoUsuario', $tUsuario);
			return redirect('index/inicioadmin');             	 
		}
    	
    	if($encrypter->decrypt($tUsuario->contrasenia)==$request->input('InputPassword') && $tUsuario->tipoUsuario=='Cajero')
		{ 
			$sessionManager->put('codigoUsuario', $tUsuario);
			return redirect('index/inicioadmin');             	 
		}
		$sessionManager->put('codigoUsuario', $tUsuario);
            

		return redirect('/');
	}
}