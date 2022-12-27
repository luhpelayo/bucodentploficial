@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR ACTA DIRECTA</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="{{ asset('/images/'.$acta->acta_image)}}" style="width: 120%" alt="avatar">      
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Editar Información del Acta</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('actadir.update', $acta->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Código de Acta:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="acta_code" id="acta_code" type="text" value="{{ $acta->acta_code }}">
                            @error('acta_code')
                        <small class="text-danger">¡Campo Vácio o Código Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Hora de Defensa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="acta_hour" id="acta_hour" type="time" value="{{ $acta->acta_hour }}" >
                            @error('acta_hour')
                        <small class="text-danger">¡Introduzca la hora de Defensa!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Defensa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="acta_date" id="acta_date" type="date" value="{{ $acta->acta_date }}">
                            @error('acta_date')
                        <small class="text-danger">¡Introduzca la fecha de Defensa!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tribunal:</label>
                    <div class="col-lg-8">
                        <textarea cols="86" rows="5" name="acta_court" id="acta_court">{{ $acta->acta_court }}</textarea>
                            @error('acta_court')
                        <small class="text-danger">¡Texto Demasiado Largo o Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nota Final:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="acta_note" id="acta_note" type="text" value="{{ $acta->acta_note }}">
                            @error('acta_note')
                        <small class="text-danger">¡Campo Vácio o Dato Invalido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Estudiante:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="student_id" name="student_id" style="width: 100%;">
                            <option value="">{{ $acta->student->student_register }}</option>
                          </select>
                          @error('student_id')
                        <small class="text-danger">¡Es necesario seleccionar un Estudiante!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Modalidad:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="modality_id" name="modality_id" style="width: 100%;">
                            <option value="{{ $acta->modality->id }}">{{ $acta->modality->modality_name }}</option>
                            @foreach($modalities as $modality)
                            <option value="{{ $modality->id }}" >{{ $modality->modality_name }}</option>
                            @endforeach
                          </select>
                          @error('modality_id')
                        <small class="text-danger">¡Seleccione una Modalidad!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Imagen:</label>
                    <div class="col-lg-8">
                        <input type="file" name="acta_image" id="acta_image" accept="image/*">
                    @error('acta_image')
                        <small class="text-danger">Campo Vácio o Formato Incorrecto!</small>
                    @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Solo se puede actualizar los atributos propios del Acta.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar Acta" class="btn btn-success">
                <a href="{{ route('actaDirect.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection