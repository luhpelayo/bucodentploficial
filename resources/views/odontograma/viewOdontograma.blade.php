@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE odontogramas</h1>
  </div>
  <div style="text-align: center">
    @can('odontograma.create')
    <a href="{{ route('odontograma.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('odontograma.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('odontograma.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('odontograma.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        
        <th>NRO ODONTOGRAMA</th>
   
        <th>Diagnostico</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>OPCIONES</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($odontogramas as $odontograma)
      <tr>
    
        <td>{{ $odontograma->id }} </td>
     
        <td>{{ $odontograma->diagnostico }} </td>
        <td>{{ $odontograma->fechainicio }}</td>
        <td>{{ $odontograma->fechafin}}</td>
        <td style="text-align: center">
          @can('odontograma.edit')
          <a class="btn btn-success btn-sm" href="{{ route('odontograma.edit', $odontograma->id) }}">Editar/Visualizar</a>
          @endcan
          @can('odontograma.destroy')
          <form action="{{ route('odontograma.destroy', $odontograma->id) }}" method="post" style="display: inline-block">
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