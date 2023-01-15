@extends('layouts.app')
@section('title')
    Liquidar Vehiculo
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Liquidar Vehiculo</h3>
        </div>

        <?php 
            date_default_timezone_set('America/Bogota');
            $fecha_actual = date("Y-m-d");
            $minFceha = date("Y-m-d",strtotime($fecha_actual." - 1 days"));
            $maxFecha = date("Y-m-d",strtotime($fecha_actual));

            $time = time();
            $horaRegistro =  date("Y-m-d H:i:s", $time);

            // echo $minFceha; 
            // echo "\n";
            // echo $maxFecha;
        ?>


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


                            <form action="{{ route('regpasajeros.update', $regpasajero->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="placa">Codigo recaudo</label>
                                            <input class="form-control" type="text" name="cod_recaudo"  value="">
                                        </div>
                                    </div>

                                     <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                           <label for="id">Id:</label>
                                           <input type="text" name="id" class="form-control" value="{{ $regpasajero->id }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                           <label for="num_interno">Numero interno:</label>
                                           <input type="text" name="num_interno" class="form-control" value="{{ $regpasajero->num_interno }}">
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha/hora recaduo:</label>
                                            <input type="text" name="fecha_recaudo" value="<?php echo $horaRegistro; ?>" class="form-control fecha_recaudo" />
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="chasis">Usuario recaudo</label>
                                            {!! Form::text('usr_recaudo', \Illuminate\Support\Facades\Auth::user()->name , array('class' => 'form-control')) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="chasis">Usuario recaudo</label>
                                            <input type="text" name="estado" value="0" class="form-control estado" />
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
