@extends('adminlte::page')

@section('title', 'Noticias - Zamora')

@section('content_header')
<div class="row">
    <div class="col-9">
        <h3>Lista de Etiquetas</h3>
    </div>

    <div class="col-3">
        <a href="{{ route('tags.create') }}" class="btn btn-secondary btn-sm">Nueva Etiqueta</a>
    </div>
</div>
@stop

@section('content')
<table class="table table-hover table-striped">
    <thead class="table-light">
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td colspan="2"></td>
        </tr>
    </thead>

    <tbody>
        @foreach ($tags as $tag)
           <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td width="10px">
                    <a href="{{ route('tags.edit', $tag) }}" class="btn btn-primary btn-sm">Editar</a>
                </td>
                <td width="10px">
                    <form action="{{ route('tags.destroy', $tag) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr> 
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    
@stop

@section('js')
    
@stop