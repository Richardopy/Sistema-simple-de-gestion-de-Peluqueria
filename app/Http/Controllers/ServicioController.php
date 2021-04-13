<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use Image, file;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
use Illuminate\Support\Facades\Auth; 
use App\Models\CabeceraCita;
use App\Models\ServicioCita;
use Carbon\Carbon;

class ServicioController extends Controller
{
    public function index(){
        return view("admin.servicios.index");

    }

    public function create(){
        return view("admin.servicios.create");
    }

    public function store(Request $request) {

        $servicio=new Servicio;

        $servicio->nombre=$request->get('nombre');

        if($file = $request->file('foto')) {
            $control=0;
            $nombre = rand().".".$file->getClientOriginalExtension();
            while ($control == 0) {
                if (is_file( public_path() . '/images/servicios/' . $nombre )) {
                    $nombre = rand() . $nombre;
                }else{
                    Image::make($request->file('foto'))
                        ->heighten(1000)
                        ->save(public_path() . '/images/servicios/' . $nombre);
                    $servicio->foto=$nombre;
                    $control=1;
                }
            }
        }

		$servicio->description=$request->get('description');
		$servicio->precio=$request->get('precio');
		$servicio->oferta=$request->get('oferta');

        if($servicio->save()){
            Session::flash('success', '¡El servicio se creo correctamente!');
        }

        return Redirect::to('admin/servicios');
	}	

    public function show($id) {
        $servicio=Servicio::findOrFail($id);  
        return view('admin.servicios.show',["servicio"=>$servicio]);  
    }

    public function edit($id) {
        $servicio=Servicio::findOrFail($id);  

        return view('admin.servicios.edit',["servicio"=>$servicio]);
    }

    public function update(Request $request,$id) {

        $servicio=Servicio::findOrFail($id); 

        $servicio->nombre=$request->get('nombre');

        if($file = $request->file('foto')) {
            $control=0;
            $nombre = rand().".".$file->getClientOriginalExtension();
            while ($control == 0) {
                if (is_file( public_path() . '/images/servicios/' . $nombre )) {
                    $nombre = rand() . $nombre;
                }else{
                    Image::make($request->file('foto'))
                        ->heighten(1000)
                        ->save(public_path() . '/images/servicios/' . $nombre);
                    $servicio->foto=$nombre;
                    $control=1;
                }
            }
        }
        $servicio->description=$request->get('description');
        $servicio->precio=$request->get('precio');
        $servicio->oferta=$request->get('oferta');

        if ($servicio->update()){
            Session::flash('success', '¡El servicio se creo correctamente!');
        }

        return Redirect::to('admin/servicios');
    }	

    public function enviarsolicitud(Request $request){

        $fecha = strtotime($request->get('cita_dia'));

        if (date("N", $fecha) == 1){
            $date = new Carbon('next monday');
        }elseif (date("N", $fecha) == 2){
            $date = new Carbon('next tuesday');
        }elseif (date("N", $fecha) == 3){
            $date = new Carbon('next wednesday');
        }elseif (date("N", $fecha) == 4){
            $date = new Carbon('next thursday');
        }elseif (date("N", $fecha) == 5){
            $date = new Carbon('next friday');
        }elseif (date("N", $fecha) == 6){
            $date = new Carbon('next saturday');
        }elseif (date("N", $fecha) == 7){
            $date = new Carbon('next sunday');
        }

        $cabecera=new CabeceraCita;

        $cabecera->cita_dia=$date->format('Y-m-d');
        $cabecera->cita_hora=$request->get('cita_hora');
        $cabecera->usuario_id=Auth::user()->id;

        if ($cabecera->save()) {
            $servicio = $request->get('servicio_id');

            for ($i=0; $i < count($servicio); $i++) {
                $pedido=new ServicioCita;

                $pedido->cabecera_id=$cabecera->id;
                $porciones = explode("id", $request->get('servicio_id')[$i]);
                $pedido->servicio_id=$porciones[1];
                $pedido->precio=$request->get('precio')[$i];

                $pedido->save();
                Cart::remove([
                    'id' => $request->get('servicio_id')[$i],
                ]);
            }
        }

        Session::flash('success', '¡Su cita se agendo correctamente, en breve nos comunicaremos un Ud.!');

        return Redirect::to('/');

    }
}