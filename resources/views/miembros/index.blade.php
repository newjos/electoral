@extends('layouts.app')

@section('content')


@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
  {{  Session::get('Mensaje') }}  
</div>

@endif
<head>
  <!--Scripts Searchbusqueda-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel= "stylesheet" href= "https //maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
    
</head>

      <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de Miembros</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="miembros/create" class="btn btn-block btn-primary" >Agregar Nuevo Miembro</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <!-- BUSQUEDA FORM -->
    <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
         <input class="form-control form-control-navbar" type="text" id="buscar" name="buscar" placeholder="Buscar por Cedula" aria-label="Search">
        <div class="input-group-append">
           <button class="btn btn-info btn-flat" type="submit">
             <i class="fas fa-search"></i>
            
          </button>
          
        </div>
       
      </div>
    </form>
            
     <!-- /.card-header -->
     <div class="card-body">
       <table id="listamiembros" class="table table-bordered table-striped dataTable table-hover" role="grid" aria-describedby="listamiembros">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Cedula</th>
                      <th>Nombre</th>
                      <th>Cargo</th>
                      <th>Estado</th>
                      <th>Municipio</th>
                      <th>Parroquia</th>
                      <th>Telefono</th>
                      <th>Correo</th>
                      <th>Centro</th>
                      <th>Mesa</th>
        
                    </tr>     
                  </thead>
                  <tbody>
                    @foreach($miembros as $miembro)
                      <tr>        
                        <td>{{$miembro->id}}</td>
                        <td>{{$miembro->cedula}}</td>
                        <td>{{$miembro->nombre}}</td>
                        <td>{{$miembro->cargo}}</td>
                        <td>{{$miembro->estado}}</td>
                        <td>{{$miembro->municipio}}</td>
                        <td>{{$miembro->parroquia}}</td>
                        <td>{{$miembro->telefono}}</td>
                        <td>{{$miembro->correo}}</td>
                        <td>{{$miembro->centro}}</td>
                        <td>{{$miembro->mesa}}</td>
                        <td>

                          <a href="{{url('/miembros/'.$miembro->id.'/edit')}}" class="btn btn-block btn-warning">
                                Editar
                          </a>
                          <br>
                             <form method="post" action="{{url('/miembros/' .$miembro->id)}}">
                            {{csrf_field()}}
                              {{method_field('Delete')}}
                                <button type="submit" class="btn btn-block btn-danger" onclick="return confirm('Desea Borrar?')">Borrar</button>
                           
                          </form>

                        </td>
                      </tr>
                    @endforeach
                  </tbody>  
            </table>
            {{ $miembros->links() }}
               </div>
              <!-- /.card-body -->
   


<!-- REQUIRED SCRIPTS SECCION-->

<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
       

@endsection
