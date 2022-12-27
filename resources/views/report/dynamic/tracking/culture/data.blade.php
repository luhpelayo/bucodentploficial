@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="well" style="text-align:center; color: red; font-weight: bolder;">CONSULTAR DATOS DE SEGUIMIENTOS CULTURALES
    </h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form action="{{ route('cult.query') }}" method="POST" target="_blank">
                @csrf
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Registro</label>
                            <select class="js-example-basic-single" id="student_id" name="student_id"
                                style="width: 100%;">
                                <option value="">Seleccionar Registro</option>
                                @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->student_register }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Nivel de Actividad</label>
                            <select class="js-example-basic-single" id="culture_level" name="culture_level"
                                style="width: 100%;">
                                <option value="">Seleccionar Nivel</option>
                                <option value="Básico">Básico</option>
                                <option value="Intermedio">Intermedio</option>
                                <option value="Avanzado">Avanzado</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Nombre de Estudiante</label>
                            <input id="student_name" name="student_name" type="text" placeholder="ingrese el nombre a buscar"
                                class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Apellido de Estudiante</label>
                            <input id="student_lastname" name="student_lastname" type="text" placeholder="ingrese el apellido a buscar"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nombre de Actividad</label>
                        <input id="culture_name" name="culture_name" type="text"
                            placeholder="ingrese el nombre de la actividad a buscar" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-lg btn-success">Buscar Datos</button>
                    <a href="{{ route('dynatracking.index') }}">
                        <input value="Cancelar" class="btn btn-lg btn-danger">
                    </a>
                </div>
            </form>
        </div>
        <br>
        <div style="text-align: center">
            <span style="color: red">
                Nota: La busqueda es más exacta si especifica de forma clara los datos a filtrar, para realizar busqueda por intervalos debe rellenar campo inicial y final.
            </span>
        </div>
    </div>
</div>
<br>
<br>
@endsection