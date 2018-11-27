@extends('layouts.dashboardresourse')
@section('user')
Administrador
@endsection
@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
	<strong>Error!</strong> Revise los campos obligatorios.<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="color: black">Editar Contacto</h4>
      </div>
    <div class="modal-body">
      
      <form action="{{action('HomeController@user_update_contact', $singlecon->id)}}" method="post" role="form" name="createcontact">
        {{ csrf_field() }}
        <div class="form-group">
          <label >Nombre </label>
          <input type="text" class="form-control"  name="c_name" value="{{$singlecon->c_name}}" placeholder="Nombre" required>
        </div>
        <div class="form-group">
          <label >Apellido </label>
          <input type="text" class="form-control" name="c_lastname" value="{{$singlecon->c_lastname}}" placeholder="Apellido" required>
        </div>
        <div class="form-group">
          <label >Numero de contacto </label>
          <input type="text" class="form-control" id="c_cont_number" name="c_cont_number"  value="{{$singlecon->c_cont_number}}" placeholder="Numero de contacto" required>
        </div>
        <div class="form-group">
          <label >Tipo de numero</label>
          <select id="c_kindof" type="text" class="form-control{{ $errors->has('c_kindof') ? ' is-invalid' : '' }}" name="c_kindof"  value="{{$singlecon->c_kindof}}" required >
            <option value="0">Fijo</option>
            <option value="1">Movil</option>
          </select>
        </div>

        <div class="form-group">
          <label >Parentesco</label>
          <select id="c_relationship" type="text" class="form-control{{ $errors->has('c_relationship') ? ' is-invalid' : '' }}" name="c_relationship" value="{{$singlecon->c_relationship}}" required >
            <option value="Amigo">Amigo</option>
            <option value="Familiar">Familiar</option>
            <option value="Compañero">Compañero de Trabajo</option>
          </select>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <input type="button" class="btn btn-primary" value="{{ __('Terminar edición de  usuario') }}" onClick="comprobardatosContacto()">
            </div>
        </div>
      </form>

    </div>
  </div>
  </div>
@endsection