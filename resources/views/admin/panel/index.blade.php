@extends('adminlte::page')

@section('title', 'Panel de Control')

@section('content_header')
    <h1>Panel de Control </h1><hr>
@stop

@section('content')

    <h1>Bienvenido {{ Auth::user()->name }}</h1>

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop