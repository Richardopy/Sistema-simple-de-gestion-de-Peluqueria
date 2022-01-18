@extends('adminlte::page')

@section('title', 'Informe productos y servicios')

@section('content_header')
    <h1>Informe productos y servicios</h1><hr>
@stop

@section('content')


    <livewire:infoproductos />

@stop

@section('js')
    <script>
    	window.livewire.on('alert', param => {
	        toastr[param['type']](param['message']);
	    });
    </script>
    <script> console.log('Hi!'); </script>
@stop