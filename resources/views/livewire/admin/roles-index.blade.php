<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" type="text" class="form-control" placeholder="Buscar...">
        </div>
        
        @if ($roles->count())
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
                    @foreach ($roles as $rol)
                       <tr>
                            <td>{{ $rol->id }}</td>
                            <td>{{ $rol->name }}</td>
                            <td width="10px">
                                @can('roles.edit')
                                    <a href="{{ route('roles.edit', $rol) }}" class="btn btn-primary btn-sm">Editar</a>                                    
                                @endcan
                            </td>
                            <td width="10px">
                                @can('roles.destroy')
                                    <form action="{{ route('roles.destroy', $rol) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            Eliminar
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
             {{ $roles->links() }}
        </div>
        @else
        <div class="card-body">
            <strong>No existe ninguna coincidencia.</strong>
        </div>
        @endif
    </div>
</div>
