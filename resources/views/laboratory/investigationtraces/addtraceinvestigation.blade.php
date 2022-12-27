@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">CREAR SEGUIMIENTO DE INVESTIGACION</h1>
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
            <h3>Información Acerca de la Investigación</h3>
            <form class="form-horizontal" action="{{ route('investigationtrace.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Investigación:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="investigation_id2" name="investigation_id2" style="width: 100%;">
                            <option value="">Seleccionar Investigación</option>
                            @foreach($investigations as $investigation)
                            <option value="{{ $investigation->id }}" >{{ $investigation->investigation_code }}</option>
                            @endforeach
                          </select>
                          @error('investigation_id2')
                        <small class="text-danger">¡Es necesario seleccionar una Investigación!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Responsable:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="investigation_subject2" id="investigation_subject2" type="text" readonly>
                            @error('investigation_subject2')
                        <small class="text-danger">¡Campo Vácio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="investigation_name2" id="investigation_name2" type="text" readonly>
                            @error('investigation_name2')
                        <small class="text-danger">¡Campo Vácio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Inicio:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="investigation_stardate2" id="investigation_stardate2" type="date" readonly>
                            @error('investigation_stardate2')
                        <small class="text-danger">¡Introduzca la fecha de Inicio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Final:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="investigation_endate2" id="investigation_endate2" type="date" readonly>
                            @error('investigation_endate2')
                        <small class="text-danger">¡Campo Vacío o Fecha Final Erronea!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Solo se puede seleccionar las investigaciones que ya han sido creadas anteriormente.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Crear Seguimiento" class="btn btn-success">
                <a href="{{ route('inv.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection