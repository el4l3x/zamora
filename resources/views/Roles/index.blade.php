@extends('adminlte::page')

@section('title', 'Alcaldia Zamora')

@section('content_header')
    @can('roles.create')
        <a class="btn btn-secondary btn-sm float-right" type="button" href="{{ route('roles.create') }}">Nuevo Rol</a>
    @endcan
    <h3>Lista de Roles</h3>
@stop

@section('content')
@livewire('admin.roles-index')
@stop

@section('css')
    
@stop

@section('js')
    
@stop