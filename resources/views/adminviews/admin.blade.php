@extends('layouts.dashboardresourse')
@section('user')
Administrador
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Gestión de Usuarios</h3>
            </div>
            
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            
            <div class="panel-body">
                {{ $userslist->links() }}
                <div class="table-responsive">
                    <table class="table table-striped ">
                        <thead>
                          <tr>
                            <th>Identificación</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo electronico</th>
                            <th>Fecha de nacimiento</th>
                            <th>Genero</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($userslist)) 
                                @foreach ($userslist as $singleuser)  
                                    <tr>
                                        <td>{{$singleuser->identification}}</td>
                                        <td>{{$singleuser->name}}</td>
                                        <td>{{$singleuser->lastname}}</td>
                                        <td>{{$singleuser->email}}</td>                                        
                                        <td>{{$singleuser->birthdate}}</td>
                                        <td>{{$singleuser->gender}}</td>
                                        <td>
                                            <form  action="{{action('AdminController@admin_destroy_user', $singleuser->id)}}" method="post">
                                                 {{csrf_field()}}
                                                 <input name="_method" type="hidden" value="DELETE">
                                                 <button class="btn btn-danger btn-xs" type="submit">Eliminar Usuario</button>
                                            </form>
                                            <a class="btn btn-primary btn-xs" href="{{action('AdminController@admin_edit_user' , $singleuser->id)}}" >Editar Usuario</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                <td colspan="8">No hay registro !!</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                    {{ $userslist->links() }}
                </div>
            </div>
            <div class="col-md card">
              <div class="card-body"><h4 class="card-title">Agregar Usuario</h4>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Resgistrar usuario') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="{{action('AdminController@admin_create_user')}}" aria-label="{{ __('Register') }}" name="createuser">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                                            <div class="col-md-6">
                                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required >

                                                @if ($errors->has('lastname'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('lastname') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Genero') }}</label>

                                            <div class="col-md-6">
                                                <select id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" required >
                                                    <option value="Hombre">Hombre</option>
                                                    <option value="Mujer">Mujer</option>
                                                </select>

                                                @if ($errors->has('gender'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('gender') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de nacimiento') }}</label>

                                            <div class="col-md-6">
                                                <input id="birthdate" type="date" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ old('birthdate') }}" required >

                                                @if ($errors->has('birthdate'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Identificación') }}</label>

                                            <div class="col-md-6">
                                                <input id="identification" type="text" class="form-control{{ $errors->has('identification') ? ' is-invalid' : '' }}" name="identification" value="{{ old('identification') }}" required >

                                                @if ($errors->has('identification'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('identification') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electronico') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <input type="button" class="btn btn-primary" value="{{ __('Registrar usuario') }}" onClick="comprobardatosUsuario()">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                       
              </div>
            </div>
            
        </div>
    </div>
</div>

@endsection