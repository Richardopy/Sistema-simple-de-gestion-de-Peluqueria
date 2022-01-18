@extends('adminlte::page')

@section('title', 'Panel de Control')

@section('content_header')
    <h1>Panel de Control </h1><hr>
@stop

@section('content')

    <livewire:panelcontrol />

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop