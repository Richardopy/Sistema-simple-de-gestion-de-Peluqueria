@extends('adminlte::page')

@section('title', 'Carga de Gastos')

@section('content_header')
    <h1>Carga de Gastos</h1>
@stop

@section('content')


    @livewire('add-gasto', ['categoria_id' => 1])

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
