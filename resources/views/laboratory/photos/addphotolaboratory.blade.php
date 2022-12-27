@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR INFORMACION DEL LABORATORIO</h1>
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
            <h3>Información Detallada del Laboratorio</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('photolab.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Elaboración:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="labphoto_date" id="labphoto_date" type="date">
                            @error('labphoto_date')
                        <small class="text-danger">¡Introduzca la fecha de Elaboración!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="labphoto_name" id="labphoto_name" type="text" placeholder="ejemplo Trabajo de investigacion para ....">
                            @error('labphoto_name')
                        <small class="text-danger">¡Campo Vácio o Nombre Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Responsable:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="labphoto_subject" id="labphoto_subject" type="text" placeholder="ejemplo Ing Nell's Antonio Vidal Vargas">
                            @error('labphoto_subject')
                        <small class="text-danger">¡Campo Vácio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Sigla-Materia-Grupo:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="matter_id" name="matter_id" style="width: 100%;">
                            <option value="">Seleccionar Materia</option>
                            @foreach($matters as $matter)
                            <option value="{{ $matter->id }}" >{{ $matter->matter_initial }}--{{ $matter->matter_name }}--{{ $matter->matter_group }}</option>
                            @endforeach
                          </select>
                          @error('matter_id')
                        <small class="text-danger">¡Es necesario seleccionar una Materia!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Antes de adjuntar fotos se debe rellenar la información del laboratorio.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Registrar Laboratorio" class="btn btn-success">
                <a href="{{ route('pho.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection