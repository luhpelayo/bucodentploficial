@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE SERVICIOS REGISTRADOS</h1>
  </div>
  <div style="text-align: center">
    @can('permission.create')
    <a href="{{ route('permission.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('permission.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('permission.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('permission.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>NAME</th>
        <th>GUARD_NAME</th>
       
        <th>OPCIONES</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($permissions as $permission)
      <tr>
        <td>{{ $permission->name}}</td>
        <td>{{ $permission->guard_name }}</td>
        
        <td style="text-align: center">
          @can('permission.edit')
          <a class="btn btn-success btn-sm" href="{{ route('permission.edit', $permission->id) }}">Editar</a>
          @endcan
          @can('permission.destroy')
          <form action="{{ route('permission.destroy', $permission->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina un estudiante registrado todos los registros que dependen de dicho estudiante tambien seran
      eliminados.
    </span>
  </div>
</div>
@endsection