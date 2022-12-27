@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR EMPRESA</h1>
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
            <h3>Información de la Empresa</h3>
            <form class="form-horizontal" action="{{ route('company.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de la Empresa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="company_name" id="company_name" type="text" placeholder="ejemplo Coca Cola">
                        @error('company_name')
                        <small class="text-danger">¡Nombre Vacio o Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Contacto de la Empresa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="company_contact" id="company_contact" type="text" placeholder="ejemplo Ing Pedro Perez">
                        @error('company_contact')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Número de Teléfono:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="company_number" id="company_number" type="text" placeholder="ejemplo 71308634">
                        @error('company_number')
                        <small class="text-danger">¡Campo Vacio o Formato Erroneo!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center" >
                    <span style="color: red">
                        Nota: No registre datos ya existentes.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Registrar Empresa" class="btn btn-success">
                <a href="{{ route('prac.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection