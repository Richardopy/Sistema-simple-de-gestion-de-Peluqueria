<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Empresa;
use Mail;


class ContactoController extends Controller{

    public function index(){

    	$empresa=Empresa::findOrFail(1);

        return view("frontend.contacto",['empresa'=>$empresa]);
<<<<<<< HEAD
=======

>>>>>>> ae2a517e3c52e70242b3b29bb35d9457bb7f5df3

    }	

    public function enviarcorreo(){

    	Mail::to('peluqueria.tech.circle@gmail.com')->send(new Contacto($contacto));

    }
} 