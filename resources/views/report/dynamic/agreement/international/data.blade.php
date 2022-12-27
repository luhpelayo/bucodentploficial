@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="well" style="text-align:center; color: red; font-weight: bolder;">CONSULTAR DATOS DE CONVENIOS INTERNACIONALES
    </h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form action="{{ route('inter.query') }}" method="POST" target="_blank">
                @csrf
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Nombre de Organización</label>
                            <input id="international_organization" name="international_organization" type="text"
                                placeholder="ingrese el nombre de organizacion a buscar" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Firma en Empresa</label>
                            <input id="international_company" name="international_company" type="text"
                                placeholder="ingrese el nombre de la firma a buscar" class="form-control">
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
                        <label>Firma de UAGRM</label>
                        <input id="international_uagrm" name="international_uagrm" type="text"
                            placeholder="ingrese el nombre de la firma a buscar" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-lg btn-success">Buscar Datos</button>
                    <a href="{{ route('dynagre.index') }}">
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