@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR TRABAJO FINAL DE GRADO</h1>
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
            <h3>Información Detallada del Tomo</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('tomo.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Código del TFG:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="tomo_code" id="tomo_code" type="text" placeholder="ejemplo TD-0120">
                        @error('tomo_code')
                        <small class="text-danger">¡Campo Vacio o Codigo Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Título de TFG:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="tomo_title" id="tomo_title" type="text" placeholder="ejemplo Proyecto de inversion para la empresa x">
                            @error('tomo_title')
                        <small class="text-danger">¡Introduzca el Título!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Asesor de TFG:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="tomo_consultant" id="tomo_consultant" type="text" placeholder="ejemplo Miguel Peinado">
                            @error('tomo_consultant')
                        <small class="text-danger">¡Introduzca un Asesor!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Año de Elaboración:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="tomo_year" id="tomo_year" type="text" placeholder="ejemplo 2022">
                            @error('tomo_year')
                        <small class="text-danger">¡Introduzca Año de Elaboración!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Modalidad del TFG:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="modality_id" name="modality_id" style="width: 100%;">
                            <option value="">Seleccionar Modalidad</option>
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
                            <option value="">Seleccionar Categoría</option>
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
                            <option value="">Seleccionar Estudiante</option>
                            @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->student_name }}</option>
                            @endforeach
                          </select>
                          @error('student_id')
                        <small class="text-danger">¡Campo Vacio o Registro Repetido!</small>
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
                <input type="submit" value="Registrar TFG" class="btn btn-success">
                <a href="{{ route('tomo.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection