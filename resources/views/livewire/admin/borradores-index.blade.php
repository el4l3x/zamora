<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" type="text" class="form-control" placeholder="Buscar...">
        </div>
        
        @if ($posts->count())
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead class="table-light">
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td colspan="2"></td>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach ($posts as $post)
                       <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->name }}</td>
                            <td width="10px">
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
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
        </div>

        <div class="card-footer">
             {{ $posts->links() }}
        </div>
        @else
        <div class="card-body">
            <strong>No existe ninguna coincidencia.</strong>
        </div>
        @endif
    </div>
</div>
