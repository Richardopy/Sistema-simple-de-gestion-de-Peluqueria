@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h3>Crear Clientes</h3><hr>
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

    {!! Form::open(array('url'=>'admin/clientes','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
    {{Form::token()}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group" align="center">
                            <label>Foto de perfil del Cliente:</label><br>
                            <output id="list">
                                <img src="{{asset('imgsystem/perfil.png')}}" class="img-responsive" alt="" style="width: 200px;" />
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
            <div class="card-footer" align="center">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Crear Cliente</button>
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
        $('.js-example-basic-multiple').select2();
    </script>

@stop