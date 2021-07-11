@extends('layouts.app')

@section('content')


@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
  {{  Session::get('Mensaje') }}  
</div>

@endif



      <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
            <h1>Listado de Centros</h1>
          </div>

         
             
     <!-- /.card-header -->
     <div class="card-body">
       <table id="listaCentros" class="table table-bordered table-striped dataTable table-hover" role="grid" aria-describedby="listamiembros">
                <thead>
                    <tr>
                      
                      <th>Estados</th>
                      <th>Municipios</th>
                      <th>Parrquias</th>
                      <th>Centros</th>
                      <th>Direccion</th>
                      <th>Mesas</th>
                      <th>Elecotores</th>
                        
                    </tr>     
                  </thead>
                  <tbody>
                    @foreach($centros as $centro)
                      <tr>       
                        <td><a href="/centros/create">{{$centro->estado}}</a></td>
                        <td>{{$centro->municipio}}</td>
                        <td>{{$centro->parroquia}}</td>
                        <td>{{$centro->centro}}</td>
                        <td>{{$centro->direccion}}</td>
                        <td>{{$centro->mesas}}</td>
                        <td>{{$centro->electores}}</td>                       
                        <td>

                          <a href="{{url('/centros/'.$centro->id.'/edit')}}" class="btn btn-block btn-warning">
                                Editar
                          </a>
                          <br>
                             <form method="post" action="{{url('/centros/' .$centro->id)}}">
                            {{csrf_field()}}
                              {{method_field('Delete')}}
                                <button type="submit" class="btn btn-block btn-danger" onclick="return confirm('Desea Borrar?')">Borrar</button>
                           
                          </form>

                        </td>
                      </tr>
                    @endforeach
                  </tbody>  
            </table>
            {{ $centros->links() }}
               </div>
              <!-- /.card-body -->
   

<!-- REQUIRED SCRIPTS SECCION-->

<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
       

@endsection
