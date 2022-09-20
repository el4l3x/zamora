@extends('adminlte::page')

@section('title', 'Noticias - Zamora')

@section('content_header')
    <h3>Editar Usuario {{ $usuario->name }}</h3>
@stop

@section('content')
<form action="{{ route('usuarios.update', $usuario) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $usuario->name }}">
        @error('nombre')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group mb-3">
        <p class="font-weith-bold">Roles</p>
        @foreach ($roles as $rol)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="rol{{$rol->id}}" value="{{ $rol->id }}" name="roles[]">
                <label class="form-check-label" for="rol{{$rol->id}}">{{ $rol->name }}</label>
            </div>
        @endforeach
        @error('tags')
            <br>
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar</button>

</form>
@stop

@section('css')
    
@stop

@section('js')
    
@stop