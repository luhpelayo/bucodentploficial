@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE CATEGORIAS REGISTRADAS</h1>
  </div>
  <div style="text-align: center">
    @can('category.create')
    <a href="{{ route('category.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('category.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('category.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('categ.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
        <td>{{ $category->category_name }}</td>
        <td>{{ $category->category_description }}</td>
        <td style="text-align: center">
          @can('category.edit')
          <a class="btn btn-success btn-sm" href="{{ route('category.edit', $category->id) }}">Editar</a>
          @endcan
          @can('category.destroy')
          <form action="{{ route('category.destroy', $category->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina una Categoría todos los registros que dependen de dicha Categoría tambien seran eliminados.
    </span>
  </div>
</div>
@endsection