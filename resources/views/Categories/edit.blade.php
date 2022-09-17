@extends('adminlte::page')

@section('title', 'Noticias - Zamora')

@section('content_header')
<div class="row">
    <div class="col-9">
        <h3>Editar Categoria {{ $category->name }}</h3>
    </div>
</div>
@stop

@section('content')
<form action="{{ route('categorias.update', $category) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $category->name }}">
        @error('nombre')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
