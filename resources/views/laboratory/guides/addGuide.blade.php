@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR GUIA DE MATERIA</h1>
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
            <h3>Información Detallada de la Práctica</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('guide.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Sigla-Materia-Grupo:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="matter_id2" name="matter_id2" style="width: 100%;">
                            <option value="">Seleccionar Materia</option>
                            @foreach($matters as $matter)
                            <option value="{{ $matter->id }}" >{{ $matter->matter_initial }}--{{ $matter->matter_name }}--{{ $matter->matter_group }}</option>
                            @endforeach
                          </select>
                          @error('matter_id2')
                        <small class="text-danger">¡Es necesario seleccionar una Materia!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Docente de la Materia:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="matter_teacher2" id="matter_teacher2" type="text" readonly>
                            @error('matter_teacher2')
                        <small class="text-danger">¡Campo Vácio o Valor Existente!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre Práctica:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="guide_name" id="guide_name" type="text" placeholder="ejemplo Practica en .. para ..">
                            @error('guide_name')
                        <small class="text-danger">¡Campo Vacio o Nombre Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Documento PDF:</label>
                    <div class="col-lg-8">
                        <input type="file" name="guide_document" id="guide_document" accept="application/pdf">
                    @error('guide_document')
                        <small class="text-danger">Formato Incorrecto!, Intente de Nuevo</small>
                    @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Una Materia puede tener 1 o más guias, sin embargo el nombre no puede ser duplicado.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Registrar Guia" class="btn btn-success">
                <a href="{{ route('gui.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection