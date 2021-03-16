@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h3>Crear producto</h3><hr>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group" align="center">
                        <label>Foto del producto:</label><br>
                        <img src="{{asset('/images/productos/'.$producto->foto)}}" alt="" class="src" width='200px'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Código de barra:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                        </div>
                        <input type="text" class="form-control" value="{{$producto->codigo}}" name="codigo" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Nombre del producto:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-shopping-bag"></i></span>
                        </div>
                        <input type="text" class="form-control" value="{{$producto->nombre}}" name="nombre" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="informacion">Descripción del producto</label>
                        <?= $producto->description ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"><br>
                    <label>Precio de venta:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                        </div>
                        <input type="number" value="{{$producto->codigo}}" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-6"><br>
                    <label>Precio de oferta:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                        </div>
                        <input type="number" value="{{$producto->oferta }}" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="informacion">Categorias del producto</label><br>
                        <ul>
                            @foreach($categoriaproducto as $value)
                                <li> {{ $value->nombre }}</li>
                            @endforeach
                        </ul>
                    </div>    
                </div>
            </div>
        </div>
    </div>
@stop
