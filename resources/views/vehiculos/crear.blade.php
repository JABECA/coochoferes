@extends('layouts.app')
@section('title')
    Crear Vehiculo
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Vehículo</h3>
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


                        {!! Form::open(array('route' => 'vehiculos.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">N&uacutemero Interno:</label>                                    
                                    {!! Form::text('num_interno', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Placa:</label>
                                    {!! Form::text('placa', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Cantidad Pasajeros:</label>
                                    {!! Form::number('cant_pasajeros', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Chasis:</label>
                                    {!! Form::text('chasis', null, array('class' => 'form-control')) !!}
                                </div>
                            </div> 

                            <!-- DIVS PAARA LAS IMAGENES -->
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="img_frontal">Imagen Frontal:</label>
                                    {!! Form::file('img_frontal', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="img_posterior">Imagen Posterior:</label>
                                    {!! Form::file('img_posterior', null, array('class' => 'form-control')) !!}
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="img_laterald">Imagen Lateral Derecha:</label>
                                    {!! Form::file('img_laterald', null, array('class' => 'form-control')) !!}
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="img_laterali">Imagen Lateral Izquierda:</label>
                                    {!! Form::file('img_laterali', null, array('class' => 'form-control')) !!}
                                </div>
                            </div> 
                            <!-- FIN DIVS PARA IMAGENES -->



                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Carroceria:</label>
                                    {!! Form::text('carroceria', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Modelo:</label>
                                    {!! Form::text('modelo', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Marca:</label>
                                    {!! Form::text('marca', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Motor:</label>
                                    {!! Form::text('motor', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Tipo Combustible:</label>
                                    {!! Form::text('tipo_combustible', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">N&uacutemero del SOAT:</label>
                                    {!! Form::text('num_SOAT', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha Vencimiento del SOAT:</label>
                                    {!! Form::date('fec_venc_SOAT', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">N&uacutemero de la RTM:</label>
                                    {!! Form::text('num_RTM', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha Vencimiento de la RTM:</label>
                                    {!! Form::date('fec_venc_RTM', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">N&uacutemero de la TOP:</label>
                                    {!! Form::text('num_TOP', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Ciudad Tarjeta de Operaci&oacuten:</label><br> 
                                    {!! Form::select('ciudad_TOP', $ciudades, NULL, ['class' => 'select2 form-control']  ) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha Vencimiento Tarjeta de Operaci&oacuten:</label>
                                    {!! Form::date('fec_venc_TOP', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Propietario:</label>
                                    <!-- {!! Form::select('id_propietario', $propietarios, NUll, ['class' => 'select2 form-control'] ) !!} -->
                                    <!-- {!! Form::select('id_propietario', $propietarios, null, 
                                                     ['class' => 'select2 form-control', 'placeholder' => 'Seleccione el propietario', 'required']
                                    ) !!} -->
                                    <!-- {!! Form::text('id_propietario', null, array('class' => 'form-control')) !!} -->
                                     <!-- {{ $propietarios}} -->
                                    <select name="id_propietario" class="select2 form-control">
                                        <option value="">Seleccione el Propietario</option>
                                       <?php 
                                        foreach($propietarios as $clave => $valor){
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
                                    <label for="poder">Poder:</label>
                                    {!! Form::textarea('poder', null, array('class' => 'form-control')) !!}
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
