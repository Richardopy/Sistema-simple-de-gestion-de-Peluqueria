@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')


    <livewire:cliente />

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
