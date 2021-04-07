<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaGastos extends Controller
{
	public function index(){
   		return view("admin.categoriasgastos.index");

}
}