@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR VISITA TECNICA</h1>
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
            <h3 style="text-align: center">Editar Información de la Visita</h3>
            <form class="form-horizontal" action="{{ route('visit.update', $visit->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="visit_date" id="visit_date" type="date" value="{{ $visit->visit_date}}">
                            @error('visit_date')
                        <small class="text-danger">¡Introduzca la fecha!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Sigla-Materia-Grupo:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="matter_id" name="matter_id" style="width: 100%;">
                            <option value="{{ $visit->matter_id }}">{{ $visit->matter->matter_initial }}--{{ $visit->matter->matter_name }}--{{ $visit->matter->matter_group }}</option>
                            @foreach($matters as $matter)
                            <option value="{{ $matter->id }}" >{{ $matter->matter_initial }}--{{ $matter->matter_name }}--{{ $matter->matter_group }}</option>
                            @endforeach
                          </select>
                          @error('matter_id')
                        <small class="text-danger">¡Es necesario seleccionar una Materia!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Responsable UAGRM:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="visit_subjectuagrm" id="visit_subjectuagrm" type="text" value="{{ $visit->visit_subjectuagrm }}">
                            @error('visit_subjectuagrm')
                        <small class="text-danger">¡Campo Vácio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Empresa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="visit_company" id="visit_company" type="text" value="{{ $visit->visit_company }}">
                            @error('visit_company')
                        <small class="text-danger">¡Campo Vácio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Responsable Empresa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="visit_subjectcompany" id="visit_subjectcompany" type="text" value="{{ $visit->visit_subjectcompany }}">
                            @error('visit_subjectcompany')
                        <small class="text-danger">¡Campo Vácio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Trate de editar solamente los campos necesarios del registro.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar Visita" class="btn btn-success">
                <a href="{{ route('visit.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection