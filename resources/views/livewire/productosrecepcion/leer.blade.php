<style>
    table {
      border: 1px solid #ccc;
      border-collapse: collapse; 
      margin: 0;
      padding: 0;
      width: 100%;
      table-layout: fixed;
    }

    table caption {
      font-size: 1.5em;
      margin: .5em 0 .75em;
    }

    table tr {
      background-color: #f8f8f8;
      border: 1px solid #ddd;
      padding: .35em;
    }

    table th,
    table td {
      padding: .625em;
      text-align: center;
    }

    table th {
      font-size: .85em;
      letter-spacing: .1em;
      text-transform: uppercase;
    }

    @media screen and (max-width: 600px) {
      table {
        border: 0;
      }

      table caption {
        font-size: 1.3em;
      }
      
      table thead {
        border: none;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
      }
      
      table tr {
        border-bottom: 3px solid #ddd;
        display: block;
        margin-bottom: .625em;
      }
      
      table td {
        border-bottom: 1px solid #ddd;
        display: block;
        font-size: .8em;
        text-align: right;
      }
      
      table td::before {
        /*
        * aria-label has no advantage, it won't be read inside a table
        content: attr(aria-label);
        */
        content: attr(data-label);
        float: left;
        font-weight: bold;
        text-transform: uppercase;
      }
      
      table td:last-child {
        border-bottom: 0;
      }
    }
</style>
<div class="col-md-9">
    <div class="card card-primary card-outline">
        <div class="card-header">
             <div class="mailbox-controls with-border">
                <div class="btn-group" >
                    <h5 align="left">Detalle del Pedido</h5>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="mailbox-read-info">
                    <h6> Cliente : {{ $cabecera->name }}</h6>
                    <h6> Contacto : {{ $cabecera->contacto }}</h6>
                </div>
                <div class="mailbox-read-info">
                    <h6>Fecha del pedido :{{ date('d-m-Y', strtotime($cabecera->name)) }}</h6>  
                </div>
                <div class="mailbox-read-message">
                    <p>Pedidos:</p>
                    <div class="row">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>


                                @php
                                    $total=0;
                                @endphp 
                                @foreach ($productos as $value)
                                    <tr>
                                        <td scope="row" data-label="Servicio" style="text-align: left !important"><img src="{{ asset('/images/servicios/'.$value->foto) }}" style="width: 30px;border-radius: 10px;"> {{ $value->nombre }}</td>
                                        <td data-label="Precio">{{ $value->precio }}</td>
                                        <td data-label="Subtotal">{{ $value->precio }}</td>
                                    </tr>
                                    @php
                                        $total+=$value->precio;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="2" style="text-align: left !important;"><b>Total:</b></td>
                                    <td>{{ $total }} ₲</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                   <div class="frame">
                                <style type="text/css">
                                    #mapa{border:0px solid #999;height:400px; border-radius: 10px;}
                                </style>
                                <div id="mapa" class="shadow"></div>
                                <div id="tiempo"><br><button class="btn btn-outline-success" onclick="calculartiempo({{$cabecera->latitud}},{{$cabecera->longitud}},'{{$cabecera->usuario_id}}')" style="width: 100%">Calcular distancia y tiempo de llegada</button></div>
                                <br><p align="center">Abrir en Google Maps <a href="https://maps.google.com/?q={{$cabecera->latitud}},{{$cabecera->longitud}}">Ver Instrucciones</a></p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div>
                    @if ($msmstate == 0)
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="far fa-check-circle"></i>Confirmar Pedido</button>
                        <div class="modal fade" wire:init="openModal" wire:ignore.self id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Confirmar Pedido </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Realmente quiere confirmar el pedido actual? </p>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" wire:click="procesando({{ $cabecera->id }})" class="btn btn-success" data-dismiss="modal">Confirmar</button>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($msmstate == 1  )
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal{{ $cabecera->id }}"><i class="far fa-check-circle"></i>Marcar pedido de producto como entregado</button>
                        <div class="modal fade" id="exampleModal{{$cabecera->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Realmente quiere confirmar que el pedido fue entregado?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" wire:click="entregado({{ $cabecera->id }})" class="btn btn-success" data-dismiss="modal">Confirmar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('frontend/js/maps.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHcQT0yBuaLXWdx6Mv_hAroOB0HLmNp5g&callback=Maps" async defer></script>
<script>
    function Maps(){
        let lat = {{$cabecera->latitud}};
        let lng = {{$cabecera->longitud}};
        let empresa = '{{$empresa->nombre}}';
        let direccion = '{{$empresa->direccion}}';
        initMap(lat,lng,empresa,direccion);
    }        
</script>