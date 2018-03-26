<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TLaptop;
use App\Model\TUsuario;
use App\Model\TPrestamo;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Maatwebsite\Excel\Facades\Excel;
use Redirect;
use DB;

class ReporteController extends Controller
{
    public function gananciadeldia(Response $response,Request $request)
    {
        if($_POST)
        {
            $ganancia=DB::table('tprestamo as p')->join('tlaptop as l','p.codigoLaptop','=','l.codigoLaptop')
            ->join('tusuario as u','p.codigoUsuario','=','u.codigoUsuario')->where('p.fechaRegistro','=',$request->input('dateFecha'))->get();
            $consulta = DB::table('tprestamo')->select(DB::raw('SUM(pago) as total'))->where('fechaRegistro','=',$request->input('dateFecha'))->get();
            $pdf=app('FPDF');
            $header = array('Nombre Cliente', 'Laptop','Fecha alquiler','Fecha devolucion','Costo');
            $pdf->SetFont('Arial','',14);
            $pdf->AddPage('L');
            // Colores, ancho de línea y fuente en negrita
            $pdf->SetFillColor(255,0,0);
            $pdf->SetTextColor(255);
            $pdf->SetDrawColor(128,0,0);
            $pdf->SetLineWidth(.3);
            $pdf->SetFont('','B');
            
            // Cabecera
            $w = array(50,60,50,50,30);
            for($i=0;$i<count($header);$i++)
            {
                $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
            }
            $pdf->Ln();
            // Restauración de colores y fuentes
            $pdf->SetFillColor(224,235,255);
            $pdf->SetTextColor(0);
            $pdf->SetFont('','',12);
            // Datos
            $fill = false;
            foreach ($ganancia as $key => $value) {
            # code...
                $pdf->Cell($w[0],6,$value->nombre,'LR',0,'L',$fill);
                $pdf->Cell($w[1],6,$value->marca."-".$value->color,'LR',0,'L',$fill);
                $pdf->Cell($w[2],6,$value->fechaAlquiler,'LR',0,'L',$fill);
                $pdf->Cell($w[3],6,$value->fechaDevolucion,'LR',0,'L',$fill);
                $pdf->Cell($w[4],6,$value->pago,'LR',0,'L',$fill);
                $pdf->Ln();
                $fill = !$fill;
            }
        $w2 = array(240);
        foreach ($consulta as $key => $values) {
            # code...
            $pdf->Cell($w2[0],6,'Ganancia Total del Dia :'.$values->total,'LR',0,'L',$fill);
            $pdf->Ln();
            $fill = !$fill;
        }
        $pdf->Cell(array_sum($w),0,'','T');
        $pdf->Cell(array_sum($w2),0,'','T');
        $headers=['Content-Type' => 'application/pdf'];

        return $response->make($pdf->Output('I'), 200, $headers);
        }

        return view('reporte.ganancia');
    }

    public function laptopprestamo(Request $request)
    {
        
        $laptopmasprestados=TPrestamo::with('tlaptop')->select(DB::raw('count(codigoLaptop) as total'),DB::raw('SUM(pago) as pagos'),'fechaRegistro')->groupBy('fechaRegistro')->orderBy('fechaRegistro', 'asc')->get();
                    
        
        $datos=[];
        foreach ($laptopmasprestados as $item) 
        {
            $datos[]=[$item->pagos,$item->fechaRegistro,$item->total];
        }

        Excel::create('laptop mas prestados Excel', function($excel) use($datos) 
        {
            $excel->sheet('Excel sheet', function($sheet) use($datos)
            {
                $sheet->setOrientation('landscape');
                $sheet->setAutoSize(true);

                $sheet->setBorder('A1:C1', 'thin');//borde de todo
           
                $sheet->cells('A1:C1',function($cells)//stilos
                {

                    $cells->setAlignment('center');
                    $cells->setValignment('center');
                    $cells->setBackground('#F3FA13');
                    $cells->setFontColor('#000000');
                    $cells->setFontSize(13);
               
                });

                //nombres de campos
                $sheet->cell('A1', function($cell){$cell->setValue('GANANCIA');});
                $sheet->cell('B1', function($cell){$cell->setValue('DEL MES DE ');});
                $sheet->cell('C1', function($cell){$cell->setValue('TOTAL DE LAPTOP PRESTADOS');});

                $sheet->fromArray($datos,null,'A2',false,false);//matriz ded los datos
            });
        })->export('xls');
        return view('reporte.laptopprestamo');
    }  
}
