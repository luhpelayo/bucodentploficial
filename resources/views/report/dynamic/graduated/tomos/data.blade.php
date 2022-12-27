@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="well" style="text-align:center; color: red; font-weight: bolder;">CONSULTAR DATOS DE TRABAJOS FINALES DE GRADO
    </h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form action="{{ route('tomo.query') }}" method="POST" target="_blank">
                @csrf
                <div class="col-sm-12">
                    <div class="row">
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
                        <div class="col-sm-6 form-group">
                            <label class="col-lg-3 control-label">Categoría</label>
                            <select class="js-example-basic-single" id="category_id" name="category_id"
                                style="width: 100%;">
                                <option value="">Seleccionar Categoría</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
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
                            <label>Año Inicial</label>
                            <input id="year_min" name="year_min" type="text" class="form-control" placeholder="Ingrese el año inicial de busqueda">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Año Final</label>
                            <input id="year_max" name="year_max" type="text" class="form-control" placeholder="Ingrese el año final de busqueda">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Título del TFG</label>
                            <input id="tomo_title" name="tomo_title" type="text"
                                placeholder="ingrese el nombre del trabajo final de grado a buscar" class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Asesor</label>
                            <input id="tomo_consultant" name="tomo_consultant" type="text" placeholder="ingrese el nombre de asesor a buscar"
                                class="form-control">
                        </div>
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