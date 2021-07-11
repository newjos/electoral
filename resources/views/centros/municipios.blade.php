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
       <table id="listaCentros" class="table table-bordered table-striped dataTable table-hover" role="grid" aria-describedby="listCentros">
                <thead>
                    <tr>
                                            
                      <th>Municipios</th>
                      
                        
                    </tr>     
                  </thead>
                  <tbody>
                    @foreach($centros as $centro)
                      <tr>       
                        <td><a href="{{url('/centros/show')}}">{{$centro->municipio}}</td>
                                        
                   
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
