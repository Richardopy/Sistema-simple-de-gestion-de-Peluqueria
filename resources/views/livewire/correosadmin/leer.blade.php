<div class="col-md-9">
    <div class="card card-primary card-outline">
        <div class="card-header">
             <div class="mailbox-controls with-border">
               
                <div class="btn-group" >
                    <h5 align="left">Nuevo Mensaje desde la web</h5>
                  <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                    <i class="far fa-trash-alt"></i>
                  </button>
               
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
    </div>
</div>