@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE ODONTOLOGOS REGISTRADOS</h1>
  </div>
  <div style="text-align: center">
    @can('odontologo.create')
    <a href="{{ route('odontologo.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('odontologo.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('odontologo.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('odontologo.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
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
        <th>ESPECIALIDAD</th>
        <th>RUC</th>
        <th>OPCIONES</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($odontologos as $odontologo)
      <tr>
        <td>{{ $odontologo->nombre }}</td>
        <td>{{ $odontologo->apellido }}</td>
        <td>{{ $odontologo->ci }}</td>
        <td>{{ $odontologo->fechanacimiento }}</td>
        <td>{{ $odontologo->direccion }}</td>
        <td>{{ $odontologo->telefono }}</td>
        <td>{{ $odontologo->email }}</td>
        <td>{{ $odontologo->especialidad }}</td>
        <td>{{ $odontologo->ruc }}</td>
        <td style="text-align: center">
          @can('odontologo.edit')
          <a class="btn btn-success btn-sm" href="{{ route('odontologo.edit', $odontologo->id) }}">Editar</a>
          @endcan
          @can('odontologo.destroy')
          <form action="{{ route('odontologo.destroy', $odontologo->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina un odontologo registrado todos los registros que dependen de dicho odontologo tambien seran
      eliminados.
    </span>
  </div>
</div>
@endsection