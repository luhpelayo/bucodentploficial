@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR ODONTOGRAMA</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Editar Información del role_has_permission</h3>
            <form enctype="multipart/form-data" class="form-horizontal"
                action="{{ route('role_has_permission.update', $role_has_permission->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="form-group">
                    <label class="col-lg-3 control-label">role:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="role_id3" name="role_id3" style="width: 100%;">
                            <option value="{{$role_has_permission->role_id}}">{{$role_has_permission->role_id}}</option>
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
                    <label class="col-lg-3 control-label">Permissions:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="permission_id3" name="permission_id3" style="width: 100%;">
                            <option value="{{ $role_has_permission->permission_id }}">{{ $role_has_permission->permission_id }}</option>
                            @foreach($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                          </select>
                          @error('permission_id3')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>

               
                
                <hr>
                <input type="submit" value="Editar Odontograma" class="btn btn-success">
                <a href="{{ route('role_has_permission.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection