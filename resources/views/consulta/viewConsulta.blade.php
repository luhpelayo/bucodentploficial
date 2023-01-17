@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE consultas</h1>
  </div>
  <div style="text-align: center">
    @can('consulta.create')
    <a href="{{ route('consulta.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('consulta.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('consulta.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('consulta.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
      <th>Paciente</th>
      <th>Odontologo</th>
      <th>Odontograma</th>
        <th>Servicio</th>
        <th>Fecha Hora</th>
        <th>OPCIONES</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($consultas as $consulta)
      <tr>
    
        <td>{{ $consulta->pacienteid }} </td>
        <td>{{ $consulta->odontologoid }} </td>
        <td>{{ $consulta->odontogramaid }} </td>
        <td>{{ $consulta->servicioid }} </td>
        <td>{{ $consulta->fechahora }}</td>
        <td style="text-align: center">
          @can('consulta.edit')
          <a class="btn btn-success btn-sm" href="{{ route('consulta.edit', $consulta->id) }}">Agregar Odontograma</a>
          @endcan
          @can('consulta.destroy')
          <form action="{{ route('consulta.destroy', $consulta->id) }}" method="post" style="display: inline-block">
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