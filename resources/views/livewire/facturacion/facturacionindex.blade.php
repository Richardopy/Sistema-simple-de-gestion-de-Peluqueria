<div>
	<div class="container">
		<div class="row">
        	<div class="col-md-12">
              	<input wire:model="search" class="form-control" type="search" placeholder="Buscar ..."> <hr>
        	</div>
		</div>
    	<div class="row">
        	@if ($encabezado->count())
		        <table class="table">
		            <thead>
		                <tr>
		                    <th>ID</th>
		                    <th>Cliente</th>
		                    <th>Fecha</th>
		                    <th>Acciones</th>

		                </tr>
		            </thead>
		            <tbody>

		                @foreach ($encabezado as $value)
		                    <tr>
		                        <td>{{ $value->id }}</td>
		                        <td>{{ $value->name }}</td>
		                        <td>{{ $value->created_at }}</td>
		                        <td>
		                        <button class="btn btn-sm btn-info">Ver</button>
		                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $value->id }}"><i class="far fa-trash-alt"></i></button>

									<!-- Modal -->
									<div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalLabel">Anular comprobante</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									        <p>¿Realmente quiere eliminar el comprobante?</p>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									        <button type="button" wire:click="delete({{ $value->id }})" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
									      </div>
									    </div>
									  </div>
									</div>
		                        </td>
		                    </tr>
		                @endforeach

		            </tbody>
		        </table>
		        <div class="col-12">
		        	{{ $encabezado->links() }}
		        </div>
	        @else
	            <div class="col-12 alert alert-warning">
	                No se encuentran registros para {{ $search }}
	            </div>
	        @endif
	    </div>
    </div>
</div>