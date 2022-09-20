@extends('adminlte::page')

@section('title', 'Alcaldia Zamora')

@section('content_header')
    @can('posts.create')
        <a class="btn btn-secondary btn-sm float-right" type="button" href="{{ route('posts.create') }}">Nueva Noticia</a>
    @endcan
    <h3>Lista de Noticias Publicadas</h3>
@stop

@section('content')
@livewire('admin.post-index')
@stop

@section('css')
    
@stop

@section('js')
    
@stop