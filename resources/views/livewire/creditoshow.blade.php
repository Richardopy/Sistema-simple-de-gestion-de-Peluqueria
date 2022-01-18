<div>
    <div class="row">
        <div class="col-md-12">
            <b>Cliente:</b> {{$cliente->name}}
        </div>
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$facturasmonto}}<sup style="font-size: 20px">₲</sup></h3>

                    <p>Deudas</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-money-bill-wave"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$pagosmonto}}<sup style="font-size: 20px">₲</sup></h3>

                    <p>Pagos</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-money-bill-wave"></i>
                </div>
                <!--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$facturasmonto-$pagosmonto}}<sup style="font-size: 20px">₲</sup></h3>

                    <p>Saldo</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-money-bill-wave"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Pagos</h3><hr>
            <form wire:submit.prevent="cobrar">
                <div class="input-group mb-3">
                    <input type="number" class="form-control" wire:model="montopago" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit">Cobrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        @if ($pagos->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pago</th>
                        <th>Fecha</th>
                        <th>Cobrador</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($pagos as $pag)
                        <tr>
                            <td>{{ $pag->id }}</td>
                            <td>{{ $pag->monto }}</td>
                            <td>{{ $pag->created_at }}</td>
                            <td>{{ $pag->cobrador }}</td>
                            <td>
                                @if($pag->estado == 1)
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $pag->id }}"><i class="far fa-trash-alt"></i></button>
                                @else
                                    <span class="badge badge-danger">Anulado</span>
                                @endif
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$pag->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Anular cobro</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Realmente quiere eliminar el cobro de la fecha {{ $pag->created_at }}?</p>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="button" wire:click="delete({{ $pag->id }})" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
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
                {{ $pagos->links() }}
            </div>
        @else
            <div class="col-12 alert alert-warning">
                No se encuentran registros de pagos
            </div>
        @endif
    </div>
</div>
