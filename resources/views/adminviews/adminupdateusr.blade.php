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
        <h4 class="modal-title" style="color: black">Editar Usuario</h4>
      </div>
    <div class="modal-body">
      
      <form action="{{action('AdminController@admin_update_user' , $singleuser->id)}}" method="post" role="form">
        {{ csrf_field() }}
        <div class="form-group">
          <label >Nombre </label>
          <input type="text" class="form-control"  name="name" value="{{$singleuser->name}}" placeholder="Nombre" required>
        </div>
        <div class="form-group">
          <label >Apellido </label>
          <input type="text" class="form-control" name="lastname" value="{{$singleuser->lastname}}" placeholder="Apellido" required>
        </div>
        <div class="form-group">
          <label >Fecha de nacimiento</label>
          <input type="date" class="form-control" name="birthdate"  value="{{$singleuser->birthdate}}" placeholder="Fecha de nacimiento" required>
        </div>
        <div class="form-group">
          <label >Genero</label>
          <select id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" required >
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
          </select>
        </div>
        
        <button type="submit" class="btn btn-primary" >Terminar edición de  usuario</button>
      </form>

    </div>
  </div>
  </div>
@endsection