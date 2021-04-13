@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Recepción de Pedidos de Productos</h1>
@stop

@section('content')

<livewire:correos />

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
