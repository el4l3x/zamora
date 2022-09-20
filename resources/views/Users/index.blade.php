@extends('adminlte::page')

@section('title', 'Alcaldia Zamora')

@section('content_header')
    @can('users.create')
        <a class="btn btn-secondary btn-sm float-right" type="button" href="{{ route('usuarios.create') }}">Nuevo Usuario</a>
    @endcan
    <h3>Lista de Usuarios</h3>
@stop

@section('content')
@livewire('admin.users-index')
@stop

@section('css')
    
@stop

@section('js')
    
@stop