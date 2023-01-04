@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE PACIENTES REGISTRADOS</h1>
  </div>
  <div style="text-align: center">
    @can('paciente.create')
    <a href="{{ route('paciente.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('paciente.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('paciente.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('paciente.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>APELLIDOS</th>
        <th>NOMBRES</th>
        <th>CI</th>
        <th>fECHA NACIMIENTO</th>
        <th>DIRECCION</th>
        <th>TELEFONO</th>
        <th>EMAIL</th>
        <th>OPCIONES</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pacientes as $paciente)
      <tr>
        <td>{{ $paciente->nombre }}</td>
        <td>{{ $paciente->apellido }}</td>
        <td>{{ $paciente->ci }}</td>
        <td>{{ $paciente->fechanacimiento }}</td>
        <td>{{ $paciente->direccion }}</td>
        <td>{{ $paciente->telefono }}</td>
        <td>{{ $paciente->email }}</td>
        <td style="text-align: center">
          @can('paciente.edit')
          <a class="btn btn-success btn-sm" href="{{ route('paciente.edit', $paciente->id) }}">Editar</a>
          @endcan
          @can('paciente.destroy')
          <form action="{{ route('paciente.destroy', $paciente->id) }}" method="post" style="display: inline-block">
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