@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR ESTUDIANTE</h1>
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
            <h3>Información Personal del Estudiante</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('student.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombres:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="student_name" id="student_name" type="text" placeholder="ejemplo Nells Antonio">
                        @error('student_name')
                        <small class="text-danger">¡Introduzca su Nombre!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Apellidos:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="student_lastname" id="student_lastname" type="text" placeholder="ejemplo Vidal Vargas">
                            @error('student_lastname')
                        <small class="text-danger">¡Introduzca su Apellido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Registro:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="student_register" id="student_register" type="number" placeholder="ejemplo 216166922">
                            @error('student_register')
                        <small class="text-danger">¡Registro Vacio, Mal Escrito o Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nro de Carnet:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="student_ci" id="student_ci" type="number" placeholder="ejemplo 9752718">
                            @error('student_ci')
                        <small class="text-danger">¡Nro de CI Vacio o Mal Escrito!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Lugar de Expedición:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="student_exp" name="student_exp" style="width: 100%;" required> 
                            <option value="">Seleccionar Lugar</option>
                            <option value="BE">Beni</option>
                            <option value="CB">Cochabamba</option>
                            <option value="CH">Chuquisaca</option>
                            <option value="LP">La Paz</option>
                            <option value="OR">Oruro</option>
                            <option value="PD">Pando</option>
                            <option value="PT">Potosi</option>
                            <option value="SC">Santa Cruz</option>
                            <option value="TJ">Tarija</option>
                          </select>
                          @error('student_exp')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nro de Celular:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="student_number" id="student_number" type="number" placeholder="ejemplo 71308634">
                            @error('student_number')
                        <small class="text-danger">¡Nro de Celular Vacio o Mal Escrito!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Imagen:</label>
                    <input type="file" name="student_image" id="student_image" accept="image/*">
                    @error('student_image')
                        <small class="text-danger">Formato Incorrecto!, Intente de Nuevo</small>
                    @enderror
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: La imagen no debe ser muy grande (mejor tamaño selfie), esto para evitar espacio innecesario en el Servidor.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Registrar Estudiante" class="btn btn-success">
                <a href="{{ route('std.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection