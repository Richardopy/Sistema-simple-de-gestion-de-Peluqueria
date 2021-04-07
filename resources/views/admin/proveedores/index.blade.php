@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>Proveedores</h1>
@stop

@section('content')


    <livewire:proveedores />

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
