@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE CONVENIOS INTERNACIONALES REGISTRADOS</h1>
  </div>
  <div style="text-align: center">
    @can('inter.create')
    <a href="{{ route('inter.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('inter.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('inter.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('inter.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
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
      @foreach ($internationals as $international)
      <tr>
        <td>{{ $international->international_date }}</td>
        <td>{{ $international->international_organization }}</td>
        <td>{{ $international->international_uagrm }}</td>
        <td>{{ $international->international_company }}</td>
        <td style="text-align: center">
          @if(!empty($international->international_document))
          <a class="btn btn-warning btn-sm" target="_blank"
            href="{{ asset('/documents/'.$international->international_document)}}">VER</a>
          @endif
        </td>
        <td style="text-align: center">
          @can('inter.edit')
          <a class="btn btn-success btn-sm" href="{{ route('inter.edit', $international->id) }}">Editar</a>
          @endcan
          @can('inter.destroy')
          <form action="{{ route('inter.destroy', $international->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina un Convenio Internacional todos los registros que dependen de dicho Convenio tambien seran
      eliminados.
    </span>
  </div>
</div>
@endsection