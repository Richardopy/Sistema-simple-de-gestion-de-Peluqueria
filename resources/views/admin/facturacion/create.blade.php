@extends('adminlte::page')

@section('title', 'Perfil de Empresa')

@section('content_header')
 	<h1>Facturación</h1><hr>
@stop

@section('content')
	<livewire:facturacioncreate />
@stop

@section('adminlte_js')
    <script>
        $('.js-example-basic-multiple').select2();
    </script>

@stop