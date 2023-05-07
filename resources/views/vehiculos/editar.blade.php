@extends('layouts.app')
@section('title')
    Editar Vehiculo
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Veh&iacuteculo</h3>
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


                            <form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                           <label for="num_interno">N&uacutemero Interno:</label>
                                           <input type="text" name="num_interno" class="form-control" value="{{ $vehiculo->num_interno }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="placa">Placa</label>
                                            <input class="form-control" type="text" name="placa"  value="{{ $vehiculo->placa }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="chasis">Chasis</label>
                                            <input class="form-control" type="text" name="chasis"  value="{{ $vehiculo->chasis }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="">Cantidad Pasajeros:</label>
                                            <input class="form-control"  type="number" name="cant_pasajeros" id="cant_pasajeros" value="{{ $vehiculo->cant_pasajeros}}">
                                            <!-- {!! Form::number('cant_pasajeros', null, array('class' => 'form-control')) !!} -->
                                        </div>
                                    </div>


                                    <!-- DIVS PAARA LAS IMAGENES -->
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="img_frontal">Imagen Frontal:</label>
                                            <input class="form-control" type="text" value="{{ $vehiculo->img_frontal }}">
                                            <input class="form-control" type="file" name="img_frontal" id="img_frontal" value="{{ $vehiculo->img_frontal }}">
                                            <!-- {!! Form::file('img_frontal', null, array('class' => 'form-control')) !!} -->
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="img_posterior">Imagen Posterior:</label>
                                            <input class="form-control" value="{{ $vehiculo->img_posterior }}">
                                            <input class="form-control" type="file" name="img_posterior" id="img_posterior" value="{{ $vehiculo->img_posterior }}">
                                            <!-- {!! Form::file('img_posterior', null, array('class' => 'form-control')) !!} -->
                                        </div>
                                    </div> 
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="img_laterald">Imagen Lateral Derecha:</label>
                                            <input class="form-control" value="{{ $vehiculo->img_laterald }}">
                                             <input class="form-control" type="file" name="img_laterald" id="img_laterald" value="{{ $vehiculo->img_laterald }}">
                                            <!-- {!! Form::file('img_laterald', null, array('class' => 'form-control')) !!} -->
                                        </div>
                                    </div> 
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="img_laterali">Imagen Lateral Izquierda:</label>
                                            <input class="form-control" value="{{ $vehiculo->img_laterali }}">
                                            <input class="form-control" type="file" name="img_laterali" id="img_laterali" value="{{ $vehiculo->img_laterali }}">
                                            <!-- {!! Form::file('img_laterali', null, array('class' => 'form-control')) !!} -->
                                        </div>
                                    </div> 
                                    <!-- FIN DIVS PARA IMAGENES -->


                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="carroceria">Carroceria</label>
                                            <input class="form-control" type="text" name="carroceria"  value="{{ $vehiculo->carroceria }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="modelo">Modelo</label>
                                            <input class="form-control" type="text" name="modelo"  value="{{ $vehiculo->modelo }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="marca">Marca</label>
                                            <input class="form-control" type="text" name="marca"  value="{{ $vehiculo->marca }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="motor">Motor</label>
                                            <input class="form-control" type="text" name="motor"  value="{{ $vehiculo->motor }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="tipo_combustible">Tipo de Combustible</label>
                                            <input class="form-control" type="text" name="tipo_combustible"  value="{{ $vehiculo->tipo_combustible }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="num_SOAT">N&uacutemero del SOAT</label>
                                            <input class="form-control" type="text" name="num_SOAT"  value="{{ $vehiculo->num_SOAT }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_venc_SOAT">Fecha de Vencimiento del SOAT</label>
                                            <input class="form-control" type="date" name="fec_venc_SOAT"  value="{{ $vehiculo->fec_venc_SOAT }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="num_RTM">N&uacutemero de la RTM</label>
                                            <input class="form-control" type="text" name="num_RTM"  value="{{ $vehiculo->num_RTM }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_venc_RTM">Fecha de Vencimiento de la RTM</label>
                                            <input class="form-control" type="date" name="fec_venc_RTM"  value="{{ $vehiculo->fec_venc_RTM }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="num_TOP">N&uacutemero de la TOP</label>
                                            <input class="form-control" type="text" name="num_TOP"  value="{{ $vehiculo->num_TOP }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_venc_TOP">Fecha de Vencimiento de la TOP</label>
                                            <input class="form-control" type="date" name="fec_venc_TOP"  value="{{ $vehiculo->fec_venc_TOP }}">
                                        </div>
                                    </div>

                                    <!-- <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="ciudad_TOP">Ciudad de la TOP</label>
                                            <input class="form-control" type="text" name="ciudad_TOP"  value="{{ $vehiculo->ciudad_TOP }}">
                                        </div>
                                    </div> -->
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="">Ciudad Tarjeta de Operaci&oacuten:</label><br> 
                                            {!! Form::select('ciudad_TOP', $ciudades, $vehiculo->ciudad_TOP, ['class' => 'select2 form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="">Propietario:</label>
                                         
                                            <select name="id_propietario" class="select2 form-control">
                                                <option value="{{ $propietario->id}}"> {{ $propietario->nombres}} {{$propietario->apellidos}}</option>
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

                                            <select name="id_conductor" class="select2 form-control">
                                                 <option value="{{ $conductor->id}}"> {{ $conductor->nombres}} {{$conductor->apellidos}}</option>
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
                                            <label for="">Observaciones:</label>
                                            {!! Form::text('observaciones', $vehiculo->observaciones , array('class' => 'form-control')) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3" style="display: none;">
                                        <div class="form-group">
                                            <label for="">Usuario Crea:</label>
                                            {!! Form::text('usr_crea', \Illuminate\Support\Facades\Auth::user()->name , array('class' => 'form-control')) !!}
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
