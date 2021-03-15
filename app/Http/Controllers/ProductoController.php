<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use Image, file;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\CategoriaProducto;


class ProductoController extends Controller
{
    public function index(){
        return view("admin.productos.index");

    }

    public function create(){
        $categorias=Categoria::where("estado",1)->get();
        return view("admin.productos.create",["categorias"=>$categorias]);

    }

    public function store(Request $request) {

        $producto=new Producto;

        $producto->nombre=$request->get('nombre');

        if($file = $request->file('foto')) {
            $control=0;
            $nombre = rand().".".$file->getClientOriginalExtension();
            while ($control == 0) {
                if (is_file( public_path() . '/images/productos/' . $nombre )) {
                    $nombre = rand() . $nombre;
                }else{
                    Image::make($request->file('foto'))
                        ->heighten(1000)
                        ->save(public_path() . '/images/productos/' . $nombre);
                    $producto->foto=$nombre;
                    $control=1;
                }
            }
        }

		$producto->description=$request->get('description');
		$producto->codigo=$request->get('codigo');
		$producto->precio=$request->get('precio');
		$producto->oferta=$request->get('oferta');

        if ($producto->save()){
            
            foreach ($request->categorias as $categoria){
		    	$categoriaproducto=new CategoriaProducto;

		    	$categoriaproducto->producto_id=$producto->id;
		    	$categoriaproducto->categoria_id=$categoria;

		    	$categoriaproducto->save();
            }

            Session::flash('success', '¡El producto se creo correctamente!');
        }
        return Redirect::to('admin/productos');
	}	
}

