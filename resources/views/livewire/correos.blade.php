@extends('adminlte::page')

@section('title', 'Mensajes')

@section('content_header')
    <h1>Mensajes</h1>
@stop

@section('content')

<div>
	<!-- Main content -->
    <section class="content">
    	<div class="row">
        	<div class="col-md-3">
          		<div class="card">
            		<div class="card-header">
              			<h3 class="card-title">Carpetas</h3>

            <div class="card-tools">
            	<button type="button" class="btn btn-tool" data-card-widget="collapse">
                 	<i class="fas fa-minus"></i>
                </button>
            </div>
            		</div>
            <div class="card-body p-0">
            	<ul class="nav nav-pills flex-column">
                	<li class="nav-item active">
                  		<a href="#" class="nav-link">
                    		<i class="far fa-envelope"></i> Recibidos
                    		<span class="badge bg-primary float-right">12</span>
                  		</a>
                	</li>
                	<li class="nav-item">
                  		<a href="#" class="nav-link">
                    		<i class="far fa-envelope-open"></i> Abiertos
                  		</a>
                	</li>
                	<li class="nav-item">
                  		<a href="#" class="nav-link">
                    		<i class="far fa-trash-alt"></i> Papelera
                  		</a>
                	</li>
              	</ul>
            </div>
            <!-- /.card-body -->
        		</div>
        	</div>
        <!-- /.col -->
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
                  1-50/200
                	<div class="btn-group">
                    	<button type="button" class="btn btn-default btn-sm">
                      		<i class="fas fa-chevron-left"></i>
                    	</button>
                    	<button type="button" class="btn btn-default btn-sm">
                      		<i class="fas fa-chevron-right"></i>
                    	</button>
                  	</div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
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
			                    		<td class="mailbox-name"><a href="{{URL('/admin/mensajes/leercorreo/'.$value->id)}}" >{{ $value->nombre }}</a>
			                    		</td>
		                    			<td class="mailbox-subject" ><b>Nuevo mensaje de la web</b>
		                    			</td>
		                    			<td class="mailbox-attachment" ></td>
		                    			<td class="mailbox-date" >{{ $value->updated_at->format('D') }}</td>
		                  			</tr>
		                  		</tbody>
		                	</table>
		                	
		                @endforeach

                	@endif
				</div>
                <!-- /.table -->
           		
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
                <div class="float-right">1-50/200
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                    	<i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                    	<i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              	</div>
            </div>
     			</div>
          <!-- /.card -->
  			</div>
        <!-- /.col -->
		</div>
      <!-- /.row -->
	</section>
    <!-- /.content -->
</div>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
