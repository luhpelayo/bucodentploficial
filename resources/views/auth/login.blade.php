@extends('layouts.layoutlogin')
@section('content')
<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="images/LogoLogin.png" alt="Image">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Ingresar al <strong>Portal</strong></h3>
              <p class="mb-4">Por Favor Ingrese de forma Correcta su nombre de Usuario y Contraseña.</p>
            </div>
            <form action="{{ route('login.store') }}" method="POST">
              @csrf
              <div class="form-group first">
                <label for="username">Nombre de Usuario</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="form-group last mb-4">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="d-flex mb-5 align-items-center">
                <span class="ml-auto"><a target="_blank" href="https://wa.me/+59171308634?text=Me%20gustaria%20cambiar%20mi%20password%20del%20portal%20de%20Ing%20Industrial" class="forgot-pass">Olvidaste tu Contraseña?</a></span> 
              </div>
              @error('message')
              <div style="text-align:center">
                <span style="color: red">¡Datos Incorrectos, Intente de Nuevo!</span>
              </div>
              @enderror
              <input type="submit" value="Iniciar" class="btn text-white btn-block btn-primary">
            </form>
            </div>
          </div>
        </div> 
      </div>
    </div>
  </div>
@endsection
@section('js')
@endsection