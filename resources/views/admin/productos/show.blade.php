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
                            <input type="text" class="form-control @error('codigo') is-invalid @enderror" value="{{$producto->codigo}}" name="codigo" placeholder="Código de barra" readonly>
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
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{$producto->nombre}}" name="nombre" placeholder="Nombre del producto" readonly>
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
                                <?= $producto->description ?>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-6"><br>
                            <label>Precio de venta:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                </div>
                                <input type="number" id="precio" value="{{$producto->codigo}}" name="precio" class="form-control @error('precio') is-invalid @enderror" placeholder="Precio de venta" readonly>
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
                                <input type="number" id="oferta" value="{{$producto->oferta }}" name="oferta" class="form-control @error('oferta') is-invalid @enderror" placeholder="Precio de oferta" readonly>
                                @error('oferta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
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
