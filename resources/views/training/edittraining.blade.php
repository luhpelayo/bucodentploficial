@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR CURSO/TALLER</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="{{ asset('/images/industrial.png') }}" alt="LOGO">
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Editar Información del Curso</h3>
            <form class="form-horizontal" action="{{ route('tra.update', $training->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre del Curso:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_name" id="training_name" type="text"
                            value="{{ $training->training_name }}">
                        @error('training_name')
                        <small class="text-danger">¡Campo Vácio o Nombre Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Inicio:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_stardate" id="training_stardate" type="date"
                            value="{{ $training->training_stardate }}">
                        @error('training_stardate')
                        <small class="text-danger">¡Introduzca la fecha de inicio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Final:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_endate" id="training_endate" type="date"
                            value="{{ $training->training_endate }}">
                        @error('training_endate')
                        <small class="text-danger">¡Introduzca la fecha final!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Docente del Curso:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_teacher" id="training_teacher" type="text"
                            value="{{ $training->training_teacher }}">
                        @error('training_teacher')
                        <small class="text-danger">¡Campo Vácio o Incorrecto!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Total Inscritos:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_quantity" id="training_quantity" type="number"
                            value="{{ $training->training_quantity }}">
                        @error('training_quantity')
                        <small class="text-danger">¡Campo Vácio o Cantidad Incorrecta!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Total Recaudación:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_money" id="training_money" type="number"
                            value="{{ $training->training_money }}">
                        @error('training_money')
                        <small class="text-danger">¡Campo Vácio o Monto Incorrecto!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Modifique solo los datos necesarios caso contrario el sistema rechazara la solicitud de edicion.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar Curso" class="btn btn-success">
                <a href="{{ route('tra.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection