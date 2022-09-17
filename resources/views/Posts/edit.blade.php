@extends('adminlte::page')

@section('title', 'Noticias - Zamora')

@section('content_header')
    <h3>Editar Noticia {{ $tag->name }}</h3>
@stop

@section('content')
    <form action="{{ route('tags.update', $tag) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $tag->name }}">
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