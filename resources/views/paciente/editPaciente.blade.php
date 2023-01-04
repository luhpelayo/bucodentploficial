@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR PACIENTE</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                @if(!empty($paciente->student_image))
                <img src="{{ URL::asset('/images/'.$paciente->student_image)}}" style="width: 120%" class="avatar img-circle img-thumbnail"
                    alt="avatar">
                @else
                <img src="{{ URL::asset('icons/sinimagen.png')}}" style="width: 120%" class="avatar img-circle img-thumbnail" alt="avatar">
                <h4>Sin foto de Perfil</h4>
                @endif
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Editar Información Personal del Paciente</h3>
            <form enctype="multipart/form-data" class="form-horizontal"
                action="{{ route('paciente.update', $paciente->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombres:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="nombre" id="nombre" type="text"
                            value="{{ $paciente->nombre }}">
                        @error('nombre')
                        <small class="text-danger">¡Introduzca su Nombre!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Apellidos:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="apellido" id="apellido" type="text"
                            value="{{ $paciente->apellido }}">
                        @error('apellido')
                        <small class="text-danger">¡Introduzca su Apellido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Ci:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="ci" id="ci" type="text"
                            value="{{ $paciente->ci }}">
                        @error('ci')
                        <small class="text-danger">¡Registro Vacio, Mal Escrito o Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Nacimiento:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="fechanacimiento" id="fechanacimiento" type="text"
                            value="{{ $paciente->fechanacimiento }}">
                        @error('fechanacimiento')
                        <small class="text-danger">¡Nro de CI Vacio o Mal Escrito!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Direccion:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="direccion" id="direccion" type="text"
                            value="{{ $paciente->direccion }}">
                        @error('direccion')
                        <small class="text-danger">¡Nro de CI Vacio o Mal Escrito!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Telefono:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="telefono" id="telefono" type="number"
                            value="{{ $paciente->telefono }}">
                        @error('telefono')
                        <small class="text-danger">¡Nro de Celular Vacio o Mal Escrito!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="email" id="email" type="text"
                            value="{{ $paciente->email }}">
                        @error('email')
                        <small class="text-danger">¡Nro de Celular Vacio o Mal Escrito!</small>
                        @enderror
                    </div>
                </div>
                
                <hr>
                <input type="submit" value="Actualizar Paciente" class="btn btn-success">
                <a href="{{ route('paciente.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection