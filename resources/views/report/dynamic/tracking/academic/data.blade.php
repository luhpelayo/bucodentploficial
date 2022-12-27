@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="well" style="text-align:center; color: red; font-weight: bolder;">CONSULTAR DATOS DE SEGUIMIENTOS ACADEMICOS
    </h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form action="{{ route('acad.query') }}" method="POST" target="_blank">
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
                            <label>Nombre de Especialidad</label>
                            <input id="academic_name" name="academic_name" type="text" placeholder="ingrese el nombre de la especialidad a buscar"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label >Tipo de Especialidad</label>
                            <select class="js-example-basic-single" id="academic_type" name="academic_type"
                                style="width: 100%;">
                                <option value="">Seleccionar Especialidad</option>
                                <option value="Diplomado">Diplomado</option>
                                <option value="Maestria">Maestria</option>
                                <option value="Doctorado">Doctorado</option>
                                <option value="Idioma">Idioma</option>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Estado de Especialidad</label>
                            <select class="js-example-basic-single" id="academic_status" name="academic_status"
                                style="width: 100%;">
                                <option value="">Seleccionar Estado</option>
                                <option value="En Proceso">En Proceso</option>
                                <option value="Finalizado">Finalizado</option>
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
                        <label>Nombre de Institución</label>
                        <input id="academic_institute" name="academic_institute" type="text"
                            placeholder="ingrese el nombre del instituto a buscar" class="form-control">
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