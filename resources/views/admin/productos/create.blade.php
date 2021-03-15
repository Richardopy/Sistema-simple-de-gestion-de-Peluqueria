@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h3>Crear producto</h3><hr>
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

    {!! Form::open(array('url'=>'admin/productos','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
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
                                <input id="files" type="file" value="upload" name="foto" onchange="sub(this)" accept="image/jpeg, image/png, image/bmp" />
                            </div>
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
                            <input type="text" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo') }}" name="codigo" placeholder="Código de barra">
                            @error('codigo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Nombre del medicamento:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pills"></i></span>
                            </div>
                            <input type="text" class="form-control @error('med_nom') is-invalid @enderror" value="{{ old('med_nom') }}" name="med_nom" placeholder="Nombre del medicamento">
                            @error('med_nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="informacion">Descripción del producto</label>
                        <textarea name="mensaje" id="informacion" class="textarea form-control" style="width: 100%" placeholder="Escriba el cuerpo del mensaje" cols="30" rows="10" required>{{ old('mensaje') }}</textarea>
                        @error('mensaje')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"><br>
                        <label>Precio de compra:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                            </div>
                            <input type="number" id="compra" value="{{ old('med_preciocompra') }}" name="med_preciocompra" class="form-control @error('med_preciocompra') is-invalid @enderror" placeholder="Precio de compra">
                            @error('med_preciocompra')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Precio de venta:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                            </div>
                            <input type="number" id="venta" value="{{ old('med_precioventa') }}" name="med_precioventa" class="form-control @error('med_precioventa') is-invalid @enderror" placeholder="Precio de venta">
                            @error('med_precioventa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer" align="center">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Crear Producto</button>
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
@section('adminlte_js')
    <script>
        $(function () {
            // Summernote
            $('#informacion').summernote({
                height: '100%',
            });
        });
    </script>

@stop