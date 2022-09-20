@extends('adminlte::page')

@section('title', 'Noticias - Zamora')

@section('content_header')
<h3>Nuevo Rol</h3>
@stop

@section('content')
<form action="{{ route('roles.store') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control">
        @error('nombre')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <h2 class="h3">Lista de Permisos</h2>

    @foreach ($permissions as $permission)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="permiso{{$permission->id}}" value="{{ $permission->id }}" name="permisos[]">
            <label class="form-check-label" for="permiso{{$permission->id}}">{{ $permission->description }}</label>
        </div>
    @endforeach
    
    <button type="submit" class="btn btn-primary">Enviar</button>

</form>

@stop

@section('css')
    
@stop

@section('js')
    
@stop