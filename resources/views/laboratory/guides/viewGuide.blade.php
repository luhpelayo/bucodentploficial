@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE GUIAS DE MATERIAS REGISTRADAS</h1>
  </div>
  <div style="text-align: center">
    @can('guide.create')
    <a href="{{ route('guide.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('guide.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('guide.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('gui.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Nombre Práctica</th>
        <th>Materia--Grupo</th>
        <th>Docente Titular</th>
        <th>Documento</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($guides as $guide)
      <tr>
        <td>{{ $guide->guide_name }}</td>
        <td>{{ $guide->matter->matter_initial }} {{ $guide->matter->matter_name }}--{{ $guide->matter->matter_group }}
        </td>
        <td>{{ $guide->matter->matter_teacher }}</td>
        <td style="text-align: center">
          @if(!empty($guide->guide_document))
          <a class="btn btn-warning btn-sm" target="_blank"
            href="{{ asset('/documents/'.$guide->guide_document)}}">VER</a>
          @endif
        </td>
        <td style="text-align: center">
          @can('guide.edit')
          <a class="btn btn-success btn-sm" href="{{ route('guide.edit', $guide->id) }}">Editar</a>
          @endcan
          @can('guide.destroy')
          <form action="{{ route('guide.destroy', $guide->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina una Guía registrada todos los registros que dependen de dicha Guía tambien seran
      eliminados.
    </span>
  </div>
</div>
@endsection