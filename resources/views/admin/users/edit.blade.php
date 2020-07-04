@extends('layouts.back')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top:30px">
                <div class="card-header" style="background-color:#3C8DBC; color:#fff">Editar Usuario</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $usuario->id) }}">
                        @csrf

                        <!-- La siguiente linea es para enviar los datos por el metodo PUT-->
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$usuario->name}}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Telefono</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{$usuario->telefono}}" autocomplete="name" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$usuario->email}}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            
                            <label class="col-md-4 col-form-label text-md-right" for="role_id">Options</label>
                            
                            <div class="col-md-6">
                            <select class="form-control" id="role_id" name="role_id">
                                <option selected value="{{ $usuario->role->id }}">{{$usuario->role->nombre}}</option>

                                @if(count($roles))
                                    @foreach($roles as $role)
                                        @if($role->nombre != $usuario->role->nombre)
                                            <option value="{{ $role->id }}">{{ $role->nombre }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    {{"No hay roles Registrados"}}
                                @endif
                            </select>
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


                                <a href="{{ route('users.index') }}" style="float:right;">
                                  <i class="fa fa fa-reply fa-2x" title="Volver"></i>
                                </a>
                            </div>
                        </div>
                    </form>

                    <form method="post" action="{{ route('users.destroy', $usuario->id) }}" style="margin-top:15px;">

                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    Eliminar Usuario
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

