@extends('layouts.dashboardresourse')
@section('user')
Usuario 
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Gestión de Contactos</h3>
            </div>
            
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            
            <div class="panel-body">
                {{ $uscontacts->links() }}
                <div class="table-responsive">
                    <table class="table table-striped ">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Numero de contacto</th>
                            <th>Tipo de numero</th>
                            <th>Parentesco</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($uscontacts)) 
                                @foreach ($uscontacts as $siglcont)  
                                    <tr>
                                        <td>{{$siglcont->c_name}}</td>
                                        <td>{{$siglcont->c_lastname}}</td>
                                        <td>{{$siglcont->c_cont_number}}</td>
                                        @if ($siglcont->c_kindof == 0) 
                                        <td>Fijo</td>
                                        @else
                                        <td>Movil</td>  
                                        @endif                                
                                        <td>{{$siglcont->c_relationship}}</td>
                                        <td>
                                            <form  action="{{action('HomeController@user_destroy_contact', $siglcont->id)}}" method="post">
                                                 {{csrf_field()}}
                                                 <input name="_method" type="hidden" value="DELETE">
                                                 <button class="btn btn-danger btn-xs" type="submit">Eliminar Contacto</button>
                                            </form>
                                            <a class="btn btn-primary btn-xs" href="{{action('HomeController@user_edit_contact' , $siglcont->id)}}" >Editar Contacto</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                <td colspan="8">No Tienes contactos !!</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                    {{ $uscontacts->links() }}
                </div>
            </div>

            <div class="col-md card">
              <div class="card-body"><h4 class="card-title">Agregar Contacto</h4>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Resgistrar contacto nuevo') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="{{action('HomeController@user_create_contact')}}" aria-label="{{ __('Register') }}" name="createcontact">
                                        @csrf
                                        <div class="form-group">
                                          <label >Nombre </label>
                                          <input type="text" class="form-control"  name="c_name" placeholder="Nombre" required>
                                        </div>
                                        <div class="form-group">
                                          <label >Apellido </label>
                                          <input type="text" class="form-control" name="c_lastname" placeholder="Apellido" required>
                                        </div>
                                        <div class="form-group">
                                          <label >Numero de contacto </label>
                                          <input type="text" id="c_cont_number" class="form-control" name="c_cont_number"   placeholder="Numero de contacto" required>
                                        </div>
                                        <div class="form-group">
                                          <label >Tipo de numero</label>
                                          <select id="c_kindof" type="text" class="form-control{{ $errors->has('c_kindof') ? ' is-invalid' : '' }}" name="c_kindof"   required >
                                            <option value="0">Fijo</option>
                                            <option value="1">Movil</option>
                                          </select>
                                        </div>

                                        <div class="form-group">
                                          <label >Parentesco</label>
                                          <select id="c_relationship" type="text" class="form-control{{ $errors->has('c_relationship') ? ' is-invalid' : '' }}" name="c_relationship"  required >
                                            <option value="Amigo">Amigo</option>
                                            <option value="Familiar">Familiar</option>
                                            <option value="Compañero">Compañero de Trabajo</option>
                                          </select>
                                        </div>

                                        
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <input type="button" class="btn btn-primary" value="{{ __('Agregar Contacto') }}" onClick="comprobardatosContacto()">
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
