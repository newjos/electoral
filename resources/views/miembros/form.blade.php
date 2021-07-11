
                  @if(Session::has('Mensaje'))
                  <div class="alert alert-success" role="alert">
                    {{  Session::get('Mensaje') }}  
                  </div>

                  @endif
 
                      
                  @if(count($errors)>0)

                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </div>
                    @endif
 
                        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Datos de los Miembros</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
         <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Cedula" class="control-label" >{{ 'Cedula' }}</label>
                 <div class="input-group-append">
                  
                   <input type="text" class="form-control {{$errors->has('cedula')?'is-invalid':''}}" name="cedula" id="cedula" style="width: 30%;" placeholder="ejemplo:12345678"  value="{{isset($miembro->cedula)?$miembro->cedula:old('cedula')}}">
                           
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                                </button>
                   
                     </div> 
                        {!! $errors->first('cedula','<div class="invalid-feedback">El Campo Cedula es Requerido</div>') !!}
                     
                </div>
                       
                      
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="Nombre" class="control-label" >{{ 'Nombre' }}</label>
                        <input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" id="nombre" style="width: 50%;" placeholder="ejemplo: pedro perez" 
                        value="{{isset($miembro->nombre)?$miembro->nombre:old('nombre')}}"> 
                      {!! $errors->first('nombre','<div class="invalid-feedback">El Campo Nombre es Requerido</div>') !!}
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="Telefono" class="control-label" >{{ 'Telefono' }}</label>
                        <input type="text" class="form-control {{$errors->has('telefono')?'is-invalid':''}}" name="telefono" id="telefono" style="width: 70%;"
                        value="{{isset($miembro->telefono)?$miembro->telefono:old('telefono')}}">
                        {!! $errors->first('telefono','<div class="invalid-feedback">El Campo Telefono es Requerido</div>') !!}
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="Correo" class="control-label" >{{ 'Correo' }}</label>
                        <input type="email" class="form-control {{$errors->has('correo')?'is-invalid':old('correo')}}" name="correo" id="correo" style="width: 70%;"
                        value="{{isset($miembro->correo)?$miembro->correo:''}}">
                        {!! $errors->first('correo','<div class="invalid-feedback">El Campo Correo es Requerido</div>') !!}
                </div>
                <!-- /.form-group -->

      <div class="form-group">
        <label for="Cargo" class="control-label" >{{ 'Cargo' }}</label>
           <select class="form-control input-lg dynamic {{$errors->has('cargo')?'is-invalid':''}}" name="cargo" id="cargo" style="width: 50%;"value="{{isset($miembro->cargo)?$miembro->cargo:old('cargo')}}">
                
                <option value="">Seleccione Cargo...</option>  

              @foreach($cargolist ?? '' as $cargo)
               <option value="{{ $cargo->cargo}}">{{ $cargo->cargo}}</option>
              @endforeach

           </select>
      {!! $errors->first('cargo','<div class="invalid-feedback">El Campo Cargo es Requerido</div>') !!}
                </div>
                <!-- /.form-group -->

             </div>
              <!-- /.col -->
      <div class="col-md-6">
        <!-- /.form-group -->
           <div class="form-group">
             <label>Estado</label>
                <select class="form-control input-lg dynamic {{$errors->has('estado')?'is-invalid':''}}" name="estado" id="estado" style="width: 50%;" value=" {{isset($miembro->estado)?$miembro->estado:old('estado')}}" data-dependent ="municipio">
                          
            <option value="">Seleccione Estado...</option>  
              @foreach($country_list ?? '' as $miembro)
               <option value="{{ $miembro->estado}}">{{ $miembro->estado}}</option>
              @endforeach
                                
                 </select>
                    {!! $errors->first('estado','<div class="invalid-feedback">El Campo Estado es Requerido</div>') !!}
      </div>
     
                <!-- /.form-group -->

     <div class="form-group">
      <label for="Municipio" class="control-label" >{{ 'Municipio' }}</label>
       <select class="form-control input-lg dynamic {{$errors->has('municipio')?'is-invalid':''}}" name="municipio" id="municipio" style="width: 50%;" 
        value="{{isset($miembro->municipio)?$miembro->municipio:old('municipio')}}" data-dependent ="parroquia">
                                                                        
                          <option value="">Seleccione Municipio...</option>  
                                  
                        </select>
            {!! $errors->first('municipio','<div class="invalid-feedback">El Campo Municipio es Requerido</div>') !!}
                </div>
                 <!-- /.form-group -->

    <div class="form-group">
        <label for="Parroquia" class="control-label" >{{ 'Parroquia' }}</label>
             <select class="form-control  input-lg dynamic {{$errors->has('parroquia')?'is-invalid':''}}" name="parroquia" id="parroquia" style="width: 50%;" value="{{isset($miembro->parroquia)?$miembro->parroquia:old('parroquia')}}">
                        
                 <option value="">Seleccione Parroquia...</option> 
               
             </select>
             {!! $errors->first('parroquia','<div class="invalid-feedback">El Campo Parroquia es Requerido</div>') !!}
                </div>
                  <!--/.form-group -->
                  <div class="form-group">
                    <label for="Centro" class="control-label" >{{ 'Centro' }}</label>
                     <textarea class="form-control" rows="3"  
                         {{$errors->has('centro')?'is-invalid':''}}" name="centro" id="centro" style="width: 80%;"
                        value="{{isset($miembro->centro)?$miembro->centro:old('centro')}}" >
                                                
                                  
                        </textarea>
                        {!! $errors->first('centro','<div class="invalid-feedback">El Campo Centro es Requerido</div>') !!}
                  </div>
                <!-- /.form-group -->
                 <div class="form-group">
                  <label for="Mesa" class="control-label" >{{ 'Mesa' }}</label>
                        <select type="text" class="form-control" name="mesa" id="mesa" style="width: 30%;"
                        value="{{isset($miembro->mesa)?$miembro->mesa:old('mesa')}}">
                                    <option value="0">Mesa...</option>  
                                    <option value="1">COORD. NACIONAL</option>
                                    <option value="22">COORD. REGIONAL</option>
                        </select>
                </div>
                <!-- /.form-group -->

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

<!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Datos para los Aportes</h3>

        </div>
    
    <div class="row">
      <div class="col-12 col-sm-6">
         <div class="form-group">
           <label for="Banco" class="control-label" >{{ 'Banco' }}</label>
               <select class="form-control {{$errors->has('banco')?'is-invalid':''}}" name="banco" id="banco" style="width: 50%;"
                        value="{{isset($miembro->banco)?$miembro->banco:old('banco')}}">

                <option value="">Seleccione el Banco...</option>  
              @foreach($bancolist ?? '' as $banco)
               <option value="{{ $banco->banco}}">{{ $banco->banco}}</option>
              @endforeach               
                                      
                                  </select>
                        {!! $errors->first('banco','<div class="invalid-feedback">El Campo Banco es Requerido</div>') !!}
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="titularCta" class="control-label" >{{ 'Titular Cta' }}</label>
                        <input type="text" class="form-control {{$errors->has('titularCta')?'is-invalid':''}}" name="titularCta" id="titularCta" style="width: 50%;"
                        value="{{isset($miembro->titularCta)?$miembro->titularCta:old('titularCta')}}">
                        {!! $errors->first('titularCta','<div class="invalid-feedback">El Campo Titular Cta es Requerido</div>') !!}
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label for="Cuenta" class="control-label" >{{ 'Cuenta' }}</label>
                        <input type="text" class="form-control {{$errors->has('cuenta')?'is-invalid':''}}" name="cuenta" id="cuenta" style="width: 60%;"
                        value="{{isset($miembro->cuenta)?$miembro->cuenta:old('cuenta')}}">
                        {!! $errors->first('cuenta','<div class="invalid-feedback">El Campo Cuenta es Requerido</div>') !!}
                </div>
                <!-- /.form-group -->
                 <div class="form-group">
                  <label for="cedulaCta" class="control-label" >{{ 'Cedula Cta' }}</label>
                        <input type="text" class="form-control {{$errors->has('cedulaCta')?'is-invalid':''}}" name="cedulaCta" id="cedulaCta" style="width: 30%;"
                        value="{{isset($miembro->cedulaCta)?$miembro->cedulaCta:old('cedulaCta')}}">
                        {!! $errors->first('cedulaCta','<div class="invalid-feedback">El Campo Cedula Cta es Requerido</div>') !!}
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          
          <center><input type="submit" class="btn btn-success" value=" {{ $Modo=='crear' ? 'Agregar' : 'Modificar'}} " style="width: 20%;"> 
         
            <a class="btn btn-primary" href="{{url('/miembros')}}" style="width: 20%;">Regresar</a>
         </center>
         <br>
        </div><!-- /.card -->
        
      </div><!-- /.form -->
  </div>

</section>


      <!-- REQUIRED SCRIPTS SECCION-->

<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

