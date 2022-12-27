@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE PROGRAMAS ANALITICOS REGISTRADOS</h1>
  </div>
  <div style="text-align: center">
    @can('program.create')
    <a href="{{ route('program.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('program.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('program.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('prog.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Codigo</th>
        <th>Asignatura</th>
        <th>Sigla-Código</th>
        <th>Nivel</th>
        <th>Créditos</th>
        <th>Elaborado por</th>
        <th>Fecha</th>
        <th>Área</th>
        <th>Documento</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($programs as $program)
      <tr>
        <td>{{ $program->program_code }}</td>
        <td>{{ $program->program_name }}</td>
        <td>{{ $program->program_acronym }}</td>
        <td>{{ $program->program_level }}</td>
        <td>{{ $program->program_credit }}</td>
        <td>{{ $program->program_designed }}</td>
        <td>{{ $program->program_date }}</td>
        <td>{{ $program->area->area_name }}</td>
        <td style="text-align: center">
          @if(!empty($program->program_document))
          <a class="btn btn-warning btn-sm" target="_blank"
            href="{{ asset('/documents/'.$program->program_document)}}">VER</a>
          @endif
        </td>
        <td style="text-align: center">
          @can('program.edit')
          <a class="btn btn-success btn-sm" href="{{ route('program.edit', $program->id) }}">Editar</a>
          @endcan
          @can('program.destroy')
          <form action="{{ route('program.destroy', $program->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina un Programa Analítico registrado todos los registros que dependen de dicho Programa tambien
      seran eliminados.
    </span>
  </div>
</div>
@endsection