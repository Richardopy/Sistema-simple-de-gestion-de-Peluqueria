@extends('adminlte::page')

@section('title', 'Creditos')

@section('content_header')
    <h1>Creditos</h1>
@stop

@section('content')

    @livewire('creditoshow', ['usuario_id' => $usuario_id])

@stop

@section('js')
    <script>
    	window.livewire.on('alert', param => {
	        toastr[param['type']](param['message']);
	    });
    </script>
    <script> console.log('Hi!'); </script>
@stop