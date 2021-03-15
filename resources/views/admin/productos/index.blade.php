@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Productos <a href="productos/create"><button class="btn btn-success"><i class="fas fa-plus-circle"></i> Crear Producto</button></a></h1><hr>
@stop

@section('content')


    <livewire:productos />

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop