@extends('adminlte::page')

@section('title', 'Perfil de Empresa')

@section('content_header')
 	<h1>Comprobante de ingreso <a href="facturacion/create"><button class="btn btn-success"><i class="fas fa-plus-circle"></i> Nuevo</button></a></h1><hr>
@stop

@section('content')
	<livewire:facturacionindex />
@stop

@section('js')
	<script>
		let identificadorTiempoDeEspera;

	    function printer() {
		  identificadorTiempoDeEspera = setTimeout(funcionConRetraso, 1000);
		}

		function funcionConRetraso() {
		  	var mode = 'iframe'; //popup
	        var close = mode == "popup";
	        var options = { mode : mode, popClose : close};
	        $("div.printableArea").printArea( options );
		}
	</script>
	@if(isset($_GET['vuelto']))
		<script> $('#exampleModalvuelto').modal('show'); </script>
	@endif
@stop