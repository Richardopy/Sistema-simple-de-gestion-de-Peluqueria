<div>
<div class="container">
<div class="row">
        <div class="col-md-12"> 
            @if($updateMode ?? '')
                @include('livewire.cliente.update')
            @else
                @include('livewire.cliente.create')
            @endif
        </div>
        <div class="col-md-12">
              <input wire:model="search" class="form-control" type="search" placeholder="Buscar Cliente">
        </div>
</div>
  
    <br>
    <div class="row">
        @if ($clientes->count())
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Clientes</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($clientes as $cli)
                    <tr>
                        <td>{{ $cli->id }}</td>
                        <td>{{ $cli->name }}</td>
                        <td>
                        <button wire:click="edit({{ $cli->id }})" class="btn btn-sm btn-info">Editar</button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $cli->id }}"><i class="far fa-trash-alt"></i></button>

							<!-- Modal -->
							<div class="modal fade" id="exampleModal{{$cli->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Eliminar Cliente</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        <p>¿Realmente quiere eliminar al cliente  {{ $cli->name }}?</p>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							        <button type="button" wire:click="delete({{ $cli->id }})" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
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
</div>