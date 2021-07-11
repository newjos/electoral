@extends('layouts.app')

@section('content')
<form action="{{ url('/miembros')}}" method="post">
  {{ csrf_field()}}
  @include('miembros.form', ['Modo'=>'crear'])
</form>

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
    url:"{{ route('miembrosController.fetch') }}",
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