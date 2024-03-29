@extends('adminlte::page')

@section('title', 'Noticias - Zamora')

@section('content_header')
<h3>Nuevo Usuario</h3>
@stop

@section('content')
<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control">
        @error('nombre')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group mb-3">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" class="form-control">
        @error('usuario')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group mb-3">
        <label for="clave">Clave</label>
        <input type="text" name="clave" id="clave" class="form-control">
        @error('clave')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group mb-3">
        <label for="clave_confirmation">Confirmar Clave</label>
        <input type="text" name="clave_confirmation" id="clave_confirmation" class="form-control">
        @error('clave_confirmation')
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
        @error('roles')
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