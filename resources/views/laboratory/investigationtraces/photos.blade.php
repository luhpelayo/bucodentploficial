@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">Imágenes de la Investigación : {{
            $trace->investigation->investigation_code }}</h1>
    </div>
    <div style="text-align: center">
        <a href="{{ route('inv.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
    </div>
    <br>
    @foreach ($photos as $photo)
    <div class="responsive">
        <div class="gallery">
            <a target="_blank" href="{{ asset('/images/'.$photo->investigationphoto_route) }}">
                <img src="{{ asset('/images/'.$photo->investigationphoto_route) }}" alt="photos" width="600" height="400">
          </a>
          <div class="desc">
            <a class="btn btn-success btn-sm" href="{{ route('investigationtrace.downimage', $photo->id) }}">Descargar</a>
            <form action="{{ route('investigationtrace.destroyimage', $photo->id) }}" method="post" style="display: inline-block">
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
        Nota: Es posible Descargar y  Eliminar fotos del seguimiento.
    </span>
</div>
@endsection