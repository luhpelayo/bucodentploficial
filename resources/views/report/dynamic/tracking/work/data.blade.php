@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="well" style="text-align:center; color: red; font-weight: bolder;">CONSULTAR DATOS DE SEGUIMIENTOS LABORALES
    </h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form action="{{ route('work.query') }}" method="POST" target="_blank">
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
                            <label>Nombre de Empresa</label>
                            <input id="work_company" name="work_company" type="text" placeholder="ingrese el nombre de la empresa a buscar"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label >Estado del Trabajo</label>
                            <select class="js-example-basic-single" id="work_status" name="work_status"
                                style="width: 100%;">
                                <option value="">Seleccionar Estado</option>
                                <option value="Vigente">Vigente</option>
                                <option value="No Vigente">No Vigente</option>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Cargo en Empresa</label>
                            <input id="work_role" name="work_role" type="text" placeholder="ingrese el nombre del cargo a buscar"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Nombre de Titulado</label>
                            <input id="student_name" name="student_name" type="text" placeholder="ingrese el nombre a buscar"
                                class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Apellido de Titulado</label>
                            <input id="student_lastname" name="student_lastname" type="text" placeholder="ingrese el apellido a buscar"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Funciones del Cargo</label>
                            <input id="work_activities" name="work_activities" type="text" placeholder="ingrese alguna funcion a buscar"
                                class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Referencia de Empresa</label>
                            <input id="work_references" name="work_references" type="text" placeholder="ingrese alguna referencia a buscar"
                                class="form-control">
                        </div>
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