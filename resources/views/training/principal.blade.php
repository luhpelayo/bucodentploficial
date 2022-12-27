@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">MODULO DE CURSOS/TALLERES</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('tra.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('tra.create')}}">
                        <img src="{{URL::asset('icons/addtraining.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar Curso/Taller</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Aqui se registra toda la informacion importante del curso y ademas es posible adjuntar
                            documentacion que respalda al curso.
                        </p>
                        <a href="{{ route ('tra.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('assist.create')}}">
                        <img src="{{URL::asset('icons/addlist.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Listado de Estudiantes</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se crea el listado de estudiantes que asisitieron a los cursos y se agrega informacion del pago .
                        </p>
                        <a href="{{ route ('assist.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('temp.create')}}">
                        <img src="{{URL::asset('icons/addcertificate.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Crear Certificado</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            En este modulo se creara el certificado de participación digital de cada curso de forma independiente.
                        </p>
                        <a href="{{ route ('temp.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @can('tra.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('tra.show')}}">
                        <img src="{{URL::asset('icons/viewtraining.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Cursos/Talleres</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se puede visualizar toda la información registrada y ademas descargar toda la documentación
                            adjuntada.
                        </p>
                        <a href="{{ route ('tra.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
                    </a>
                </div>
            </div>
            @endcan
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('assist.show')}}">
                        <img src="{{URL::asset('icons/viewlist.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Visualizar Listas</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se puede visualizar toda la información de los estudiantes que asistieron a los diferentes cursos impartidos por la carrera.
                        </p>
                        <a href="{{ route ('assist.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('temp.show')}}">
                        <img src="{{URL::asset('icons/viewcertificate.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Certificados</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Muestra todos los certificados creados de forma digital para luego ser asignados a los estudiantes de los cursos.
                        </p>
                        <a href="{{ route ('temp.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('portal.index')}}">
                        <img src="{{URL::asset('icons/back.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Volver Atrás</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Presiona en el botón para regresar a la página anterior o puedes utilizar el menu ubicado en
                            la parte de arriba.
                        </p>
                        <a href="{{ route ('portal.index')}}" class="btn btn-success" title="Ir">Volver</a>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection