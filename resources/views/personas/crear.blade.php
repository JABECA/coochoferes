@extends('layouts.app')
@section('title')
    Crear Persona
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Propietario i/o Conductor</h3>
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


                        {!! Form::open(array('route' => 'personas.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Nombres:</label>                                    
                                    {!! Form::text('nombres', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Apellidos:</label>
                                    {!! Form::text('apellidos', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Cedula:</label>
                                    {!! Form::text('identificacion', null, array('class' => 'form-control')) !!}
                                </div>
                            </div> 

                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha expedición Cedula:</label>
                                    {!! Form::date('fecha_expedicion', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Lugar de expedicion:</label>
                                    {!! Form::select('lugar_expedicion', $ciudades, NULL, ['class' => 'select2 form-control']  ) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha de Nacimiento:</label>
                                    {!! Form::date('fecha_nacimiento', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Direccion:</label>
                                    {!! Form::text('direccion', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Ciudad de residencia:</label>
                                    {!! Form::select('ciudad', $ciudades, NULL, ['class' => 'select2 form-control']  ) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Numero telefono/celular</label>
                                    {!! Form::text('celular', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha de Ingreso:</label>
                                    {!! Form::date('fec_ingreso', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Tipo de contrato:</label>
                                    {!! Form::text('tipo_contrato', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha de contrato:</label>
                                    {!! Form::date('fec_contrato', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha terminacion contrato:</label>
                                    {!! Form::date('fec_term_contrato', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Asociado:</label><br> 
                                     {!! Form::select('asociado', ['Si' => 'Si', 'No' => 'No'] , NULL, ['class' => 'select2 form-control']  ) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Curso cooperativismo:</label>
                                    {!! Form::select('curso_cooperativismo', ['Si' => 'Si', 'No' => 'No'] , NULL, ['class' => 'select2 form-control']  ) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Nivel educativo:</label>
                                    {!! Form::text('nivel_educativo', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Estado civil:</label>
                                    {!! Form::text('estado_civil', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Categoria licencia:</label>
                                    {!! Form::text('categoria_licencia', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha vencimiento licencia:</label>
                                    {!! Form::date('fec_venc_licencia', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Restricciones de la licencia:</label>
                                    {!! Form::text('restric_licencia', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">RH:</label>
                                    {!! Form::text('rh', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">EPS:</label>
                                    {!! Form::text('EPS', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">ARL:</label>
                                    {!! Form::text('ARL', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">AFP:</label>
                                    {!! Form::text('AFP', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Fondo cesantias:</label>
                                    {!! Form::text('fondo_cesantias', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Experiencia de conducción:</label>
                                    {!! Form::text('exp_conduccion', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Es Propietario</label>
                                    {!! Form::select('propietario', ['Si' => 'Si', 'No' => 'No'] , NULL, ['class' => 'select2 form-control']  ) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Es Conductor:</label>
                                    {!! Form::select('conductor', ['Si' => 'Si', 'No' => 'No'] , NULL, ['class' => 'select2 form-control']  ) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Observaciones:</label>
                                     {!! Form::text('observaciones', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                         
                            <div class="col-xs-12 col-sm-3 col-md-3" style="display: none;">
                                <div class="form-group">
                                    <label for="">Usuario Crea:</label>
                                    {!! Form::text('usr_crea', \Illuminate\Support\Facades\Auth::user()->name , array('class' => 'form-control')) !!}
                                </div>
                            </div>                   
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
