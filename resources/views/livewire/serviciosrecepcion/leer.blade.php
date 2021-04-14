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
               
                <h6>Remitente: {{ $usuario_id }} <span class="mailbox-read-time float-right">{{ $usuario_id }}</span></h6>
            </div>
       
                <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
                <p>{{ $usuario_id }}</p>
                <p>Número de celular:</p>
                <p>{{ $usuario_id }}</p>
            </div>
          <!-- /.mailbox-read-message -->
        </div>
         <div class="card-footer">
              <div>
              <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
             <td>      
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ mensaje_id}}"><i class="far fa-trash-alt"></i></button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$mensaje_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar mensaje</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>¿Realmente quiere enviar a la papelera el mensaje de {{ $nombre }}?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" wire:click="delete({{ $mensaje_id}})" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
            </div>
    </div>
</div>