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
        $servicios=Servicio::where("estado",1)->get();
        return view("admin.servicios.create",["servicios"=>$servicios]);
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
                    $producto->foto=$nombre;
                    $control=1;
                }
            }
        }

		$servicio->description=$request->get('description');
		$servicio->codigo=$request->get('codigo');
		$servicio->precio=$request->get('precio');
		$servicio->oferta=$request->get('oferta');
        return Redirect::to('admin/servicios');
	}	
    public function show($id) {
        $servicio=Servicio::findOrFail($id);  

     
        return view('admin.productos.show',["producto"=>$producto,"categoriaproducto"=>$categoriaproducto]);  
    }
    public function edit($id) {
        $servicio=Servicio::findOrFail($id);  

       
        return view('admin.productos.edit',["producto"=>$producto,"categoriaproducto"=>$categoriaproducto]);
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
        $servicio->codigo=$request->get('codigo');
        $servicio->precio=$request->get('precio');
        $servicio->oferta=$request->get('oferta');

        if ($servicio->update()){
            
            $categoriaproductos=CategoriaProducto::where('producto_id',$id)->get();

            foreach ($categoriaproductos as $value){
                $value->delete();
            }

            foreach ($request->categorias as $categoria){
                $categoriaproducto=new CategoriaProducto;

                $categoriaproducto->producto_id=$producto->id;
                $categoriaproducto->categoria_id=$categoria;

                $categoriaproducto->save();
            }

            Session::flash('success', '¡El servicio se creo correctamente!');
        }
        return Redirect::to('admin/servicios');
}	
}