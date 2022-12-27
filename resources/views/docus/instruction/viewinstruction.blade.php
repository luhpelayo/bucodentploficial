@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE INSTRUCTIVOS REGISTRADOS</h1>
  </div>
  <div style="text-align: center">
    @can('instruction.create')
    <a href="{{ route('instruction.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('instruction.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('instruction.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('inst.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Codigo</th>
        <th>Nombre de Instructivo</th>
        <th>Fecha</th>
        <th>Área</th>
        <th>Documento</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($instructions as $instruction)
      <tr>
        <td>{{ $instruction->instruction_code }}</td>
        <td>{{ $instruction->instruction_name }}</td>
        <td>{{ $instruction->instruction_date }}</td>
        <td>{{ $instruction->area->area_name }}</td>
        <td style="text-align: center">
          @if(!empty($instruction->instruction_document))
          <a class="btn btn-warning btn-sm" target="_blank"
            href="{{ asset('/documents/'.$instruction->instruction_document)}}">PDF</a>
          @endif
        </td>
        <td style="text-align: center">
          @can('instruction.edit')
          <a class="btn btn-success btn-sm" href="{{ route('instruction.edit', $instruction->id) }}">Editar</a>
          @endcan
          @can('instruction.destroy')
          <form action="{{ route('instruction.destroy', $instruction->id) }}" method="post"
            style="display: inline-block">
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
      Nota: Si usted elimina un Instructivo registrado todos los registros que dependen de dicho Instructivo tambien
      seran eliminados.
    </span>
  </div>
</div>
@endsection