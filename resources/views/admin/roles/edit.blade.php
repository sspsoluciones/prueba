@extends('layouts.back')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top:30px">
                <div class="card-header" style="background-color:#3C8DBC; color:#fff">Editar Role</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('roles.update', $role->id) }}">
                        @csrf

                        <!-- La siguiente linea es para enviar los datos por el metodo PUT-->
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $role->nombre }}" autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
                                </button>

                                <button type="reset" class="btn btn-success">
                                    Limpiar
                                </button>


                                <a href="{{ route('roles.index') }}" style="float:right;">
                                  <i class="fa fa fa-reply fa-2x" title="Volver"></i>
                                </a>
                            </div>
                        </div>
                    </form>

                    <form method="post" action="{{ route('roles.destroy', $role->id) }}" style="margin-top:15px;">

                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    Eliminar Role
                                </button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
      




    
@endsection

