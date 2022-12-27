@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE PROCEDIMIENTOS REGISTRADOS</h1>
  </div>
  <div style="text-align: center">
    @can('procedure.create')
    <a href="{{ route('procedure.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('procedure.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('procedure.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('proc.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Codigo</th>
        <th>Nombre de Procedimiento</th>
        <th>Fecha</th>
        <th>Área</th>
        <th>Documento</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($procedures as $procedure)
      <tr>
        <td>{{ $procedure->procedure_code }}</td>
        <td>{{ $procedure->procedure_name }}</td>
        <td>{{ $procedure->procedure_date }}</td>
        <td>{{ $procedure->area->area_name }}</td>
        <td style="text-align: center">
          @if(!empty($procedure->procedure_document))
          <a class="btn btn-warning btn-sm" target="_blank"
            href="{{ asset('/documents/'.$procedure->procedure_document)}}">VER</a>
          @endif
        </td>
        <td style="text-align: center">
          @can('procedure.edit')
          <a class="btn btn-success btn-sm" href="{{ route('procedure.edit', $procedure->id) }}">Editar</a>
          @endcan
          @can('procedure.destroy')
          <form action="{{ route('procedure.destroy', $procedure->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina un Procedimiento registrado todos los registros que dependen de dicho Procedimiento tambien
      seran eliminados.
    </span>
  </div>
</div>
@endsection