@extends('layouts.back')

@section('content')

              @if(Session::has('role_creado'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session('role_creado')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif

              @if(Session::has('role_actualizado'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session('role_actualizado')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif

              @if(Session::has('role_eliminado'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{session('role_eliminado')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif

        <div class="row">
          <div class="col-12">
            <div class="card" style="margin-top:30px">
              <div class="card-header">
                <h3 class="card-title">Usuarios Registrados en el Sistema</h3>
                <div style="float:right;">
                  <a href="{{ route('roles.create') }}">
                    <i class="fa fa fa-plus fa-2x" style="margin-left:15px" title="Agregar"></i>
                  </a> 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tipo de Role</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if(count($roles))
                      @foreach($roles as $role)
                        <tr>
                          <th>{{$role->id}}</th>
                          <th>
                            <a href="{{route('roles.edit', $role->id)}}">
                              {{$role->nombre}}
                            </a>
                          </th>
                        </tr>
                      @endforeach
                    @else
                      {{"No hay Roles Registrados"}}

                    @endif

                  
                  
                  
                  </tbody>

                  <tfoot>
                  <tr>
                    <th colspan="5">{{ $roles->links() }}</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      




    
@endsection

