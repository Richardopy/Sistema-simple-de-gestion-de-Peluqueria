@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h3>Editar producto</h3><hr>
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

{!! Form::model($producto,['method'=>'PATCH','route'=>['productos.update',$producto->id],'files'=>'true']) !!}
{{Form::token()}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group" align="center">
                            <label>Foto del producto:</label><br>
                            <output id="list">
                                @if($producto->foto)
                                <img src="{{asset('images/productos/'.$producto->foto)}}" class="img-responsive" alt="" style="width: 200px;" />
                                @else
                                    <img src="{{asset('imgsystem/producto.png')}}" class="img-responsive" alt="" style="width: 200px;" />
                                @endif
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
                            <input type="text" class="form-control @error('codigo') is-invalid @enderror" value="{{ $producto->codigo }}" name="codigo" placeholder="Código de barra">
                            @error('codigo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Nombre del producto:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-shopping-bag"></i></span>
                            </div>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{$producto->nombre}}" name="nombre" placeholder="Nombre del producto">
                            @error('nombre')
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
                            <label for="informacion">Descripción del producto</label>
                            <textarea name="description" id="informacion" class="textarea form-control" style="width: 100%" placeholder="Escriba el cuerpo del mensaje" cols="30" rows="10" required>{{ $producto->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                            <input type="number" id="precio" value="{{ $producto->precio }}" name="precio" class="form-control @error('precio') is-invalid @enderror" placeholder="Precio de venta">
                            @error('precio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Precio de oferta:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                            </div>
                            <input type="number" id="oferta" value="{{ $producto->oferta }}" name="oferta" class="form-control @error('oferta') is-invalid @enderror" placeholder="Precio de oferta">
                            @error('oferta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="informacion">Seleccione Categorias</label><br>
                            <select class="js-example-basic-multiple" style="width: 100%" class="form-select select2" name="categorias[]" multiple="multiple">
                                @foreach($categoriaproducto as $value)
                                    <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                                @endforeach
                            </select>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer" align="center">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Editar Producto</button>
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
    @php
        $listado = '';
    @endphp
    @foreach ($categoriaproducto as $value)
        @php
            if ($listado){
                $listado = $listado.",".$value->id;
            }else{
                $listado = $listado.'['.$value->id;
            }
            
        @endphp
    @endforeach
    @php
        $listado = $listado.']';
    @endphp
@stop
@section('adminlte_js')
    <script>
        $(function () {
            // Summernote
            $('#informacion').summernote({
                height: '100%',
            });
        });
        $('.js-example-basic-multiple').select2();
        $('.js-example-basic-multiple').val({{ $listado }}).trigger('change');
    </script>

@stop