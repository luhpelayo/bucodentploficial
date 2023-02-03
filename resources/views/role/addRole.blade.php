@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR ROLES</h1>
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
            <h3>Información del Servicio</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('role.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="name" id="name" type="text" placeholder="ejemplo ">
                        @error('name')
                        <small class="text-danger">¡Introduzca  Nombre del role!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Guard_Name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="guard_name" id="guard_name" type="text" placeholder="ejemplo ">
                            @error('guard_name')
                        <small class="text-danger">¡Introduzca guard_name del role!</small>
                        @enderror
                    </div>
                </div>
               
            
                <hr>
                <input type="submit" value="Registrar Role" class="btn btn-success">
                <a href="{{ route('role.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection