@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE VISITAS TECNICAS REGISTRADAS</h1>
  </div>
  <div style="text-align: center">
    @can('visit.create')
    <a href="{{ route('visit.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('visit.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('visit.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('visit.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Fecha Visita</th>
        <th>Materia--Grupo</th>
        <th>Responsable UAGRM</th>
        <th>Empresa Visitada</th>
        <th>Responsable EMPRESA</th>
        <th>Documentos</th>
        <th>Imagenes</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($visits as $visit)
      <tr>
        <td>{{ $visit->visit_date }}</td>
        <td>{{ $visit->matter->matter_initial }} {{ $visit->matter->matter_name }}--{{ $visit->matter->matter_group }}
        </td>
        <td>{{ $visit->visit_subjectuagrm }}</td>
        <td>{{ $visit->visit_company }}</td>
        <td>{{ $visit->visit_subjectcompany }}</td>
        <td style="text-align: center"><a class="btn btn-primary btn-sm" href="{{ route('visit.showpdfs', $visit->id) }}">VER</a></td>
        <td style="text-align: center"><a class="btn btn-info btn-sm" href="{{ route('visit.showimages', $visit->id) }}">VER</a></td>
        <td style="text-align: center">
          <a class="btn btn-success btn-sm" href="{{ route('visit.files', $visit->id) }}">Adjuntar</a>
          @can('visit.edit')
          <a class="btn btn-warning btn-sm" href="{{ route('visit.edit', $visit->id) }}">Editar</a>
          @endcan
          @can('visit.destroy')
          <form action="{{ route('visit.destroy', $visit->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina una Visita Registrada todos los registros que dependen de dicha Visita tambien seran
      eliminadas.
    </span>
  </div>
</div>
@endsection