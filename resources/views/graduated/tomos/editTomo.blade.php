@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR TRABAJO FINAL DE GRADO</h1>
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
            <h3 style="text-align: center">Editar Información del Tomo</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('tomo.update', $tomo->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Código del TFG:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="tomo_code" id="tomo_code" type="text" value="{{ $tomo->tomo_code }}" >
                        @error('tomo_code')
                        <small class="text-danger">¡Introduzca el Código!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Título de TFG:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="tomo_title" id="tomo_title" type="text" value="{{ $tomo->tomo_title }}" >
                            @error('tomo_title')
                        <small class="text-danger">¡Introduzca el Título!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Asesor de TFG:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="tomo_consultant" id="tomo_consultant" type="text" value="{{ $tomo->tomo_consultant }}" >
                            @error('tomo_consultant')
                        <small class="text-danger">¡Introduzca un Asesor!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Año de Elaboración:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="tomo_year" id="tomo_year" type="text" value="{{ $tomo->tomo_year }}" >
                            @error('tomo_year')
                        <small class="text-danger">¡Introduzca Año de Elaboración!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Modalidad del TFG:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="modality_id" name="modality_id" style="width: 100%;">
                            <option value="{{ $tomo->modality->id }}">{{ $tomo->modality->modality_name }}</option>
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
                    <label class="col-lg-3 control-label">Categoría del TFG:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="category_id" name="category_id" style="width: 100%;">
                            <option value="{{ $tomo->category->id }}">{{ $tomo->category->category_name }}</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" >{{ $category->category_name }}</option>
                            @endforeach
                          </select>
                          @error('category_id')
                        <small class="text-danger">¡Seleccione una Categoría!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Estudiante:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="student_id" name="student_id" style="width: 100%;">
                            <option value="{{ $tomo->student->id }}">{{ $tomo->student->student_name }} {{ $tomo->student->student_lastname }}</option>
                          </select>
                          @error('student_id')
                        <small class="text-danger">¡Seleccione un Estudiante!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Documento PDF:</label>
                    <div class="col-lg-8">
                        <input type="file" name="tomo_document" id="tomo_document" accept="application/pdf">
                    @error('tomo_document')
                        <small class="text-danger">Formato Incorrecto!, Intente de Nuevo</small>
                    @enderror
                    </div>
                </div>
                <hr>
                <input type="submit" value="Editar TFG" class="btn btn-success">
                <a href="{{ route('tomo.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection