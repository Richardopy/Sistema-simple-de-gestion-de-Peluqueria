<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use Image, file;
use Illuminate\Support\Facades\Redirect;
use Session;


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
}