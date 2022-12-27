@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Adjuntar Archivos a: {{ $training->training_name }}</h1>
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
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('tra.storefiles', $training->id) }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Inicio:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_stardate" id="training_stardate" type="date"
                            value="{{ $training->training_stardate }}" readonly>
                        @error('training_stardate')
                        <small class="text-danger">¡Introduzca la fecha de inicio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Final:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_endate" id="training_endate" type="date"
                            value="{{ $training->training_endate }}" readonly>
                        @error('training_endate')
                        <small class="text-danger">¡Introduzca la fecha final!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Docente del Curso:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_teacher" id="training_teacher" type="text"
                            value="{{ $training->training_teacher }}" readonly>
                        @error('training_teacher')
                        <small class="text-danger">¡Campo Vácio o Incorrecto!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Total Inscritos:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_quantity" id="training_quantity" type="number"
                            value="{{ $training->training_quantity }}" readonly>
                        @error('training_quantity')
                        <small class="text-danger">¡Campo Vácio o Cantidad Incorrecta!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Total Recaudación:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_money" id="training_money" type="number"
                            value="{{ $training->training_money }}" readonly>
                        @error('training_money')
                        <small class="text-danger">¡Campo Vácio o Monto Incorrecto!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Documentos PDF:</label>
                    <div class="col-lg-8">
                        <input type="file" name="training_documents[]" id="training_documents[]" multiple accept="application/pdf">
                    @error('training_documents')
                        <small class="text-danger">Formato Incorrecto!, Intente de Nuevo</small>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Imágenes:</label>
                    <div class="col-lg-8">
                        <input type="file" name="training_images[]" id="training_images[]" multiple accept="image/*">
                    @error('training_images')
                        <small class="text-danger">Campo Vácio o Formato Incorrecto!</small>
                    @enderror
                    </div>   
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Es posible cargar varios documentos(PDF) y varias imagenes(JPG,JPGE,PNG).
                    </span>
                </div>
                <hr>
                <input type="submit" value="Guardar Archivos" class="btn btn-success">
                <a href="{{ route('tra.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection