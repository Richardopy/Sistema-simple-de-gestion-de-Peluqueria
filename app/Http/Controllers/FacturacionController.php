<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class FacturacionController extends Controller{
	public function index(){
		return view('admin.facturacion.index');
	}

	public function create(){
		return view('admin.facturacion.create');
	}
}
