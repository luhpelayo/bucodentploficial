@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE TRABAJOS FINALES DE GRADO REGISTRADOS</h1>
  </div>
  <div style="text-align: center">
    @can('tomo.create')
    <a href="{{ route('tomo.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('tomo.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('tomo.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('tomo.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Codigo</th>
        <th>Estudiante</th>
        <th>Título</th>
        <th>Modalidad</th>
        <th>Categoría</th>
        <th>Asesor</th>
        <th>Año</th>
        <th>Documento</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tomos as $tomo)
      <tr>
        <td>{{ $tomo->tomo_code }}</td>
        <td>{{ $tomo->student->student_lastname }} {{ $tomo->student->student_name }} </td>
        <td>{{ $tomo->tomo_title }}</td>
        <td>{{ $tomo->modality->modality_name }}</td>
        <td>{{ $tomo->category->category_name }}</td>
        <td>{{ $tomo->tomo_consultant }}</td>
        <td>{{ $tomo->tomo_year }}</td>
        <td style="text-align: center">
          @if(!empty($tomo->tomo_document))
          <a class="btn btn-warning btn-sm" target="_blank"
            href="{{ asset('/documents/'.$tomo->tomo_document)}}">VER</a>
          @endif
        </td>
        <td style="text-align: center">
          @can('tomo.edit')
          <a class="btn btn-success btn-sm" href="{{ route('tomo.edit', $tomo->id) }}">Editar</a>
          @endcan
          @can('tomo.destroy')
          <form action="{{ route('tomo.destroy', $tomo->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina un Tomo registrado todos los registros que dependen de dicho Tomo tambien seran eliminados.
    </span>
  </div>
</div>
@endsection