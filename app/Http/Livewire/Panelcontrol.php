<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Carbon\Carbon;
use App\Models\Credito;

class Panelcontrol extends Component{

    public function render(){

        $ingresosemana=[];
        $egresosemana=[];

        $ingresomes=[];
        $egresomes=[];
        $fechas=[];

        $ingresoanho=[];
        $egresoanho=[];

        if($ingreso=DB::table('facturacionproductos')->get()){
            $ingreso=DB::table('facturacionproductos as fp')
                ->join('facturacionencabezados as fe','fp.encabezado_id','fe.id')
                ->where('fe.estado',1)->whereDate('fe.created_at',Carbon::today()->toDateString())
                ->sum(\DB::raw('fp.precio * fp.cantidad'));
            }
        
        $ingresocredito=Credito::where('estado',1)->whereDate('created_at',Carbon::today()->toDateString())
        ->sum('monto');

        $ingreso+=$ingresocredito;

        $gastosvarios=DB::table('gastos as g')
            ->join('categoria_gastos as cg','g.gastocategoria_id','cg.id')
            ->where('cg.estado',1)->whereDate('g.created_at',Carbon::today()->toDateString())
            ->sum('g.costo');

        $gastocopras=DB::table('compraproductos as cp')
            ->join('cabeceracompras as cc','cp.cabecera_id','cc.id')
            ->where('cc.estado',1)->whereDate('cp.created_at',Carbon::today()->toDateString())
            ->sum(\DB::raw('cp.precio * cp.cantidad'));

        $gasto=$gastosvarios+$gastocopras;

        $dia=Carbon::now()->startOfWeek(Carbon::SUNDAY);

        for ($i=0; $i < 7; $i++) { 
            $dato=DB::table('facturacionproductos as fp')
                ->join('facturacionencabezados as fe','fp.encabezado_id','fe.id')
                ->where('fe.estado',1)->whereDate('fe.created_at',Carbon::parse($dia)->toDateString())
                ->sum(\DB::raw('fp.precio * fp.cantidad'));

            $ingresocreditosemana=Credito::where('estado',1)->whereDate('created_at',Carbon::parse($dia)->toDateString())
                ->sum('monto');

            $ingresosemana[]=$dato+$ingresocreditosemana;

            $gastosvarios=DB::table('gastos as g')
                ->join('categoria_gastos as cg','g.gastocategoria_id','cg.id')
                ->where('cg.estado',1)->whereDate('g.created_at',Carbon::parse($dia)->toDateString())
                ->sum('g.costo');

            $gastocopras=DB::table('compraproductos as cp')
                ->join('cabeceracompras as cc','cp.cabecera_id','cc.id')
                ->where('cc.estado',1)->whereDate('cp.created_at',Carbon::parse($dia)->toDateString())
                ->sum(\DB::raw('cp.precio * cp.cantidad'));
            
            $egresosemana[]=$gastosvarios+$gastocopras;

            $dia=Carbon::parse($dia)->addDay(1);
        }

        $primerdia = Carbon::now()->firstOfMonth();
        $ultimodia = Carbon::now()->lastOfMonth();

        for ($i=Carbon::parse($primerdia)->format('d'); $i <= Carbon::parse($ultimodia)->format('d'); $i++) { 
            if($dato=DB::table('facturacionproductos')->get()){
                $dato=DB::table('facturacionproductos as fp')
                    ->join('facturacionencabezados as fe','fp.encabezado_id','fe.id')
                    ->where('fe.estado',1)->whereDate('fe.created_at',Carbon::parse($primerdia)->toDateString())
                    ->sum(\DB::raw('fp.precio * fp.cantidad'));

                $ingresocreditomes=Credito::where('estado',1)->whereDate('created_at',Carbon::parse($primerdia)->toDateString())
                    ->sum('monto');

                $ingresomes[]=$dato+$ingresocreditomes;

                $gastosvarios=DB::table('gastos as g')
                    ->join('categoria_gastos as cg','g.gastocategoria_id','cg.id')
                    ->where('cg.estado',1)->whereDate('g.created_at',Carbon::parse($primerdia)->toDateString())
                    ->sum('g.costo');

                $gastocopras=DB::table('compraproductos as cp')
                    ->join('cabeceracompras as cc','cp.cabecera_id','cc.id')
                    ->where('cc.estado',1)->whereDate('cp.created_at',Carbon::parse($primerdia)->toDateString())
                    ->sum(\DB::raw('cp.precio * cp.cantidad'));
                
                $egresomes[]=$gastosvarios+$gastocopras;
                $fechas[]=Carbon::parse($primerdia)->format('d');

                $primerdia=Carbon::parse($primerdia)->addDay(1);
            }
        }

        for ($i=1; $i <= 12; $i++) {
            $dato=DB::table('facturacionproductos as fp')
                ->join('facturacionencabezados as fe','fp.encabezado_id','fe.id')
                ->where('fe.estado',1)
                ->whereYear('fe.created_at', Carbon::now()->format('Y'))
                ->whereMonth('fe.created_at', $i)
                ->sum(\DB::raw('fp.precio * fp.cantidad'));

            $ingresocreditoanho=Credito::where('estado',1)
                ->whereYear('created_at', Carbon::now()->format('Y'))
                ->whereMonth('created_at', $i)
                ->sum('monto');

            $ingresoanho[]=$dato+$ingresocreditoanho;

            $gastosvarios=DB::table('gastos as g')
                ->join('categoria_gastos as cg','g.gastocategoria_id','cg.id')
                ->where('cg.estado',1)
                ->whereYear('g.created_at', Carbon::now()->format('Y'))
                ->whereMonth('g.created_at', $i)
                ->sum('g.costo');

            $gastocopras=DB::table('compraproductos as cp')
                ->join('cabeceracompras as cc','cp.cabecera_id','cc.id')
                ->where('cc.estado',1)
                ->whereYear('cp.created_at', Carbon::now()->format('Y'))
                ->whereMonth('cp.created_at', $i)
                ->sum(\DB::raw('cp.precio * cp.cantidad'));
            
            $egresoanho[]=$gastosvarios+$gastocopras;

        }


        return view('livewire.panelcontrol',["ingreso"=>$ingreso,"gasto"=>$gasto,
            "ingresosemana"=>json_encode($ingresosemana,JSON_NUMERIC_CHECK),
            "egresosemana"=>json_encode($egresosemana,JSON_NUMERIC_CHECK),
            "ingresomes"=>json_encode($ingresomes,JSON_NUMERIC_CHECK),
            "egresomes"=>json_encode($egresomes,JSON_NUMERIC_CHECK),
            "fechas"=>json_encode($fechas,JSON_NUMERIC_CHECK),
            "ingresoanho"=>json_encode($ingresoanho,JSON_NUMERIC_CHECK),
            "egresoanho"=>json_encode($egresoanho,JSON_NUMERIC_CHECK)
        ]);
    }
}
