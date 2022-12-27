@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR CATEGORIA</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="{{ asset('/images/industrial.png') }}"  alt="LOGO">
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Editar Información de la Categoría</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('category.update', $category->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de la Categoría:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="category_name" id="category_name" type="text" value="{{ $category->category_name }}">
                        @error('category_name')
                        <small class="text-danger">¡Introduzca Nombre de Categoría!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Descripción de la Categoría:</label>
                    <div class="col-lg-8">
                        <textarea cols="86" rows="4" name="category_description" id="category_description">{{ $category->category_description }}</textarea>
                            @error('category_description')
                        <small class="text-danger">¡Introduzca una Descripción!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center" >
                    <span style="color: red">
                        Nota: No actualice datos ya existentes y trate de anotar una pequeña descripción.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar Categoria" class="btn btn-success">
                <a href="{{ route('categ.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection