@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR PROGRAMAS ANALITICOS</h1>
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
            <h3>Información Detallada del Programa Analítico</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('program.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Código:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="program_code" id="program_code" type="text" placeholder="ejemplo PR-015">
                        @error('program_code')
                        <small class="text-danger">¡Campo Vacio o Codigo Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Asignatura:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="program_name" id="program_name" type="text" placeholder="ejemplo PROCESOS INDUSTRIALES I">
                            @error('program_name')
                        <small class="text-danger">¡Introduzca el Título!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Sigla y Código:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="program_acronym" id="program_acronym" type="text" placeholder="ejemplo INF-110">
                            @error('program_acronym')
                        <small class="text-danger">¡Introduzca Sigla & Codigo!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nivel:</label>
                    <div class="col-lg-8">
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
                          @error('program_level')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Número de Créditos:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="program_credit" id="program_credit" type="number"
                            placeholder="Ejemplo 5..">
                        @error('program_credit')
                        <small class="text-danger">¡Campo Vácio o Cantidad Incorrecta!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Elaboración:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="program_date" id="program_date" type="date">
                            @error('program_date')
                        <small class="text-danger">¡Introduzca la fecha!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Elaborado Por:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="program_designed" id="program_designed" type="text" placeholder="ejemplo Ing Antonio Vidal">
                            @error('program_designed')
                        <small class="text-danger">¡Introduzca el Nombre!</small>
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
                        <input type="file" name="program_document" id="program_document" accept="application/pdf">
                    @error('program_document')
                        <small class="text-danger">Formato Incorrecto!, Intente de Nuevo</small>
                    @enderror
                    </div>
                </div>
                <hr>
                <input type="submit" value="Registrar Programa" class="btn btn-success">
                <a href="{{ route('prog.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection