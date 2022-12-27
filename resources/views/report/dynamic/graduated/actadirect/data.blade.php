@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="well" style="text-align:center; color: red; font-weight: bolder;">CONSULTAR DATOS DE LAS ACTAS DIRECTAS
    </h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form action="{{ route('actadir.query') }}" method="POST" target="_blank">
                @csrf
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Codigo de Acta</label>
                            <input id="acta_code" name="acta_code" type="text"
                                placeholder="ingrese el codigo a buscar" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="col-lg-3 control-label">Modalidad</label>
                            <select class="js-example-basic-single" id="modality_id" name="modality_id"
                                style="width: 100%;">
                                <option value="">Seleccionar Modalidad</option>
                                @foreach($modalities as $modality)
                                <option value="{{ $modality->id }}">{{ $modality->modality_name }}</option>
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
                            <label>Nota Minima</label>
                            <input id="note_min" name="note_min" type="number" placeholder="ingrese la nota minima a buscar"
                                class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Nota Maxima</label>
                            <input id="note_max" name="note_max" type="number" placeholder="ingrese la nota maxima a buscar"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tribunal</label>
                        <input id="acta_court" name="acta_court" type="text"
                            placeholder="ingrese el nombre del tribunal a buscar" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-lg btn-success">Buscar Datos</button>
                    <a href="{{ route('dynagra.index') }}">
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