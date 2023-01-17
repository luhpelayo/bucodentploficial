@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">Documentos de la Visita Tecnica</h1>
    </div>
    <div style="text-align: center">
        <a href="{{ route('archivo.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
    </div>
    <br>
    @foreach ($documents as $document)
    <div class="responsive">
        <div class="gallery">
            <embed src="{{ asset('/documents/'.$document->visitdocument_route) }}" width="264" height="400" type="application/pdf">
          <div class="desc">
            <a class="btn btn-success btn-sm" href="{{ route('archivo.downpdf', $document->id) }}">Descargar</a>
            <form action="{{ route('archivo.destroypdf', $document->id) }}" method="post" style="display: inline-block">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger btn-sm delete-confirm" value="Eliminar">
            </form>
        </div>
        </div>
      </div>
    @endforeach
</div>
<br>
<div style="text-align: center">
    <span style="color: red">
        Nota: Es posible Descargar y Eliminar Documentos.
    </span>
</div>
@endsection