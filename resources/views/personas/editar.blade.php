@extends('layouts.app')
@section('title')
    Editar Persona
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Propietario y/o Conductor</h3>
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


                            <form action="{{ route('personas.update',$persona->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                           <label for="nombres">Nombres:</label>
                                           <input type="text" name="nombres" class="form-control" value="{{ $persona->nombres }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="apellidos">Apellidos</label>
                                            <input class="form-control" type="text" name="apellidos"  value="{{ $persona->apellidos }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="identificacion">Identificaci&oacuten</label>
                                            <input class="form-control" type="text" name="identificacion"  value="{{ $persona->identificacion }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fecha_expedicion">Fecha de Expedici&oacuten C&eacutedula</label>
                                            <input class="form-control" type="date" name="fecha_expedicion"  value="{{ $persona->fecha_expedicion }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="lugar_expedicion">Lugar de Expedici&oacuten C&eacutedula</label>
                                            {!! Form::select('ciudad', $ciudades, $persona->lugar_expedicion, ['class' => 'select2 form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                            <input class="form-control" type="date" name="fecha_nacimiento"  value="{{ $persona->fecha_nacimiento }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="direccion">Direcci&oacuten</label>
                                            <input class="form-control" type="text" name="direccion"  value="{{ $persona->direccion }}">
                                        </div>
                                    </div>
                                  
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="ciudad">Ciudad</label><br> 
                                            {!! Form::select('ciudad', $ciudades, $persona->ciudad, ['class' => 'select2 form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="celular">N&uacutemero Telefono/Celular</label>
                                            <input class="form-control" type="text" name="celular"  value="{{ $persona->celular }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_ingreso">Fecha de Ingreso</label>
                                            <input class="form-control" type="date" name="fec_ingreso"  value="{{ $persona->fec_ingreso }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="tipo_contrato">Tipo de Contrato</label>
                                            <input class="form-control" type="text" name="tipo_contrato"  value="{{ $persona->tipo_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_contrato">Fecha del Contrato</label>
                                            <input class="form-control" type="date" name="fec_contrato"  value="{{ $persona->fec_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_term_contrato">Fecha Terminaci&oacuten del Contrato</label>
                                            <input class="form-control" type="date" name="fec_term_contrato"  value="{{ $persona->fec_term_contrato }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="asociado">Asociado</label>
                                            {!! Form::select('asociado', ['Si' => 'Si', 'No' => 'No'], $persona->asociado, ['class' => 'select2 form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="curso_cooperativismo">Curso Cooperativismo</label>
                                            <!--<input class="form-control" type="text" name="curso_cooperativismo"  value="{{ $persona->curso_cooperativismo }}">-->
                                            {!! Form::select('curso_cooperativismo', ['Si' => 'Si', 'No' => 'No'], $persona->curso_cooperativismo, ['class' => 'select2 form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="nivel_educativo">Nivel Educativo</label>
                                            <input class="form-control" type="text" name="nivel_educativo"  value="{{ $persona->nivel_educativo }}">
                                        </div>
                                    </div>
                                     <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="estado_civil">Estado Civil</label>
                                            <input class="form-control" type="text" name="estado_civil"  value="{{ $persona->estado_civil }}">
                                        </div>
                                    </div>
                                     <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="categoria_licencia">Categoria Licencia</label>
                                            <input class="form-control" type="text" name="categoria_licencia"  value="{{ $persona->categoria_licencia }}">
                                        </div>
                                    </div>
                                     <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_venc_licencia">Fecha Vencimiento Licencia</label>
                                            <input class="form-control" type="date" name="fec_venc_licencia"  value="{{ $persona->fec_venc_licencia }}">
                                        </div>
                                    </div>
                                      <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="restric_licencia">Restricciones de la Licencia</label>
                                            <input class="form-control" type="text" name="restric_licencia"  value="{{ $persona->restric_licencia }}">
                                        </div>
                                    </div>
                                      <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="rh">RH</label>
                                            <input class="form-control" type="text" name="rh"  value="{{ $persona->rh }}">
                                        </div>
                                    </div>
                                      <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="EPS">EPS</label>
                                            <input class="form-control" type="text" name="EPS"  value="{{ $persona->EPS }}">
                                        </div>
                                    </div>
                                      <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="ARL">ARL</label>
                                            <input class="form-control" type="text" name="ARL"  value="{{ $persona->ARL }}">
                                        </div>
                                    </div>
                                      <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="AFP">AFP</label>
                                            <input class="form-control" type="text" name="AFP"  value="{{ $persona->AFP }}">
                                        </div>
                                    </div>
                                      <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fondo_cesantias">Fondo Cesantias</label>
                                            <input class="form-control" type="text" name="fondo_cesantias"  value="{{ $persona->fondo_cesantias }}">
                                        </div>
                                    </div>
                                      <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="exp_conduccion">Experiencia en Conducción</label>
                                            <input class="form-control" type="text" name="exp_conduccion"  value="{{ $persona->exp_conduccion }}">
                                        </div>
                                    </div>

                                     <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="propietario">Propietario</label>
                                            <!--<input class="form-control" type="text" name="propietario"  value="{{ $persona->propietario }}">-->
                                            {!! Form::select('propietario', ['Si' => 'Si', 'No' => 'No'], $persona->proppietario, ['class' => 'select2 form-control']) !!}
                                        </div>
                                    </div>

                                     <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="conductor">Conductor</label>
                                            <!--<input class="form-control" type="text" name="conductor"  value="{{ $persona->conductor }}">-->
                                            {!! Form::select('conductor', ['Si' => 'Si', 'No' => 'No'], $persona->conductor, ['class' => 'select2 form-control']) !!}
                                            
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones</label>
                                            <input class="form-control" type="text" name="observaciones"  value="{{ $persona->observaciones }}">
                                        </div>
                                    </div>

                                    <!--BOTTON para hacer el submit y guardar el registro  -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 " >
                                         <div class="form-floating">
                                            <button type="submit" class="btn btn-primary">Guardar</button>                            
                                        </div>
                                    </div>
                                       
                                       
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
