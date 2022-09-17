@extends('adminlte::page')

@section('title', 'Alcaldia Zamora')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" type="button" href="{{ route('posts.create') }}">Nueva Noticia</a>
    <h3>Lista de Noticias</h3>
@stop

@section('content')
@livewire('admin.post-index')
@stop

@section('css')
    
@stop

@section('js')
    
@stop