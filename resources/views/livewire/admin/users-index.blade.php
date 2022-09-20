<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" type="text" class="form-control" placeholder="Buscar...">
        </div>
        
        @if ($users->count())
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead class="table-light">
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Usuario</td>
                        <td colspan="2"></td>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach ($users as $user)
                       <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td width="10px">
                                <a href="{{ route('usuarios.edit', $user) }}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('usuarios.destroy', $user) }}" method="POST">
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
             {{ $users->links() }}
        </div>
        @else
        <div class="card-body">
            <strong>No existe ninguna coincidencia.</strong>
        </div>
        @endif
    </div>
</div>
