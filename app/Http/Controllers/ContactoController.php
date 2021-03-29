<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Empresa;



class ContactoController extends Controller{

    public function index(){

    	$empresa=Empresa::findOrFail(1);

        return view("frontend.contacto",['empresa'=>$empresa]);

    }	
} 