@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="well" style="text-align:center; color: red; font-weight: bolder;">CONSULTAR DATOS DE ESTUDIANTES</h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form action="{{ route('student.query') }}" method="POST" target="_blank">
                @csrf
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Nombre de Estudiante</label>
                            <input id="student_name" name="student_name" type="text"
                                placeholder="Ingrese los nombres a buscar" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Apellido de Estudiante</label>
                            <input id="student_lastname" name="student_lastname" type="text"
                                placeholder="Ingrese los apellidos a buscar" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Registro</label>
                            <input id="student_register" name="student_register" type="text"
                                placeholder="ingrese el registro a buscar" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Nro de CI o EXT</label>
                            <input id="student_ci" name="student_ci" type="text"
                                placeholder="ingrese en Nro de CI o EXT a buscar" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Nro de Celular</label>
                            <input id="student_number" name="student_number" type="text"
                                placeholder="Ingrese el numero a buscar" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="col-lg-3 control-label">Expedicion CI</label>
                            <select class="js-example-basic-single" id="student_exp" name="student_exp"
                                style="width: 100%;">
                                <option value="">Seleccionar Lugar</option>
                                <option value="BE">BE</option>
                                <option value="CB">CB</option>
                                <option value="CH">CH</option>
                                <option value="LP">LP</option>
                                <option value="OR">OR</option>
                                <option value="PD">PD</option>
                                <option value="PT">PT</option>
                                <option value="SC">SC</option>
                                <option value="TJ">TJ</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-success">Buscar Datos</button>
                    <a href="{{ route('dyna.index') }}">
                        <input value="Cancelar" class="btn btn-lg btn-danger">
                    </a>
                </div>
            </form>
        </div>
        <br>
        <div style="text-align: center">
            <span style="color: red">
                Nota: La busqueda es más exacta si especifica de forma clara los datos a filtrar.
            </span>
        </div>
    </div>
</div>
<br>
<br>
@endsection