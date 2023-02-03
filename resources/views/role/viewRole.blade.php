@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE ROLES REGISTRADOS</h1>
  </div>
  <div style="text-align: center">
    @can('role.create')
    <a href="{{ route('role.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('role.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('role.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('role.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
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
      @foreach ($roles as $role)
      <tr>
        <td>{{ $role->name}}</td>
        <td>{{ $role->guard_name }}</td>
        
        <td style="text-align: center">
          @can('role.edit')
          <a class="btn btn-success btn-sm" href="{{ route('role.edit', $role->id) }}">Editar</a>
          @endcan
          @can('role.destroy')
          <form action="{{ route('role.destroy', $role->id) }}" method="post" style="display: inline-block">
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