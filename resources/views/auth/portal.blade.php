@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">BIENVENIDO AL PORTAL DE BUCODENT
        </h1>
    </div>
    <div class="container">
        <div class="row style_featured">
        @can('consulta.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('consulta.index')}}">
                        <img src="{{URL::asset('icons/consulta.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Consulta</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un consulta, dicha informacion sera
                            utilizada en otros procesos.
                        </p>
                        <a href="{{ route ('consulta.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan

        @can('paciente.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('paciente.index')}}">
                        <img src="{{URL::asset('icons/addpaciente.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Pacientes</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un paciente, dicha informacion sera
                            utilizada en otros procesos.
                        </p>
                        <a href="{{ route ('paciente.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
          
          
            @can('odontologo.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('odontologo.index')}}">
                        <img src="{{URL::asset('icons/odontologo.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Odontologos</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Aqui se puede almacenar los documentos de respaldo (fotos e informes) de las visitas de los
                            odontologos.
                        </p>
                        <a href="{{ route ('odontologo.index')}}" class="btn btn-success" title="More">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('servicio.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('servicio.index')}}">
                        <img src="{{URL::asset('icons/servicios.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Servicios</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Aqui se puede almacenar los documentos de respaldo (fotos e informes) de las visitas de los
                            servicios.
                        </p>
                        <a href="{{ route ('servicio.index')}}" class="btn btn-success" title="More">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan

          

            @can('dient.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('dient.index')}}">
                        <img src="{{URL::asset('icons/dientes.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Dientes</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un diente, dicha informacion sera
                            utilizada en otros procesos.
                        </p>
                        <a href="{{ route ('dient.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan


            @can('parte.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('parte.index')}}">
                        <img src="{{URL::asset('icons/addpart.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Partes</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un partes, dicha informacion sera
                            utilizada en otros procesos.
                       </p>
                        <a href="{{ route ('parte.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan


            @can('tratamiento.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('tratamiento.index')}}">
                        <img src="{{URL::asset('icons/tratamiento.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">tratamientos</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un tratamientos, dicha informacion sera
                            utilizada en otros procesos.
                        </p>
                        <a href="{{ route ('tratamiento.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan


            @can('odontograma.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('odontograma.index')}}">
                        <img src="{{URL::asset('icons/odontograma.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Odontogramas</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un odontogramas, dicha informacion sera
                            utilizada en otros procesos.
                        </p>
                        <a href="{{ route ('odontograma.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan


            @can('fichaclinica.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('fichaclinica.index')}}">
                        <img src="{{URL::asset('icons/viewpaciente.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">fichaclinicas</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un fichaclinicas, dicha informacion sera
                            utilizada en otros procesos.
                        </p>
                        <a href="{{ route ('fichaclinica.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            
            @can('archivo.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('archivo.index')}}">
                        <img src="{{URL::asset('icons/viewphoto.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">archivos</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un archivos, dicha informacion sera
                            utilizada en otros procesos.
                        </p>
                        <a href="{{ route ('archivo.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('receta.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('receta.index')}}">
                        <img src="{{URL::asset('icons/addlist.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">recetas</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un recetas, dicha informacion sera
                            utilizada en otros procesos.
                        </p>
                        <a href="{{ route ('receta.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan

            @can('recibo.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('recibo.index')}}">
                        <img src="{{URL::asset('icons/1addservicio.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">recibos</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un recibos, dicha informacion sera
                            utilizada en otros procesos.
                        </p>
                        <a href="{{ route ('recibo.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
       

            @can('role.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('role.index')}}">
                        <img src="{{URL::asset('icons/areas.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Servicios</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Aqui se puede almacenar los documentos de respaldo (fotos e informes) de las visitas de los
                            roles.
                        </p>
                        <a href="{{ route ('role.index')}}" class="btn btn-success" title="More">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan

            @can('permission.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('permission.index')}}">
                        <img src="{{URL::asset('icons/viewvisit.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Servicios</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Aqui se puede almacenar los documentos de respaldo (fotos e informes) de las visitas de los
                            permissions.
                        </p>
                        <a href="{{ route ('permission.index')}}" class="btn btn-success" title="More">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan

            @can('role_has_permission.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('role_has_permission.index')}}">
                        <img src="{{URL::asset('icons/visita.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Servicios</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Aqui se puede almacenar los documentos de respaldo (fotos e informes) de las visitas de los
                            role_has_permissions.
                        </p>
                        <a href="{{ route ('role_has_permission.index')}}" class="btn btn-success" title="More">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan

           
    
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('report.index')}}">
                        <img src="{{URL::asset('icons/report.png')}}" alt="" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Reportes y Gráficos</h2>
                        <p style="color: #00BFFF; text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se generan informes estadisticos y Dinamicos sobre cualquier modulo en base a la informacion
                            que usted desee.
                        </p>
                        <a href="{{ route('report.index') }}" class="btn btn-success" title="More">Ingresar</a>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
