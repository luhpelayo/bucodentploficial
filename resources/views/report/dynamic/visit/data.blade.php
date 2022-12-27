@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="well" style="text-align:center; color: red; font-weight: bolder;">CONSULTAR DATOS DE VISITAS TECNICAS
    </h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form action="{{ route('visit.query') }}" method="POST" target="_blank">
                @csrf
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Responsable UAGRM</label>
                            <input id="visit_subjectuagrm" name="visit_subjectuagrm" type="text" placeholder="ingrese el nombre del resposanble a buscar"
                                class="form-control">
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
                            <label>Fecha Inicial</label>
                            <input id="date_min" name="date_min" type="date" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Fecha Final</label>
                            <input id="date_max" name="date_max" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Empresa Visitada</label>
                            <input id="visit_company" name="visit_company" type="text" placeholder="ingrese el nombre del resposanble a buscar"
                                class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Responsable en Empresa</label>
                            <input id="visit_subjectcompany" name="visit_subjectcompany" type="text" placeholder="ingrese el nombre del resposanble a buscar"
                                class="form-control">
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