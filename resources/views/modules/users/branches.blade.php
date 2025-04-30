@extends('welcome')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Inicio</h1>
        </section>

        <section class="content">
            <div class="box"> 
                <div class="box-header with-border">
                    <button class="btn btn-primary" data-toggle="modal" 
                    data-target="#modalAgregarSucursal">Nueva Sucursal</button>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped dt-responsive table-hover">
                        <thead>
                            <tr>                                
                                <th>ID</th>
                                <th>Sucursal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branches as $branch)
                            @if($branch->state == 1)
                                <tr>
                                    <td>{{ $branch->id }}</td>
                                    <td>{{ $branch->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditarSucursal" 
                                            data-toggle="modal" data-target="#modalEditarSucursal" idSucursal="{{ $branch->id }}">
                                                <i class="fa fa-pencil"></i></button>
                                            <a href="{{ route('branches.chageState', ['state' => 0, 'id_branch'=>$branch->id]) }}">
                                                <button class="btn btn-danger"><i class="fa fa-times"></i>Deshabilitar</button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalAgregarSucursal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="POST">
                            @csrf
                            <div class="modal-header" style="background: #3c8dbc; color: #fff">                                
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Agregar Sucursal</h4>                                
                            </div>
                    
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                            <input type="text" class="form-control" name="name" 
                                            placeholder="Ingrese el nombre de la sucursal" required>
                                        </div>                                    
                                    </div>
                                </div>                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar Sucursal</button>
                            </div>
                        </form>    
                        
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalEditarSucursal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('branches.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header" style="background: #ffc107; color: black">                                
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Editar Sucursal</h4>                                
                            </div>
                    
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                            <input type="text" class="form-control" name="name" 
                                            id="nombreEditar" required>
                                            <input type="hidden" class="form-control" name="id" 
                                            id="idEditar" required>
                                        </div>                                    
                                    </div>
                                </div>                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Actualizar Sucursal</button>
                            </div>
                        </form>    
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection