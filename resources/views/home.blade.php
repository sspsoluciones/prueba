@extends('layouts.front')

@section('content')

        <div class="row" style="margin-top:30px">
          <div class="col-12">
            <div style="float:right;">
            <form class="form-inline ml-3">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Nombre de empresa" name="nombre" style="margin-left:5px;" value="{{ request('nombre')}}">

                <input class="form-control form-control-navbar" type="search" placeholder="RIF de la empresa" name="rif" style="margin-left:5px;" value="{{ request('rif')}}">

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


                @if(Session::has('empresa_creada'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{session('empresa_creada')}}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif

                  @if(Session::has('empresa_actualizada'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{session('empresa_actualizada')}}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif

                  @if(Session::has('empresa_eliminada'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>{{session('empresa_eliminada')}}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif





        <!-- Info boxes -->
        <div class="row">

          @if(count($empresas))
            @foreach($empresas as $empresa)

              <div class="col-lg-3 col-6" style="margin-top:30px">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">

                  <div style="width:100%; text-align:center;">
                    <h4>{{$empresa->nombre}}</h4>
                    <h5>{{$empresa->rif}}</h5>
                  </div>

                  </div>
                  <img style="height:150px; width:150px; background-color:#EFEFEF; margin-bottom:10px" class="card-img_top rounded-circle mx-auto d-block" src="imagenes/empresas/{{$empresa->logo}}" alt="">

                  @if (((auth()->user()->role_id)==2)or(auth()->user()->role_id)==5)
                    <a href="{{ route('empresas.edit', $empresa->id) }}" class="small-box-footer">Editar Empresa <i class="fas fa-edit"></i></a>
                  @endif

                  <a href="{{ route('facturas.show', $empresa->id) }}" class="small-box-footer">Agregar Facturas <i class="fas fa-plus"></i></a>


                </div>
              </div>

            @endforeach
          @else

            <div class="alert alert-danger" role="alert" style="width:100%; text-align:center; margin-top:20px;">
                {{"Sin Empresas registradas"}}
            </div>
            
          @endif


        </div>
        <!-- /.row -->


        
@endsection

