@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR GUIA DE MATERIA</h1>
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
            <h3 style="text-align: center">Editar Información de la Práctica</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('guide.update', $guide->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Sigla-Materia-Grupo:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="matter_id2" name="matter_id2" style="width: 100%;">
                            <option value="{{ $guide->matter_id }}">{{ $guide->matter->matter_initial }}--{{ $guide->matter->matter_name }}--{{ $guide->matter->matter_group }}</option>
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
                        <input class="form-control" name="matter_teacher2" id="matter_teacher2" type="text" value="{{ $guide->matter->matter_teacher }}" readonly>
                            @error('matter_teacher2')
                        <small class="text-danger">¡Campo Vácio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre Práctica:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="guide_name" id="guide_name" type="text" value="{{ $guide->guide_name }}">
                            @error('guide_name')
                        <small class="text-danger">¡Introduzca el Nombre!</small>
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
                        Nota: Si desea cargar un nuevo documento simplemente adjunte el nuevo documento el anterior se sobre escribe.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar Guia" class="btn btn-success">
                <a href="{{ route('gui.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection