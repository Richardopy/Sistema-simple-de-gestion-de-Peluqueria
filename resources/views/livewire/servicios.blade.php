<div class="container">
	<div class="row">
        <div class="col-md-12">
              <input wire:model="search" class="form-control" type="search" placeholder="Buscar categoria">
        </div>
	</div><br>
	<div class="row">
	    @if ($servicios->count())
		    <table class="table">
		        <thead>
		            <tr>
		                <th>ID</th>
		                <th>Servicio</th>
		                <th>Acciones</th>

		            </tr>
		        </thead>
		        <tbody>

		            @foreach ($servicios as $value)
		                <tr>
		                    <td>{{ $value->id }}</td>
		                    <td>{{ $value->nombre }}</td>
		                    <td>
		                    <a href="servicios/{{ $value->id }}"><button class="btn btn-sm btn-success"><i class="far fa-eye"></i></button></a>
							<a href="servicios/{{ $value->id }}/edit"><button class="btn btn-sm btn-info"><i class="far fa-edit"></i></button></a>
							<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $value->id }}"><i class="far fa-trash-alt"></i></button>

								<!-- Modal -->
								<div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Eliminar Servicio</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <p>¿Realmente quiere eliminar el servicio {{ $value->nombre }}?</p>
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
	    @else
	        <div class="col-12 alert alert-warning">
	            No se encuentran registros para {{ $search }}
	        </div>
	    @endif
</div>
