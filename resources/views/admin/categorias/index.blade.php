@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')


    <livewire:categorias />

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
