<div>
    <div class="row">
        <div class="col-md-12">
            <input wire:model="search" class="form-control" type="search" placeholder="Buscar ..."> <hr>
        </div>
    </div>
    <div class="row">
        @if ($encabezado->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($encabezado as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>
                                <a href="/admin/credito/{{ $value->id }}"><button class="btn btn-sm btn-success"><i class="fas fa-eye"></i></button></a>
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