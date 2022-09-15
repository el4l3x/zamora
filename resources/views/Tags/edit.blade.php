@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar etiqueta {{ $tag->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
