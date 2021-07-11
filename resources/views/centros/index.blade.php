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
       <table id="listaCentros" class="table table-bordered table-striped dataTable table-hover" role="grid" aria-describedby="listaCentros">
                <thead>
                    <tr>
                      
                      <th>Estados</th>                      
                      <th>Mesas</th>
                      <th>Elecotores</th>
                        
                    </tr>     
                  </thead>
                  <tbody>
                    @foreach($centros as $centro)
                      <tr>       
                        <td><a href="{{url('/centros/show')}}">{{$centro->estado}}</a></td>
                        
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

<script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('centrosController.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

 $('#estado').change(function(){
  $('#municipio').val('');
  $('#parroquia').val('');
 });

 $('#municipio').change(function(){
  $('#parroquia').val('');
});
});
</script>     

@endsection
