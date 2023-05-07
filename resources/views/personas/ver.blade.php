@extends('layouts.app')
@section('title')
    Ver Persona
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Datos Propietario y/o Conductor</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                            
                   
                            @if ($errors->any())                                                
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                <strong>¡Revise los campos!</strong>                        
                                    @foreach ($errors->all() as $error)                                    
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach                        
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            @endif

                            <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                           <label for="nombres">Nombres: {{ $persona->nombres }}</label>
                                           <!-- <input type="text" name="nombres" class="form-control" value="{{ $persona->nombres }}"> -->
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="apellidos">Apellidos: {{ $persona->apellidos }}</label>
                                            <!-- <input class="form-control" type="text" name="apellidos"  value="{{ $persona->apellidos }}"> -->
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="identificacion">Identificaci&oacuten : {{ $persona->identificacion }}</label>
                                            <!-- <input class="form-control" type="text" name="identificacion"  value="{{ $persona->identificacion }}"> -->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fecha_expedicion">Fecha de Expedici&oacuten C&eacutedula: {{ $persona->fecha_expedicion }}</label>
                                            <!-- <input class="form-control" type="date" name="fecha_expedicion"  value="{{ $persona->fecha_expedicion }}"> -->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="lugar_expedicion">Lugar de Expedici&oacuten C&eacutedula: {{ $persona->lugar_expedicion }}</label>
                                            <!--<input class="form-control" type="text" name="lugar_expedicion"  value="{{ $persona->lugar_expedicion }}">-->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fecha_nacimiento">Fecha de Nacimiento : {{ $persona->fecha_nacimiento }}</label>
                                            <!--<input class="form-control" type="date" name="fecha_nacimiento"  value="{{ $persona->fecha_nacimiento }}">-->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="direccion">Direcci&oacuten: {{ $persona->direccion }}</label>
                                            <!--<input class="form-control" type="text" name="direccion"  value="{{ $persona->direccion }}">-->
                                        </div>
                                    </div>
                                  
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="ciudad">Ciudad: {{ $persona->ciudad }}</label><br> 
                                            <!--<input class="form-control" type="text" name="ciudad"  value="{{ $persona->ciudad }}">-->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="celular">Numero Telefono/Celular: {{ $persona->celular }}</label>
                                            <!--<input class="form-control" type="text" name="celular"  value="{{ $persona->celular }}">-->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_ingreso">Fecha de Ingreso: {{ $persona->fec_ingreso }}</label>
                                            <!--<input class="form-control" type="date" name="fec_ingreso"  value="{{ $persona->fec_ingreso }}">-->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="tipo_contrato">Tipo de Contrato: {{ $persona->tipo_contrato }}</label>
                                            <!--<input class="form-control" type="text" name="tipo_contrato"  value="{{ $persona->tipo_contrato }}">-->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_contrato">Fecha del Contrato: {{ $persona->fec_contrato }}</label>
                                            <!--<input class="form-control" type="date" name="fec_contrato"  value="{{ $persona->fec_contrato }}">-->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_term_contrato">Fecha Terminaci&oacuten del Contrato: {{ $persona->fec_term_contrato }}</label>
                                            <!--<input class="form-control" type="date" name="fec_term_contrato"  value="{{ $persona->fec_term_contrato }}">-->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="asociado">Asociado: {{ $persona->asociado }}</label>
                                            <!--{!! Form::select('asociado', ['Si' => 'Si', 'No' => 'No'], $persona->asociado, ['class' => 'select2 form-control']) !!}-->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="curso_cooperativismo">Curso Cooperativismo: {{ $persona->curso_cooperativismo }} </label>
                                            <!--<input class="form-control" type="text" name="curso_cooperativismo"  value="{{ $persona->curso_cooperativismo }}">-->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="nivel_educativo">Nivel Educativo: {{ $persona->nivel_educativo }}</label>
                                            <!--<input class="form-control" type="text" name="nivel_educativo"  value="{{ $persona->nivel_educativo }}">-->
                                        </div>
                                    </div>
                                     <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="estado_civil">Estado Civil: {{ $persona->estado_civil }}</label>
                                            <!--<input class="form-control" type="text" name="estado_civil"  value="{{ $persona->estado_civil }}">-->
                                        </div>
                                    </div>
                                     <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="categoria_licencia">Categoria Licencia: {{ $persona->categoria_licencia }}</label>
                                            <!--<input class="form-control" type="text" name="categoria_licencia"  value="{{ $persona->categoria_licencia }}">-->
                                        </div>
                                    </div>
                                     <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_venc_licencia">Nivel Educativo: {{ $persona->fec_venc_licencia }}</label>
                                            <!--<input class="form-control" type="date" name="fec_venc_licencia"  value="{{ $persona->fec_venc_licencia }}">-->
                                        </div>
                                    </div>
                                      <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="restric_licencia">Restricciones de la Licencia: {{ $persona->restric_licencia }}</label>
                                            <!--<input class="form-control" type="date" name="restric_licencia"  value="{{ $persona->restric_licencia }}">-->
                                        </div>
                                    </div>
                                      <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="rh">RH: {{ $persona->rh }}</label>
                                            <!--<input class="form-control" type="date" name="rh"  value="{{ $persona->rh }}">-->
                                        </div>
                                    </div>
                                      <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="EPS">EPS: {{ $persona->EPS }}</label>
                                            <!--<input class="form-control" type="text" name="EPS"  value="{{ $persona->EPS }}">-->
                                        </div>
                                    </div>
                                      <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="ARL">ARL: {{ $persona->ARL }}</label>
                                            <!--<input class="form-control" type="text" name="ARL"  value="{{ $persona->ARL }}">-->
                                        </div>
                                    </div>
                                      <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="AFP">AFP: {{ $persona->AFP }}</label>
                                            <!--<input class="form-control" type="text" name="AFP"  value="{{ $persona->AFP }}">-->
                                        </div>
                                    </div>
                                      <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fondo_cesantias">Fondo Cesantias: {{ $persona->fondo_cesantias }}</label>
                                            <!--<input class="form-control" type="text" name="fondo_cesantias"  value="{{ $persona->fondo_cesantias }}">-->
                                        </div>
                                    </div>
                                      <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="exp_conduccion">Experiencia en Conducción: {{ $persona->exp_conduccion }}</label>
                                            <!--<input class="form-control" type="text" name="exp_conduccion"  value="{{ $persona->exp_conduccion }}">-->
                                        </div>
                                    </div>

                                     <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="propietario">Propietario: {{ $persona->propietario }}</label>
                                            <!--<input class="form-control" type="text" name="propietario"  value="{{ $persona->propietario }}">-->
                                        </div>
                                    </div>

                                     <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="conductor">Conductor: {{ $persona->conductor }}</label>
                                            <!--<input class="form-control" type="text" name="conductor"  value="{{ $persona->conductor }}">-->
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones: {{ $persona->observaciones }} </label>
                                            <!--<input class="form-control" type="text" name="observaciones"  value="{{ $persona->observaciones }}">-->
                                        </div>
                                    </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
