@extends('adminlte::page')

@section('title', 'Noticias - Zamora')

@section('content_header')
<div class="row">
    <div class="col-9">
        <h3>Lista de Categorias</h3>
    </div>

    <div class="col-3">
        <a href="{{ route('categorias.create') }}" class="btn btn-secondary btn-sm">Nueva Categoria</a>
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
        @foreach ($categories as $category)
           <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td width="10px">
                    <a href="{{ route('categorias.edit', $category) }}" class="btn btn-primary btn-sm">Editar</a>
                </td>
                <td width="10px">
                    <form action="{{ route('categorias.destroy', $category) }}" method="POST">
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
