@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="well" style="text-align:center; color: red; font-weight: bolder;">CONSULTAR DATOS DE SEGUIMIENTO A INVESTIGACIONES
    </h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form action="{{ route('investigationtrace.query') }}" method="POST" target="_blank">
                @csrf
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label class="col-lg-3 control-label">Investigación:</label>
                                <select class="js-example-basic-single" id="investigation_id" name="investigation_id" style="width: 100%;">
                                    <option value="">Seleccionar Investigación</option>
                                    @foreach($investigations as $investigation)
                                    <option value="{{ $investigation->id }}" >{{ $investigation->investigation_code }}</option>
                                    @endforeach
                                  </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Responsable</label>
                            <input id="investigation_subject" name="investigation_subject" type="text" placeholder="ingrese el nombre del responsable a buscar"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Fecha de Inicio</label>
                            <input id="date_min" name="date_min" type="date" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Fecha Final</label>
                            <input id="date_max" name="date_max" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nombre de Investigación</label>
                        <input id="investigation_name" name="investigation_name" type="text"
                            placeholder="ingrese el nombre de la investigation a buscar" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-lg btn-success">Buscar Datos</button>
                    <a href="{{ route('dynalab.index') }}">
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