@extends('adminlte::page')

@section('title', 'Noticias - Zamora')

@section('content_header')
<h3>Nueva Etiqueta</h3>
@stop

@section('content')
<form action="{{ route('tags.store') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control">
        @error('nombre')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar</button>

</form>

@stop

@section('css')
    
@stop

@section('js')
    
@stop