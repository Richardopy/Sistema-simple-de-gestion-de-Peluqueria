<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use Image, file;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\CategoriaProducto;
use DB;

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
        $producto->stock=$request->get('stock');
        $producto->tipo=1;

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
    public function show($id) {
        $producto=Producto::findOrFail($id);  

        $categoriaproducto=DB::table('categoria_productos as cp')
            ->join('productos as p','cp.producto_id','p.id')
            ->join('categorias as c','cp.categoria_id','c.id')
            ->select('c.nombre')
            ->where('p.id',$id)->get();
        
        return view('admin.productos.show',["producto"=>$producto,"categoriaproducto"=>$categoriaproducto]);  
    }
    public function edit($id) {
        $producto=Producto::findOrFail($id);  

        $categoriaproductos=CategoriaProducto::select('categoria_id')->where('producto_id',$id)->get();

        $categorias=Categoria::where("estado",1)->get();
        
        return view('admin.productos.edit',["producto"=>$producto,"categorias"=>$categorias,"categoriaproductos"=>$categoriaproductos]);
}
    public function update(Request $request,$id) {

        $producto=Producto::findOrFail($id); 

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
        $producto->stock=$request->get('stock');


        if ($producto->update()){
            
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

            Session::flash('success', '¡El producto se creo correctamente!');
        }
        return Redirect::to('admin/productos');
}	
}