@extends('adminlte::page')

@section('title', 'Perfil de Empresa')

@section('content_header')
 <h1>Perfil de Empresa </h1><hr>
@stop

@section('content')
 	<style>
        /*-----  Css de botones para subir imagenes -----*/
        .thumb {
            width: 200px;
            border: 0px solid #000;
            margin: 10px 5px 0 0;
        }
        .yourBtn {
            width: 200px;
            padding: 10px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border: 1px dashed #BBB;
            text-align: center;
            cursor: pointer;
            margin: 0 auto;
        }
    </style>
    {!! Form::model($empresa,['method'=>'PATCH','route'=>['empresa.update',$empresa->id],'files'=>'true']) !!}
	{{Form::token()}}

		<div class="card">
	        <div class="card-body">
	            <div class="row">
                    <div class="col-12">
                        <div class="form-group" align="center">
                            <label>Foto del producto:</label><br>
                            <output id="list">
                                <img src="{{asset('imgsystem/producto.png')}}" class="img-responsive" alt="" style="width: 200px;" />
                            </output>
                            <div class="yourBtn" onclick="getFile()">
                                <img src="{{asset('imgsystem/flechita.svg')}}" alt=""> <span>Subir Imagen&hellip;</span>
                            </div>
                            <div style='height: 0px;width: 0px; overflow:hidden;'>
                                <input id="files" type="file" value="upload" name="logo" onchange="sub(this)" accept="image/jpeg, image/png, image/bmp" />
                            </div>
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
	                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{ $empresa->nombre }}" name="nombre" placeholder="Denominación de la Empresa" required>
	                        @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
	                    </div>
	                </div>
	                <div class="col-md-6">
	                    <label>RUC/CI:</label>
	                    <div class="input-group mb-3">
	                        <div class="input-group-prepend">
	                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
	                        </div>
	                        <input type="text" class="form-control @error('ruc') is-invalid @enderror" value="{{ $empresa->ruc }}" name="ruc" placeholder="RUC de la Empresa" required>
	                        @error('ruc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
	                    </div>
	                </div>
	            </div>
	            <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="informacion">Descripción de la Empresa</label>
                            <textarea name="info" id="informacion" class="textarea form-control" style="width: 100%" placeholder="Escriba el cuerpo del mensaje" cols="30" rows="10" required>{{ $empresa->info }}</textarea>
                            @error('info')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
		                    <input type="text" class="form-control  @error('direccion') is-invalid @enderror" value="{{ $empresa->direccion }}" name="direccion" placeholder="Dirección de la Empresa" required>
	                        @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="col-md-4">
		                <label>Teléfono de la Empresa:</label>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></i></span>
		                    </div>
		                    <input type="text" class="form-control @error('telefono1') is-invalid @enderror" value="{{ $empresa->telefono1 }}" name="telefono1" placeholder="Teléfono de la Empresa" required>
	                        @error('telefono1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="col-md-4">
			            <label>Fecha de fundación de la Empresa:</label>
			            <div class="input-group mb-3">
			                <div class="input-group-prepend">
			                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></i></i></span>
			                </div>
			                <input type="date" class="form-control @error('fundacion') is-invalid @enderror" value="{{ $empresa->fundacion }}" name="fundacion" placeholder="Fecha de fundación de la Empresa" required>
	                        @error('fundacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
		                    <input type="text" class="form-control @error('telefono2') is-invalid @enderror" value="{{ $empresa->telefono2 }}" name="telefono2" placeholder="Otro Teléfono de la Empresa">
	                        @error('telefono2')
	                        	<span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="col-md-6">
		                <label>Whatsapp de la Empresa:</label>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text"><i class="fab fa-whatsapp"></i></i></span>
		                    </div>
		                    <input type="text" class="form-control @error('Whatsapp') is-invalid @enderror" value="{{ $empresa->whatsapp }}" name="whatsapp" placeholder="Whatsapp de la Empresa">
	                        @error('whatsapp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
		                    <input type="text" id="id_lat" class="form-control @error('latitud') is-invalid @enderror" value="{{ $empresa->latitud }}" name="latitud" placeholder="Latitud de la Empresa" required>
	                        @error('latitud')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="col-md-6">
		                <label>Longitud de la Empresa:</label>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text"><i class="fas fa-location-arrow"></i></i></span>
		                    </div>
		                    <input type="text" id="id_lng" class="form-control @error('longitud') is-invalid @enderror" value="{{ $empresa->longitud }}" name="longitud" placeholder="Longitud de la Empresa" required>
	                        @error('longitud')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
		                    <input type="text" class="form-control @error('facebook') is-invalid @enderror" value="{{ $empresa->facebook }}" name="facebook" placeholder="Facebook de la Empresa">
	                        @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="col-md-6">
		                <label>Instagram de la Empresa:</label>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text"><i class="fab fa-instagram"></i></i></i></span>
		                    </div>
		                    <input type="text" class="form-control @error('instagram') is-invalid @enderror" value="{{ $empresa->instagram }}" name="instagram" placeholder="Instagram de la Empresa">
	                        @error('instagram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
		                    <input type="text" class="form-control @error('twitter') is-invalid @enderror" value="{{ $empresa->twitter }}" name="twitter" placeholder="Twitter de la Empresa">
	                        @error('twitter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="col-md-6">
		                <label>Correo de la Empresa:</label>
		                <div class="input-group mb-3">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></i></i></span>
		                    </div>
		                    <input type="mail" class="form-control @error('correo') is-invalid @enderror" value="{{ $empresa->correo }}" name="correo" placeholder="Correo de la Empresa">
	                        @error('correo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
		            </div>
		            <div class="col-md-12">
		            	<div class="form-group"><br>
			                <label><b>Marcar ubicación de la empresa:</b></label>
			                <style type="text/css">
			                    #mapa{border:1px solid #999;height:200px}
			                    #mapa img{max-width:none}
			                </style>
			                <div id="mapa"></div>
			            </div>
		            </div>
		        </div>
	    	</div>
	    	<div class="card-footer" align="center">
	            <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Guardar Cambios</button>
	        </div>
	    </div>
 	{!!Form::close()!!}
 	<script>
        function archivo(evt) {
            var files = evt.target.files; // FileList object
                 
            // Obtenemos la imagen del campo "file".
            for (var i = 0, f; f = files[i]; i++) {
                //Solo admitimos imágenes.
                if (!f.type.match('image.*')) {
                    continue;
                }
                 
                var reader = new FileReader();
                 
                reader.onload = (function(theFile) {
                    return function(e) {
                        // Insertamos la imagen
                        document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(f);
                 
                reader.readAsDataURL(f);
            }
        }
                 
        document.getElementById('files').addEventListener('change', archivo, false);

        function getFile() {
            document.getElementById("files").click();
        }

            function sub(obj) {
            var file = obj.value;
            var fileName = file.split("\\");
            //document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
            event.preventDefault();
        }
    </script>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <!--js para editar o marcar ubicación google maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHcQT0yBuaLXWdx6Mv_hAroOB0HLmNp5g&callback"></script>
    <script src="{{ asset('frontend/js/makermaps.js')}}" charset="utf-8"></script>
    <script>initialize({{$empresa->latitud}}, {{$empresa->longitud}});</script>

    <script>
        $(function () {
            // Summernote
            $('#informacion').summernote({
                height: '100%',
            });
        });
    </script>
@stop

