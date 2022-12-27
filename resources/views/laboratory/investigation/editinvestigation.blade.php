@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR INVESTIGACION</h1>
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
            <h3 style="text-align: center">Editar Información de la Investigación</h3>
            <form class="form-horizontal" action="{{ route('investigation.update', $investigation->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Código:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="investigation_code" id="investigation_code" type="text" value="{{ $investigation->investigation_code }}">
                            @error('investigation_code')
                        <small class="text-danger">¡Campo Vácio o Código Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Responsable:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="investigation_subject" id="investigation_subject" type="text" value="{{ $investigation->investigation_subject }}">
                            @error('investigation_subject')
                        <small class="text-danger">¡Campo Vácio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="investigation_name" id="investigation_name" type="text" value="{{ $investigation->investigation_name }}">
                            @error('investigation_name')
                        <small class="text-danger">¡Campo Vácio o Nombre Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Inicio:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="investigation_stardate" id="investigation_stardate" type="date" value="{{ $investigation->investigation_stardate }}">
                            @error('investigation_stardate')
                        <small class="text-danger">¡Introduzca la fecha de Inicio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Final:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="investigation_endate" id="investigation_endate" type="date" value="{{ $investigation->investigation_endate }}">
                            @error('investigation_endate')
                        <small class="text-danger">¡Campo Vacío o Fecha Final Erronea!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Todos los campos pueden ser editados, sin embargo recuerde que los registros se utilizan en otros modulos.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar Investigacion" class="btn btn-success">
                <a href="{{ route('inv.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection