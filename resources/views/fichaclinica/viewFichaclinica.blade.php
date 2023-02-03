@extends('layouts.master')
@section('content')

<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE fichaclinicas</h1>
  </div>
  <div style="text-align: center">
    @can('fichaclinica.create')
    <a href="{{ route('fichaclinica.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('fichaclinica.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('fichaclinica.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('fichaclinica.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
      <th>Alergia</th>
      <th>Radiografia</th>
      <th>Archivo</th>
        <th>Consulta</th>
     
        <th>OPCIONES</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($fichaclinicas as $fichaclinica)
      <tr>
      <td>{{ $fichaclinica->alergia}}</td>
      <td>{{ $fichaclinica->radiografia}}</td>
        <td>{{ $fichaclinica->idarchivo }} </td>
        <td>{{ $fichaclinica->consultaid }} </td>
        
        
        <td style="text-align: center">
          
          <a class="btn btn-success btn-sm" href="{{ route('fichaclinica.edit', $fichaclinica->id) }}">editar</a>
       
          @can('fichaclinica.destroy')
          <form action="{{ route('fichaclinica.destroy', $fichaclinica->id) }}" method="post" style="display: inline-block">
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