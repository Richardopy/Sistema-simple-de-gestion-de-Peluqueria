@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>Recepción de citas para Servicios</h1>
@stop

@section('content')

<livewire:serviciorecepcion />

@stop

@section('js')
    <script> 
    	console.log('Hi!'); 
		
	</script>
@stop
