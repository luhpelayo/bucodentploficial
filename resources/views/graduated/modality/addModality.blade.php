@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR MODALIDAD DE GRL</h1>
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
            <h3>Información de la Modalidad</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('modality.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de la Modalidad:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="modality_name" id="modality_name" type="text" placeholder="ejemplo Tesis de Grado">
                        @error('modality_name')
                        <small class="text-danger">¡Nombre Vacio o Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Descripcion de la Modalidad:</label>
                    <div class="col-lg-8">
                        <textarea name="modality_description" id="modality_description" cols="86" rows="4"></textarea>
                            @error('modality_description')
                        <small class="text-danger">¡Texto Demasiado Largo o Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center" >
                    <span style="color: red">
                        Nota: No registre datos ya existentes y trate de anotar una pequeña descripción.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Registrar Modalidad" class="btn btn-success">
                <a href="{{ route('modal.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection