@extends('adminlte::page')

@section('title', 'Perfil de Empresa')

@section('content_header')
 <h1>Perfil de Empresa </h1><hr>
@stop

@section('content')

	<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group" align="center">
                        <img src="{{asset('images/empresa/'.$empresa->logo)}}" class="img-responsive" alt="" style="width: 200px;" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Denominacion de la Empresa:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                        </div>
                        <input type="text" class="form-control" value="{{ $empresa->nombre }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>RUC/CI:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                        </div>
                        <input type="text" class="form-control" value="{{ $empresa->ruc }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="informacion">Descripción de la empresa:</label>
                        <p><?= $empresa->info ?></p>
                    </div>
                </div>
            </div>
	        <div class="row">
	       		<div class="col-md-4">
	                <label>Dirección</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->direccion }}" readonly>
	                </div>
	            </div>
	            <div class="col-md-4">
	                <label>Teléfono de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->telefono1 }}" readonly>
	                </div>
	            </div>
	            <div class="col-md-4">
		            <label>Fecha de fundación de la Empresa:</label>
		            <div class="input-group mb-3">
		                <div class="input-group-prepend">
		                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></i></i></span>
		                </div>
		                <input type="text" class="form-control" value="{{ $empresa->fundacion }}" readonly>
		            </div>
		        </div>
	        </div>      
	        <div class="row">
	            <div class="col-md-6">
	                <label>Otro teléfono de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->telefono2 }}" readonly>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <label>Whatsapp de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fab fa-whatsapp"></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->whatsapp }}" readonly>
	                </div>
	            </div>
	        </div>
	        <div class="row">        
	            <div class="col-md-6">
	                <label>Latitud de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fas fa-location-arrow"></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->latitud }}" readonly>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <label>Longitud de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fas fa-location-arrow"></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->longitud }}" readonly>
	                </div>
	            </div>
	        </div>
	        <div class="row">        
	            <div class="col-md-6">
	                <label>Facebook de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fab fa-facebook-f"></i></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->facebook }}" readonly>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <label>Instagram de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fab fa-instagram"></i></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->instagram }}" readonly>
	                </div>
	            </div>
	        </div>
	        <div class="row">        
	            <div class="col-md-6">
	                <label>Twitter de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fab fa-twitter"></i></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->twitter }}" readonly>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <label>Correo de la Empresa:</label>
	                <div class="input-group mb-3">
	                    <div class="input-group-prepend">
	                        <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></i></i></span>
	                    </div>
	                    <input type="text" class="form-control" value="{{ $empresa->correo }}" readonly>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	        	<div class="col-12">
                    <style type="text/css">
                        #mapa{border:0px solid #999;height:250px; border-radius: 10px;}
                    </style>
                    <div id="mapa" class="shadow"></div>
                    <div id="tiempo"><br><button class="btn btn-outline-success" onclick="calculartiempo({{$empresa->latitud}},{{$empresa->longitud}},'{{$empresa->nombre}}')" style="width: 100%">Calcular distancia y tiempo de llegada</button></div>
                    <br><p align="center">Abrir en Google Maps <a href="https://maps.google.com/?q={{$empresa->latitud}},{{$empresa->longitud}}">Ver Instrucciones</a></p>
                </div>
	        </div>
    	</div>
    	<div class="card-footer" align="center">
            <a href="empresa/{{ $empresa->id }}/edit"><button type="button" class="btn btn-info"><i class="fas fa-save"></i> Editar Empresa</button></a>
        </div>
    </div>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <!-- Mostrando mapa y calculando distancias y tiempos -->
    <script type="text/javascript" src="{{ asset('frontend/js/maps.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHcQT0yBuaLXWdx6Mv_hAroOB0HLmNp5g&callback=Maps" async defer></script>
    <script>
        function Maps(){
            let lat = {{$empresa->latitud}};
            let lng = {{$empresa->longitud}};
            let empresa = '{{$empresa->nombre}}';
            let direccion = '{{$empresa->direccion}}';
            initMap(lat,lng,empresa,direccion);
        }        
    </script>
    <!-- Fin Mapas -->
@stop
