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
               
                <h6>Remitente: {{ $nombre }} <span class="mailbox-read-time float-right">{{ $update_at }}</span></h6>
            </div>
       
                <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
                <p>{{ $mensaje }}</p>
                <p>Número de celular:</p>
                <p>{{ $celular }}</p>
            </div>
          <!-- /.mailbox-read-message -->
        </div>
         <div class="card-footer">
              <div>
              <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
             <td>      
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $cat->id }}"><i class="far fa-trash-alt"></i></button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <button type="button" wire:click="delete({{ $cat->id }})" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
            </div>
    </div>
</div>