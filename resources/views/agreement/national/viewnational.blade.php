@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE CONVENIOS NACIONALES REGISTRADOS</h1>
  </div>
  <div style="text-align: center">
    @can('national.create')
    <a href="{{ route('national.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('national.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('national.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('nat.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Fecha de Convenio</th>
        <th>Nombre de Organización</th>
        <th>Firma UAGRM</th>
        <th>Firma Empresa</th>
        <th>Documento</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($nationals as $national)
      <tr>
        <td>{{ $national->national_date }}</td>
        <td>{{ $national->national_organization }}</td>
        <td>{{ $national->national_uagrm }}</td>
        <td>{{ $national->national_company }}</td>
        <td style="text-align: center">
          @if(!empty($national->national_document))
          <a class="btn btn-warning btn-sm" target="_blank"
            href="{{ asset('/documents/'.$national->national_document)}}">VER</a>
          @endif
        </td>
        <td style="text-align: center">
          @can('national.edit')
          <a class="btn btn-success btn-sm" href="{{ route('national.edit', $national->id) }}">Editar</a>
          @endcan
          @can('national.destroy')
          <form action="{{ route('national.destroy', $national->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina un Convenio Nacional todos los registros que dependen de dicho Convenio tambien seran
      eliminados.
    </span>
  </div>
</div>
@endsection