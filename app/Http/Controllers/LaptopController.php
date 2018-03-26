<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect; 
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Validation\Rule;

use Session;
use DB;

use App\Model\TLaptop;

class LaptopController extends Controller
{
	public function actionInsertar(Request $request,SessionManager $sessionManager)
	{
		if($_POST)
		{
			$this->validate($request,
        	[
        	'txtMarca' => ['required'],
        	'txtColor' => ['required'],
            'txtProcesador' => ['required'],
            'txtRam' => ['required'],
            'txtDiscoDuro' => ['required'],

        	],
       		[
       		'txtMarca.required' => 'El campo Marca es obligatorio',
       		'txtColor.required' => 'El campo Color es obligatorio',
            'txtProcesador.required' => 'El campo Procesador es obligatorio',
            'txtRam.required' => 'El Campo Ram es obligatorio',
            'txtDiscoDuro.required' => 'El campo Disco Duro es obligatorio',
        	]);

			try
			{
				DB::beginTransaction();
					$tLaptop=new TLaptop();

					$tLaptop->codigoLaptop=uniqid();
					$tLaptop->marca=$request->input('txtMarca');
					$tLaptop->color=$request->input('txtColor');
					$tLaptop->procesador=$request->input('txtProcesador');
					$tLaptop->ram=$request->input('txtRam');
					$tLaptop->discoDuro=$request->input('txtDiscoDuro');
                    $tLaptop->cantidad=$request->input('txtCantidad');
					$tLaptop->save();
				DB::commit();

				Session::flash('msj-correcto', 'Se insertó correctamente');
                return Redirect('laptop/lista');

			}
			catch(\Exception $ex)
			{
				DB::rollback();

				Session::flash('msj-error', 'Se produjo un error, vuelva a intentarlo');
                return Redirect('laptop/insertar');
			}
		}

	return view('/laptop/insertar');
	}
	public function actionVer(Request $request)
	{
		
		$listaLaptop=TLaptop::All();

		return view('laptop/lista', ['listaLaptop' => $listaLaptop]);
	}
	public function actionEliminar(Request $request, $id)
    {
        $laptop = TLaptop::findOrFail($id);
        $laptop->delete();
        return Redirect::to('laptop/lista');
    }
    public function actionditar(Request $request, $id)
    {
    	$laptop = TLaptop::findOrFail($id);

        return view('laptop.editar',compact('laptop'));
    }

    public function actionEditar(Request $request)
    {
        
        DB::beginTransaction();

        try 
        {
            DB::commit();

            $laptop = TLaptop::findOrFail($request->get('codigoLaptop'));
            $laptop->marca=$request->input('txtMarca');
			$laptop->color=$request->input('txtColor');
			$laptop->procesador=$request->input('txtProcesador');
			$laptop->ram=$request->input('txtRam');
			$laptop->discoDuro=$request->input('txtDiscoDuro');
            $laptop->cantidad=$request->input('txtCantidad');
            $laptop->save();

            return Redirect::to('laptop/lista');
        } 
        catch (Exception $e) 
        {
            DB::rollback();
                    // no se... Informemos con un echo por ejemplo
            echo 'ERROR (' . $e->getCode() . '): ' . $e->getMessage();
        }
    }
}