<div>
    <div class="row">
		<div class="col-md-12">
			<input wire:model="search" class="form-control" type="search" placeholder="Buscar Producto">
		</div>
	</div><br>
	<div class="row table-responsive">
		@if ($productos->count())
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Código</th>
						<th>Producto</th>
						<th>Stock</th>
						<th>Precio</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($productos as $value)
						<tr>
							<td>{{ $value->codigo }}</td>
							<td><img src="/images/productos/{{ $value->foto }}" style="width:30px;border-radius:50%"> {{ $value->nombre }}</td>
							<td>{{ $value->stock }}</td>
							<td>
								<?= number_format($value->precio, 0, '', '.') ?>
								@if ($value->oferta)
									<br><b>Oferta:</b><?= number_format($value->oferta, 0, '', '.') ?>
								@endif
							</td>
							<td>
								<a href="productos/{{ $value->id }}"><button class="btn btn-sm btn-success"><i class="far fa-eye"></i></button></a>
								<a href="productos/{{ $value->id }}/edit"><button class="btn btn-sm btn-info"><i class="far fa-edit"></i></button></a>
								<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $value->id }}"><i class="far fa-trash-alt"></i></button>
								<!-- Modal -->
								<div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Eliminar Categoria</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p>¿Realmente quiere eliminar el producto {{ $value->nombre }}?</p>
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
</div>