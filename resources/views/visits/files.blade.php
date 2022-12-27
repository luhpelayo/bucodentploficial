@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">ADJUNTAR IMAGENES DE VISITA TECNICA</h1>
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
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('visit.storefiles', $visit->id) }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="visit_date" id="visit_date" type="date" value="{{ $visit->visit_date }}" readonly>
                            @error('visit_date')
                        <small class="text-danger">¡Introduzca la fecha!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Materia-Grupo:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="{{ $visit->matter->matter_initial }}--{{ $visit->matter->matter_name }}--{{ $visit->matter->matter_group }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Responsable UAGRM:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="visit_subjectuagrm" id="visit_subjectuagrm" type="text" value="{{ $visit->visit_subjectuagrm }}" readonly>
                            @error('visit_subjectuagrm')
                        <small class="text-danger">¡Campo Vácio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Empresa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="visit_company" id="visit_company" type="text" value="{{ $visit->visit_company }}" readonly>
                            @error('visit_company')
                        <small class="text-danger">¡Campo Vácio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Responsable Empresa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="visit_subjectcompany" id="visit_subjectcompany" type="text" value="{{ $visit->visit_subjectcompany }}" readonly>
                            @error('visit_subjectcompany')
                        <small class="text-danger">¡Campo Vácio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Documentos PDF:</label>
                    <div class="col-lg-8">
                        <input type="file" name="visit_documents[]" id="visit_documents[]" multiple accept="application/pdf">
                    @error('visit_documents')
                        <small class="text-danger">Formato Incorrecto!, Intente de Nuevo</small>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Imágenes:</label>
                    <div class="col-lg-8">
                        <input type="file" name="visit_images[]" id="visit_images[]" multiple accept="image/*">
                    @error('visit_images')
                        <small class="text-danger">Campo Vácio o Formato Incorrecto!</small>
                    @enderror
                    </div>   
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Es posible cargar imagenes(JPG,JPGE,PNG) y Documentos(PDF), Mejor si la resolucion es la misma para evitar ocupar espacio en Servidor.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Guardar Archivos" class="btn btn-success">
                <a href="{{ route('visit.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection