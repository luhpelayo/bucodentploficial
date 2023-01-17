@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE role_has_permissions</h1>
  </div>
  <div style="text-align: center">
    @can('role_has_permission.create')
    <a href="{{ route('role_has_permission.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('role_has_permission.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('role_has_permission.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('role_has_permission.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        
        <th>ROL</th>
        <th>PERMISSION</th>
   
        <th>OPCIONES</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($role_has_permissions as $role_has_permission)
      <tr>
    
        <td>{{ $role_has_permission->role_id }} </td>
        <td>{{ $role_has_permission->permission_id }} </td>
   
        <td style="text-align: center">
          @can('role_has_permission.edit')
          <a class="btn btn-success btn-sm" href="{{ route('role_has_permission.edit', $role_has_permission->id) }}">Editar</a>
          @endcan
          @can('role_has_permission.destroy')
          <form action="{{ route('role_has_permission.destroy', $role_has_permission->id) }}" method="post" style="display: inline-block">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger btn-sm delete-confirm" value="Eliminar">
          </form>
          @endcan
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div style="text-align: center">
    <span style="color: red">
      Nota: Si usted elimina un parte registrado todos los registros que dependen de dicho estudiante tambien seran
      eliminados.
    </span>
  </div>
</div>
@endsection