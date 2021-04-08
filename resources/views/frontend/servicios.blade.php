@extends('layouts.frontend')
@section('contenido')

	@livewire('serviciosfrontend', ['limite' => 2])
@stop