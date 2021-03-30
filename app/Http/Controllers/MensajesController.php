<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Mail\contacto;
use App\Models\Mensaje;

class MensajesController extends Controller{

    public function index(){

    	$mensaje=Mensaje::findOrFail(1);

        return view("mensajes");
    }	
}