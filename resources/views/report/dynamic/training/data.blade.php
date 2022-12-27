@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="well" style="text-align:center; color: red; font-weight: bolder;">CONSULTAR DATOS DE CURSOS Y TALLERES
    </h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form action="{{ route('tra.query') }}" method="POST" target="_blank">
                @csrf
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Nombre del Curso</label>
                            <input id="training_name" name="training_name" type="text"
                                placeholder="ingrese el nombre del curso a buscar" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Docente del Curso</label>
                            <input id="training_teacher" name="training_teacher" type="text"
                                placeholder="ingrese el nombre del docente a buscar" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Cantidad Inscritos Mínimo</label>
                            <input id="quantity_min" name="quantity_min" type="number" placeholder="10" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Cantidad Inscritos Máximo</label>
                            <input id="quantity_max" name="quantity_max" type="number" placeholder="50" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Recaudacion Mínima</label>
                            <input id="money_min" name="money_min" type="number" placeholder="12500" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Recaudacion Máxima</label>
                            <input id="money_max" name="money_max" type="number" placeholder="17500" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Fecha Inicial de Curso</label>
                            <input id="date_min" name="date_min" type="date" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Fecha Final de Curso</label>
                            <input id="date_max" name="date_max" type="date" class="form-control">
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