<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Image, file;
use Session;
use DB;

class EmpresaController extends Controller{

    public function index(){

    	$empresa=Empresa::first();

        return view("admin.empresa.index",['empresa'=>$empresa]);

    }	
    
    public function edit($id) {

        $empresa=Empresa::findOrFail($id);  
        
        return view('admin.empresa.edit',["empresa"=>$empresa]);
	}

    public function update(Request $request,$id) {

        $empresa=Empresa::findOrFail($id); 

        $empresa->nombre=$request->get('nombre');

        if($file = $request->file('logo')) {
            $control=0;
            $nombre = rand().".".$file->getClientOriginalExtension();
            while ($control == 0) {
                if (is_file( public_path() . '/images/empresa/' . $nombre )) {
                    $nombre = rand() . $nombre;
                }else{
                    Image::make($request->file('logo'))
                        ->heighten(1000)
                        ->save(public_path() . '/images/empresa/' . $nombre);
                    $empresa->logo=$nombre;
                    $control=1;
                }
            }
        }

        $empresa->info=$request->get('info');
        $empresa->ruc=$request->get('ruc');
        $empresa->direccion=$request->get('direccion');
        $empresa->telefono1=$request->get('telefono1');
        $empresa->telefono2=$request->get('telefono2');
        $empresa->whatsapp=$request->get('whatsapp');
        $empresa->latitud=$request->get('latitud');
        $empresa->longitud=$request->get('longitud');
        $empresa->facebook=$request->get('facebook');
        $empresa->instagram=$request->get('instagram');
        $empresa->twitter=$request->get('twitter');
        $empresa->correo=$request->get('correo');
        $empresa->fundacion=$request->get('fundacion');

        if ($empresa->update()){

            Session::flash('success', '¡El empresa se creo correctamente!');
        }

        return Redirect::to('admin/empresa');
	}	
}
