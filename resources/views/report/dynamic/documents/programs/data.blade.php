@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="well" style="text-align:center; color: red; font-weight: bolder;">CONSULTAR DATOS DE PROGRAMAS ANALITICOS
    </h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form action="{{ route('program.query') }}" method="POST" target="_blank">
                @csrf
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Código de Programa</label>
                            <input id="program_code" name="program_code" type="text"
                                placeholder="ingrese el codigo a buscar" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="col-lg-3 control-label">Áreas:</label>
                            <select class="js-example-basic-single" id="area_id" name="area_id" style="width: 100%;">
                                <option value="">Seleccionar Area</option>
                                @foreach($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Asignatura</label>
                            <input id="program_name" name="program_name" type="text"
                                placeholder="ingrese el nombre de asignatura a buscar" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Sigla & Código</label>
                            <input id="program_acronym" name="program_acronym" type="text"
                                placeholder="ingrese la sigla o codigo a buscar" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Creditos</label>
                            <input id="program_credit" name="program_credit" type="number"
                                placeholder="ingrese la cantidad de creditos a buscar" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="col-lg-3 control-label">Nivel:</label>
                            <select class="js-example-basic-single" id="program_level" name="program_level" style="width: 100%;">
                                <option value="">Seleccionar Nivel</option>
                                <option value="1er Semestre">1er Semestre</option>
                                <option value="2do Semestre">2do Semestre</option>
                                <option value="3er Semestre">3er Semestre</option>
                                <option value="4to Semestre">4to Semestre</option>
                                <option value="5to Semestre">5to Semestre</option>
                                <option value="6to Semestre">6to Semestre</option>
                                <option value="7mo Semestre">7mo Semestre</option>
                                <option value="8vo Semestre">8vo Semestre</option>
                                <option value="9no Semestre">9no Semestre</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Fecha Inicial</label>
                            <input id="date_min" name="date_min" type="date" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Fecha Final</label>
                            <input id="date_max" name="date_max" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nombre del Elaborador</label>
                        <input id="program_designed" name="program_designed" type="text"
                            placeholder="ingrese el nombre del diseñador del programa analitico" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-lg btn-success">Buscar Datos</button>
                    <a href="{{ route('dynadoc.index') }}">
                        <input value="Cancelar" class="btn btn-lg btn-danger">
                    </a>
                </div>
            </form>
        </div>
        <br>
        <div style="text-align: center">
            <span style="color: red">
                Nota: La busqueda es más exacta si especifica de forma clara los datos a filtrar, para realizar busqueda
                por intervalos debe rellenar campo inicial y final.
            </span>
        </div>
    </div>
</div>
<br>
<br>
@endsection