@extends('layouts.app')
@section('title')
    Crear Registro de pasajeros
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear registro de pasajeros</h3>
        </div>
        <?php 
            date_default_timezone_set('America/Bogota');
            $fecha_actual = date("Y-m-d");
            $minFceha = date("Y-m-d",strtotime($fecha_actual." - 1 days"));
            $maxFecha = date("Y-m-d",strtotime($fecha_actual)); 

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


                        {!! Form::open(array('route' => 'regpasajeros.store','method'=>'POST', 'class' => 'form_regpasajeros', 'enctype' => 'multipart/form-data')) !!}
                        
                        <div class="row">

                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Numero Interno:</label>
                                    <select class="select2 form-control num_interno" name="num_interno" id="num_interno">
                                        <option value="" selected>Seleccione un vehiculo: </option>
                                        <?php 
                                        foreach ($Numerosinternos as $key => $value) {
                                            echo "<option value='".$value."'> ".$value."<option/>";
                                        }

                                        ?>

                                    </select>                                    
                                    <!-- {!! Form::select('num_interno', $Numerosinternos, NULL, ['class' => 'select2 form-control num_interno']  ) !!} -->
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Cantidad Pasajeros Terminal:</label>
                                    <input  class="form-control" type="number"  max="19" name="cant_pasajeros_terminal" id="cant_pasajeros_terminal">
                                    <!-- {!! Form::number('cant_pasajeros_terminal', null, array('class' => 'form-control')) !!} -->
                                </div>
                            </div>
                           
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Cantidad Pasajeros Ruta:</label>
                                    {!! Form::number('cant_pasajeros', null, array('class' => 'form-control cant_pasajeros')) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha:</label>
                                    <input type="date" name="fecha_registro" min="<?php echo $minFceha; ?>" max="<?php echo $maxFecha; ?>"  value="<?php echo $maxFecha; ?>" class="form-control fecha_registro" />  
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Ruta:</label>
                                    <select class="select2 form-control" id="ruta" name="ruta">
                                        <option value="Virginia">Virginia</option>
                                        <option  value="Cartago">Cartago</option>
                                        <option value="Armenia">Armenia</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="">Observaciones:</label>
                                    <input type="text" name="observaciones" class="form-control observaciones" placeholder="este campo puede ir vacio">
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

@section('scripts')

    <script type="text/javascript">

        $('.form_regpasajeros').submit(function(e){
                    e.preventDefault();
                    let pasajerosRuta = $('.cant_pasajeros').val();
                    let vehiculo = $('.num_interno').val();
                    Swal.fire({
                      title: 'Estas seguro(a) de registrar '+pasajerosRuta+' pasajeros en ruta para el vehiculo numero '+vehiculo+'?',
                      text: "No podrás revertir esto!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Si, grabar el registro!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                       this.submit()
                       
                      }
                    });
                });
    </script>


@endsection

