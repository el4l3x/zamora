@extends('adminlte::page')

@section('title', 'Alcaldia Zamora')

@section('content_header')
<h3>Editar Noticia {{ $post->name }}</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $post->name }}">
                    @error('nombre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria" class="form-control">
                        @foreach ($categories as $category)
                            @if ($category->id == $post->category_id)                            
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>                                
                            @endif
                        @endforeach
                    </select>
                    @error('categoria')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <p class="font-weight-bold">Etiquetas</p>
                    @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="tag{{$tag->id}}" value="{{ $tag->id }}" name="tags[]">
                            <label class="form-check-label" for="tag{{$tag->id}}">{{ $tag->name }}</label>
                        </div>
                    @endforeach
                    @error('tags')
                        <br>
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="borrador" name="status" class="custom-control-input" checked value="1">
                        <label class="custom-control-label" for="borrador">Borrador</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="publicado" name="status" class="custom-control-input" value="2">
                        <label class="custom-control-label" for="publicado">Publicado</label>
                    </div>
                    @error('status')
                        <br>
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="row">
                    <div class="col">
                        <div class="image-wrapper">
                            <img src="{{ asset('storage/'.$post->image->url) }}" alt="" id="picture">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="imagen">Imagen de la Noticia</label>
                            <input type="file" name="imagen" id="imagen" class="form-control-file" accept="image/*">
                        </div>

                        @error('imagen')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="resumen">Resumen</label>
                    <textarea name="resumen" id="resumen" class="form-control">{!!$post->extract!!}</textarea>
                    @error('resumen')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="cuerpo">Cuerpo de la Noticia</label>
                    <textarea name="cuerpo" id="cuerpo" class="form-control">{!!$post->body!!}</textarea>
                    @error('cuerpo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Enviar</button>
            
            </form>
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#resumen' ) )
            .catch( error => {
                console.log();( error );
            } );
            
        ClassicEditor
        .create( document.querySelector( '#cuerpo' ) )
        .catch( error => {
            console.log( error );
        } );

        document.getElementById("imagen").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
@stop