@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR INVESTIGACION</h1>
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
            <h3>Información Detallada de la Investigación</h3>
            <form class="form-horizontal" action="{{ route('investigation.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Código:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="investigation_code" id="investigation_code" type="text" placeholder="ejemplo 7454">
                            @error('investigation_code')
                        <small class="text-danger">¡Campo Vácio o Código Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Responsable:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="investigation_subject" id="investigation_subject" type="text" placeholder="ejemplo Ing Nell's Antonio Vidal Vargas">
                            @error('investigation_subject')
                        <small class="text-danger">¡Campo Vácio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="investigation_name" id="investigation_name" type="text" placeholder="ejemplo Procedimiento para producir Gelatina">
                            @error('investigation_name')
                        <small class="text-danger">¡Campo Vácio o Nombre Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Inicio:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="investigation_stardate" id="investigation_stardate" type="date">
                            @error('investigation_stardate')
                        <small class="text-danger">¡Introduzca la fecha de Inicio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Final:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="investigation_endate" id="investigation_endate" type="date">
                            @error('investigation_endate')
                        <small class="text-danger">¡Campo Vacío o Fecha Final Erronea!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: No registre codigos duplicados, el sistema lo rechazara.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Registrar Investigacion" class="btn btn-success">
                <a href="{{ route('inv.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection