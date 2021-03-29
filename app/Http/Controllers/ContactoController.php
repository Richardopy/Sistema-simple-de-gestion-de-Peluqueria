<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Mail\contacto;
use Mail;


class ContactoController extends Controller{

    public function index(){

    	$empresa=Empresa::findOrFail(1);

        return view("frontend.contacto",['empresa'=>$empresa]);
    }	

    public function enviarcorreo(Request $request){

    	$contacto = new \stdClass();
            $contacto->nombre = $request->get('nombre');
            $contacto->celular = $request->get('celular');
            $contacto->mensaje = $request->get('mensaje');

    	Mail::to('peluqueria.tech.circle@gmail.com')->send(new contacto($contacto));

    }
} 