@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR PROCEDIMIENTOS</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="{{ asset('/images/industrial.png') }}"  alt="LOGO">
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3>Información Detallada del Procedimiento</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('procedure.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Código:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="procedure_code" id="procedure_code" type="text" placeholder="ejemplo PA-012">
                        @error('procedure_code')
                        <small class="text-danger">¡Campo Vacio o Codigo Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Procedimiento:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="procedure_name" id="procedure_name" type="text" placeholder="ejemplo Procedimiento de ...">
                            @error('procedure_name')
                        <small class="text-danger">¡Introduzca el Título!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="procedure_date" id="procedure_date" type="date">
                            @error('procedure_date')
                        <small class="text-danger">¡Introduzca la fecha!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Área:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="area_id" name="area_id" style="width: 100%;">
                            <option value="">Seleccionar Área</option>
                            @foreach($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                            @endforeach
                          </select>
                          @error('area_id')
                        <small class="text-danger">¡Seleccione un Área!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Documento PDF:</label>
                    <div class="col-lg-8">
                        <input type="file" name="procedure_document" id="procedure_document" accept="application/pdf">
                    @error('procedure_document')
                        <small class="text-danger">Formato Incorrecto!, Intente de Nuevo</small>
                    @enderror
                    </div>
                </div>
                <hr>
                <input type="submit" value="Registrar Procedimiento" class="btn btn-success">
                <a href="{{ route('proc.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection