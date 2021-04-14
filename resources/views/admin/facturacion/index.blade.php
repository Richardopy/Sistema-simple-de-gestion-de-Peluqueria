@extends('adminlte::page')

@section('title', 'Perfil de Empresa')

@section('content_header')
 	<h1>Comprobante de ingreso <a href="facturacion/create"><button class="btn btn-success"><i class="fas fa-plus-circle"></i> Nuevo</button></a></h1><hr>
@stop

@section('content')
	<livewire:facturacionindex />
@stop