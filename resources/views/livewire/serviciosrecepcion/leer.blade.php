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
                    <h5 align="left">Nuevo Mensaje desde la web</h5>
                </div>
            </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="mailbox-read-info">
               
                <h6>Remitente: {{ $cabecera->name }} <span class="mailbox-read-time float-right">{{ $cabecera->name }}</span></h6>
            </div>
       
                <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
                <p>Pedido:</p>
                <div class="row">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Servicio</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total=0;
                            @endphp 
                            @foreach ($servicios as $value)
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
            </div>
          <!-- /.mailbox-read-message -->
        </div>
         <div class="card-footer">
              <div>
              <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
             <td>      
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $cabecera->id }}"><i class="far fa-trash-alt"></i></button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$cabecera->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar mensaje</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>¿Realmente quiere enviar a la papelera el mensaje de {{ $cabecera->name }}?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" wire:click="delete({{ $cabecera->id }})" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
            </div>
    </div>
</div>