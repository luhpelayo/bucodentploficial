@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="well" style="text-align:center; color: red; font-weight: bolder;">CONSULTAR DATOS DE PRACTICAS INDUSTRIALES
    </h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form action="{{ route('practice.query') }}" method="POST" target="_blank">
                @csrf
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label class="col-lg-3 control-label">Registro</label>
                            <select class="js-example-basic-single" id="student_id" name="student_id"
                                style="width: 100%;">
                                <option value="">Seleccionar Registro</option>
                                @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->student_register }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="col-lg-3 control-label">Materia:</label>
                                <select class="js-example-basic-single" id="matter_id" name="matter_id" style="width: 100%;">
                                    <option value="">Seleccionar Materia</option>
                                    @foreach($matters as $matter)
                                    <option value="{{ $matter->id }}" >{{ $matter->matter_initial }}--{{ $matter->matter_name }}--{{ $matter->matter_group }}</option>
                                    @endforeach
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
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Fecha Inicial de Practica</label>
                            <input id="date_min" name="date_min" type="date" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Fecha Final de Practica</label>
                            <input id="date_max" name="date_max" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Observación</label>
                            <input id="practice_description" name="practice_description" type="text"
                                placeholder="ingrese alguna observacion para buscar" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="col-lg-3 control-label">Empresa</label>
                                <select class="js-example-basic-single" id="company_id" name="company_id" style="width: 100%;">
                                    <option value="">Seleccionar Empresa</option>
                                    @foreach($companies as $company)
                                    <option value="{{ $company->id }}" >{{ $company->company_name }}</option>
                                    @endforeach
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
                Nota: La busqueda es más exacta si especifica de forma clara los datos a filtrar, para realizar busqueda por intervalos debe rellenar campo inicial y final.
            </span>
        </div>
    </div>
</div>
<br>
<br>
@endsection