@extends('layouts.frontend')
@section('contenido')

	@livewire('agendarcita', ['limite' => 2])
@stop