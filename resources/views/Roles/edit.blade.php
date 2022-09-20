@extends('adminlte::page')

@section('title', 'Noticias - Zamora')

@section('content_header')
    <h3>Editar Rol {{ $rol->name }}</h3>
@stop

@section('content')
<form action="{{ route('roles.update', $rol) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $rol->name }}">
        @error('nombre')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group mb-3">
        <p class="font-weith-bold">Permisos</p>
        @foreach ($permissions as $permission)
            @if ($rol->hasPermissionTo($permission->id))
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permission{{$permission->id}}" value="{{ $permission->id }}" name="permisos[]" checked>
                    <label class="form-check-label" for="permission{{$permission->id}}">{{ $permission->description }}</label>
                </div>
            @else
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permission{{$permission->id}}" value="{{ $permission->id }}" name="permisos[]">
                    <label class="form-check-label" for="permission{{$permission->id}}">{{ $permission->description }}</label>
                </div>                
            @endif
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