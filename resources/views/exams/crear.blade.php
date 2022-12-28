@extends('layouts.app')
@section('title')
    Crear Examen/Induccion
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Examen o Induccion</h3>
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


                        {!! Form::open(array('route' => 'exams.store','method'=>'POST')) !!}
                        <div class="row">
                            
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Conductor:</label>
                                    <!-- {!! Form::select('id_conductor', $conductores, NULL, ['class' => 'select2 form-control']  ) !!} -->
                                    <!-- {!! Form::text('id_conductor', null, array('class' => 'form-control')) !!} -->
                                    <select name="id_conductor" class="select2 form-control">
                                         <option value="">Seleccione el Conductor</option>
                                       <?php 
                                        foreach($conductores as $clave => $valor){
                                            echo '
                                                <option value=" '.$valor['id'].'">'.$valor['nombres'].' '.$valor['apellidos'].'</option>
                                            ';
                                        }
                                       ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Tipo:</label>
                                    {!! Form::select('tipo', ['Induccion'               => 'Induccion',
                                                              'Capacitacion'            => 'Capacitacion',
                                                              'Examen_medico'           => 'Examen Medico',
                                                              'Examen_teorico_practico' => 'Examen Teorico Practico',
                                                              'Examen de Ingreso'       => 'Examen de Ingreso',
                                                              'Vacaciones Pagadas'      => 'Vacaciones Pagadas',
                                                              'Vacaciones Pendientes'   => 'Vacaciones Pendientes'

                                                             ] , 
                                                              NULL, 
                                                              ['class' => 'select2 form-control']  ) 
                                    !!}
                                </div>
                            </div>

                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Descripcion:</label>
                                    {!! Form::textarea('descripcion', null, array('class' => 'form-control')) !!}
                                </div>
                            </div> 

                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="fecha_ini">Fehca desde:</label>
                                    {!! Form::date('fecha_ini', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="fecha_fin">Fehca hasta:</label>
                                    {!! Form::date('fecha_fin', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Vigencia:</label>
                                    {!! Form::text('vigencia', null, array('class' => 'form-control')) !!}
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
