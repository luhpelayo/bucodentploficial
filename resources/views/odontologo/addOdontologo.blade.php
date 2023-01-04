@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR ODONTOLOGO</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="{{ asset('/images/industrial.png') }}" alt="LOGO">
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3>Información Personal del Odontologo</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('odontologo.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombres:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="nombre" id="nombre" type="text" placeholder="ejemplo Nells Antonio">
                        @error('nombre')
                        <small class="text-danger">¡Introduzca su Nombre!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Apellidos:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="apellido" id="apellido" type="text" placeholder="ejemplo Vidal Vargas">
                            @error('apellido')
                        <small class="text-danger">¡Introduzca su Apellido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Ci:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="ci" id="ci" type="text" placeholder="ejemplo 8182104sc">
                            @error('ci')
                        <small class="text-danger">¡Ci Vacio, Mal Escrito o Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de nacimiento:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="fechanacimiento" id="fechanacimiento" type="Date" placeholder="ejemplo 9752718">
                            @error('fechanacimiento')
                        <small class="text-danger">¡Nro de CI Vacio o Mal Escrito!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Direccion:</label>
                    <div class="col-lg-8">
                    <input class="form-control" name="direccion" id="direccion" type="text" placeholder="ejemplo 9752718">
                          @error('direccion')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Telefono:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="telefono" id="telefono" type="number" placeholder="ejemplo 71308634">
                            @error('telefono')
                        <small class="text-danger">¡Nro de Celular Vacio o Mal Escrito!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="email" id="email" type="email" placeholder="ejemplo 71308634">
                            @error('email')
                        <small class="text-danger">¡Email Vacio o Mal Escrito!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Especialidad:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="especialidad" id="especialidad" type="text" placeholder="ejemplo 71308634">
                            @error('especialidad')
                        <small class="text-danger">¡Especialidad Vacio o Mal Escrito!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Ruc:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="ruc" id="ruc" type="number" placeholder="ejemplo 71308634">
                            @error('ruc')
                        <small class="text-danger">¡Ruc Vacio o Mal Escrito!</small>
                        @enderror
                    </div>
                </div>
                
                <hr>
                <input type="submit" value="Registrar Odontologo" class="btn btn-success">
                <a href="{{ route('odontologo.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection