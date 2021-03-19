<div>
<div class="container">
<div class="row">
        <div class="col-md-12"> 
            @include('livewire.empleado.create')
        </div>
        <div class="col-md-12">
              <input wire:model="search" class="form-control" type="search" placeholder="Buscar colaborador">
        </div>
</div>
  
    <br>
    <div class="row">
        @if ($clientes->count())
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Colaborador</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($clientes as $cli)
                    <tr>
                        <td>{{ $cli->id }}</td>
                        <td>{{ $cli->name }}</td>
                        <td>
                            @if ($cli->estado == 1)
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $cli->id }}"><i class="far fa-trash-alt"></i></button>
                            @else
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal{{ $cli->id }}"><i class="fas fa-user-check"></i></button>
                            @endif
                            

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$cli->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    @if ($cli->estado == 1)
                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar colaborador {{ $cli->name }}</h5>
                                    @else
                                        <h5 class="modal-title" id="exampleModalLabel">Activar colaborador {{ $cli->name }}</h5>
                                    @endif
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    @if ($cli->estado == 1)
                                        <p>¿Realmente quiere eliminar al colaborador  {{ $cli->name }}?</p>
                                    @else
                                        <p>¿Realmente quiere activar al colaborador  {{ $cli->name }}?</p>
                                    @endif
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    @if ($cli->estado == 1)
                                        <button type="button" wire:click="delete({{ $cli->id }})" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
                                    @else
                                        <button type="button" wire:click="delete({{ $cli->id }})" class="btn btn-success" data-dismiss="modal">Activar</button>
                                    @endif
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