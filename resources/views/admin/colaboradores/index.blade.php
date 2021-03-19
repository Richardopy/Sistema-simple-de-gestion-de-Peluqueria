@extends('adminlte::page')

@section('title', 'Colaboradores')

@section('content_header')
    <h1>Colaboradores</h1>
@stop

@section('content')


    <livewire:empleado />

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
