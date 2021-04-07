@extends('adminlte::page')

@section('title', 'Categorias de Gastos')

@section('content_header')
    <h1>Categorias de Gastos</h1>
@stop

@section('content')


    <livewire:categoriagastos />

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
