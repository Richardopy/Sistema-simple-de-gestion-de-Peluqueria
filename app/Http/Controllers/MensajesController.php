<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Mensaje;


class MensajesController extends Controller{

    public function index(){

    	$contacto=Mensaje::where("estado",0)->get();

        return view("admin.mensajes.index", ["contacto"=>$contacto]);
    }	

      public function leercorreo($id) {

        $contacto=Mensaje::findOrFail($id);  
        
        return view('admin.mensajes.leercorreo',["contacto"=>$contacto]);
	}

	public function leidos() {

        $contacto=Mensaje::where("estado",1)->get();  
        
        return view('admin.mensajes.leercorreo',["contacto"=>$contacto]);
	}

	public function borrados() {

        $contacto=Mensaje::where("estado",2)->get();  
        
        return view('admin.mensajes.leercorreo',["contacto"=>$contacto]);
	}

	public function delete($id)
    {
        if($id){
            $contacto = Mensaje::find($id);
            $contacto->estado=0;
            $contacto->update();
            session()->flash('message', 'Correo eliminado correctamente');
        }
    }    
}