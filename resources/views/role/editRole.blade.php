@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR ROLES</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                @if(!empty($role->student_image))
                <img src="{{ URL::asset('/images/'.$role->student_image)}}" style="width: 120%" class="avatar img-circle img-thumbnail"
                    alt="avatar">
                @else
                <img src="{{ URL::asset('icons/sinimagen.png')}}" style="width: 120%" class="avatar img-circle img-thumbnail" alt="avatar">
                <h4>Sin foto de Perfil</h4>
                @endif
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Editar Información del role</h3>
            <form enctype="multipart/form-data" class="form-horizontal"
                action="{{ route('role.update', $role->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="name" id="name" type="text"
                            value="{{ $role->name }}">
                        @error('name')
                        <small class="text-danger">¡Introduzca el name del Servicio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Guard_Name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="guard_name" id="guard_name" type="text"
                            value="{{ $role->guard_name }}">
                        @error('guard_name')
                        <small class="text-danger">¡Introduzca guard_name del role!</small>
                        @enderror
                    </div>
                </div>
              
                
                <hr>
                <input type="submit" value="Actualizar Role" class="btn btn-success">
                <a href="{{ route('role.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection