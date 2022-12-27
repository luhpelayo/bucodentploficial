@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE MODELOS DE CARTAS REGISTRADAS</h1>
  </div>
  <div style="text-align: center">
    @can('letter.create')
    <a href="{{ route('letter.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('letter.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('letter.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('lett.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Área</th>
        <th>Documento</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($letters as $letter)
      <tr>
        <td>{{ $letter->letter_code }}</td>
        <td>{{ $letter->letter_name }}</td>
        <td>{{ $letter->letter_date }}</td>
        <td>{{ $letter->area->area_name }}</td>
        <td style="text-align: center">
          @if(!empty($letter->letter_document))
          <a class="btn btn-warning btn-sm" target="_blank"
            href="{{ asset('/documents/'.$letter->letter_document)}}">VER</a>
          @endif
        </td>
        <td style="text-align: center">
          @can('letter.edit')
          <a class="btn btn-success btn-sm" href="{{ route('letter.edit', $letter->id) }}">Editar</a>
          @endcan
          @can('letter.destroy')
          <form action="{{ route('letter.destroy', $letter->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina una Carta registrada todos los registros que dependen de dicha Carta tambien seran
      eliminados.
    </span>
  </div>
</div>
@endsection