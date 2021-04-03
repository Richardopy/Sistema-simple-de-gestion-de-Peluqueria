<div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Bandeja de entrada</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <input wire:model="search" class="form-control" type="search" placeholder="Buscar correo">
                                <div class="input-group-append">
                                    <div class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
              <!-- /.card-tools -->
                    </div>
            <!-- /.card-header -->
                
                        <!-- /.float-right -->
                    </div>
<div class="card-body p-0">
                    <div class="mailbox-controls">
                    <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                    <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                        <div class="float-right">
                            {{ $contacto->links() }}
                        </div>
<div class="table-responsive mailbox-messages">
    	    			
	@if ($contacto->count())


		@foreach ($contacto as $value)
		    			
        	<table class="table table-hover table-striped" >
        		<tbody >
          			<tr >
            			<td >
	                    	<div class="icheck-primary">
	                        	<input type="checkbox" value="" id="check{{ $value->id }} ">
	                        		<label for="check{{ $value->id }}"></label>
	                     	</div>

            			</td>
                		<td class="mailbox-name"><a href="#" wire:click="leer({{ $value->id }})">{{ $value->nombre }}</a>
                		</td>
            			<td class="mailbox-subject" ><b>Nuevo mensaje de la web</b>
            			</td>
            			<td class="mailbox-attachment" ></td>
            			<td class="mailbox-date" >{{ $value->updated_at->format('D') }}</td>
          			</tr>
          		</tbody>
        	</table>
        	
        @endforeach
    @else
        <table class="table table-hover table-striped" >
            <tbody >
                <tr >
                    <td>
                        Sin mensajes
                    </td>
                </tr>
            </tbody>
        </table>
	@endif
</div>
</div>
                  <!-- /.mail-box-messages -->
                <!-- /.card-body -->
                <div class="card-footer p-0">
                    <div class="mailbox-controls">
                    <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                            <i class="far fa-square"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm">
                          <i class="fas fa-sync-alt"></i>
                        </button>
                        <div class="float-right">
                            {{ $contacto->links() }}
                        </div>
                        <!-- /.float-right -->
                    </div>
                </div>
            </div>