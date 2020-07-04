@extends('layouts.back')

@section('content')

<?php
if (empty($_GET['nombreRole'])) {
  $nombreRole = "--Seleccionar Role--";
  $role_id = "";

  $nombreFirma = "--Seleccionar Firma--";
  $firma_id = "";
}else{

  if ($_GET['nombreRole']==""){
    $nombreRole = "--Seleccionar Role--";
    $role_id = "";
  }else{
    $nombreRole = $_GET['nombreRole'];
    $role_id = $_GET['role_id'];
  }
  

  if ($_GET['nombreFirma']==""){
    $nombreFirma = "--Seleccionar Firma--";
    $firma_id = "";
  }else{
    $nombreFirma = $_GET['nombreFirma'];
    $firma_id = $_GET['firma_id'];
  }

}

?>
        <div class="row" style="margin-top:30px">
          <div class="col-12">
            <div style="float:right;">
            <form class="form-inline ml-3">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Nombre" name="name" style="margin-left:5px;" value="{{ request('name')}}">

                <input class="form-control form-control-navbar" type="search" placeholder="Email" name="email" style="margin-left:5px;" value="{{ request('email')}}">

                <select class="form-control" id="role_id" name="role_id" style="margin-left:5px;" onchange="aplicarRole()">
                      <option value="{{$role_id}}">{{$nombreRole}}</option>          
                    @if(count($roles))
                      @foreach($roles as $role)
                          @if($nombreRole != $role->nombre)
                          <option value="{{ $role->id }}">{{ $role->nombre }}</option>
                          @endif
                      @endforeach
                    @else
                      {{"No hay roles Registrados"}}
                    @endif
                </select>

                <input type="hidden" id="nombreRole" name="nombreRole" value="{{ request('nombreRole')}}">

                <script type="text/javascript">
                  function aplicarRole(){
                    var aplicaRole = $('select[name="role_id"] option:selected').text();
                    $('#nombreRole').val(aplicaRole);
                  }
                </script>



                <input type="hidden" id="nombreFirma" name="nombreFirma" value="{{ request('nombreFirma')}}">

                <script type="text/javascript">
                  function aplicarFirma(){
                    var aplicaFirma = $('select[name="firma_id"] option:selected').text();
                    $('#nombreFirma').val(aplicaFirma);
                  }
                </script>



                <div class="input-group-append" style="margin-left:5px;">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card" style="margin-top:10px">

              @if(Session::has('usuario_creado'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session('usuario_creado')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif

              @if(Session::has('usuario_actualizado'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session('usuario_actualizado')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif

              @if(Session::has('usuario_borrado'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{session('usuario_borrado')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif


              <div class="card-header">
                <h3 class="card-title">Usuarios Registrados en el Sistema</h3>
                <div style="float:right;">
                  <a href="{{ route('users.create') }}">
                    <i class="fa fa fa-plus fa-2x" style="margin-left:15px" title="Agregar"></i>
                  </a> 
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Firma Asignada</th>
                    <th>Telefono</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if(count($usuarios))
                      @foreach($usuarios as $usuario)
                        <tr>
                          <th>
                            <a href="{{route('users.edit', $usuario->id)}}">
                              {{$usuario->name}}
                            </a>
                          </th>
                          <th>{{$usuario->email}}</th>
                          <th>{{$usuario->role->nombre}}</th>
                          <th>{{$usuario->firma->nombre}}</th>
                          <th>{{$usuario->telefono}}</th>
                          <th>{{$usuario->created_at->format('d-m-yy, h:i:s A')}}</th>
                          <th>{{$usuario->updated_at}}</th>
                        </tr>
                      @endforeach
                    @else
                      {{"No hay Usuarios Registrados"}}

                    @endif

                  
                  
                  
                  </tbody>

                  <tfoot>
                  <tr>
                    <th colspan="6">{{ $usuarios->links() }}</th>
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

