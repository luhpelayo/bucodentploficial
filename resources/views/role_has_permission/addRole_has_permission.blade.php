@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">CREAR </h1>
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
            <h3>Información Roles permissos</h3>
            <form class="form-horizontal" action="{{ route('role_has_permission.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Role:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="role_id3" name="role_id3" style="width: 100%;">
                            <option value="">Seleccionar Role</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                          </select>
                          @error('role_id3')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>

            

                <div class="form-group">
                    <label class="col-lg-3 control-label">Permission:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="permission_id3" name="permission_id3" style="width: 100%;">
                            <option value="">Seleccionar Permission</option>
                            @foreach($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                          </select>
                          @error('permission_id3')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>

               
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: el role_has_permission  debe ser llenado
                    </span>
                </div>
                <hr>
                <input type="submit" value="Crear Roles permission" class="btn btn-success">
                <a href="{{ route('role_has_permission.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection