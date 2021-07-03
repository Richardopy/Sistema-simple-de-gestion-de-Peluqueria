@extends('adminlte::page')

@section('title', 'Carga de compras de proveedor')

@section('content_header')
    <h1>Carga de Compras de Proveedor</h1>
@stop

@section('content')


    @livewire('compras')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
