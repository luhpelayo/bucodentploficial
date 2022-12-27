@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">Imágenes del Laboratorio </h1>
    </div>
    <div style="text-align: center">
        <a href="{{ route('pho.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
    </div>
    <br>
    @foreach ($labphotos as $labphoto)
    <div class="responsive">
        <div class="gallery">
            <a target="_blank" href="{{ asset('/images/'.$labphoto->laboratoryphoto_route) }}">
                <img src="{{ asset('/images/'.$labphoto->laboratoryphoto_route) }}" alt="photos" width="600" height="400">
          </a>
          <div class="desc">
            <a class="btn btn-success btn-sm" href="{{ route('photolab.downimage', $labphoto->id) }}">Descargar</a>
            <form action="{{ route('photolab.destroyimage', $labphoto->id) }}" method="post" style="display: inline-block">
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
        Nota: Es posible Descargar y  Eliminar fotos del Laboratorio.
    </span>
</div>
@endsection