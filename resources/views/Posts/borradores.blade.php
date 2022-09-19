@extends('adminlte::page')

@section('title', 'Alcaldia Zamora')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" type="button" href="{{ route('posts.create') }}">Nueva Noticia</a>
    <h3>Lista de Borradores</h3>
@stop

@section('content')
@livewire('admin.borradores-index')
@stop

@section('css')
    
@stop

@section('js')
    
@stop