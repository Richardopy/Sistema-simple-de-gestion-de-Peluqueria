@extends('adminlte::page')

@section('title', 'Carga de compras de proveedor')

@section('content')


    @livewire('compras')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
