@extends('layouts.app')
@section('title')
    Crear Registro de pasajeros
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.css"/>
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
                                    <label for="">Nombre conductor:</label>
                                    <input  class="form-control" type="text"  name="nombre_conductor" id="nombre_conductor">
                                    <!-- {!! Form::number('cant_pasajeros_terminal', null, array('class' => 'form-control')) !!} -->
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

                            <div class="col-xs-12 col-sm-3 col-md-3" style="display: none;">
                                <div class="form-group">
                                    <label for="">Fecha:</label>
                                    <input type="text" name="hora_registro" value="<?php echo $horaRegistro; ?>" class="form-control hora_registro" />  
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


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table  class="table table-striped table-bordered shadow-lg mt-4  regpasajerosOperativo" style="width:100%;">
                                <thead class="tabla-header-bg">
                                    <th style="display: none;">ID</th>                                                       
                                    <th ># Interno</th>
                                    <th >Conductor</th>
                                    <th >Cantidad Pasajeros Terminal</th>
                                    <th >Cantidad Pasajeros Ruta</th>
                                    <th >Ruta</th>
                                    <th style="color:#fff;">Fecha Ruta</th>
                                    <th style="color:#fff;">Fecha/Hora Liquidacion</th>
                                    <!-- <th style="color:#fff;">Acciones</th> -->
                                </thead>  
                                <tbody>
                                </tbody>               
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
    
    <!-- DATA TABLES  -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.js"></script>


     @if(session('eliminar') == 'ok')
        <script type="text/javascript">
             Swal.fire(
                  'Eliminado!',
                  'El registro ha sido eliminado.',
                  'success'
                )
        </script>
    @endif


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

    <script type="text/javascript">

            $(document).ready(function () {

            $(".num_interno").select2();
            $(".fecha_ini").flatpickr();
            $(".fecha_fin").flatpickr();

            const table = $('.regpasajerosOperativo').DataTable({

                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: {
                        url: "{{route('regpasajeros.create')}}",
                        data: function(d) {
                            d.num_interno  = $('.num_interno').val(),
                            d.fecha_ini = $('.fecha_ini').val(),
                            d.fecha_fin  = $('.fecha_fin').val()
                        },
                    },
                     "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Toditos"]],
                      "iDisplayLength": 10,
                      "aaSorting": [[1, 'desc']],
                    dataType: 'json',
                    type: "POST",
                    dom: 'lfrtip',
                    columns: [

                        {
                            data: 'id',
                            name: 'id',
                            searchable: true,
                            orderable: true,
                            visible: false

                        },
                        {
                            data: 'num_interno',
                            name: '# interno',
                            searchable: true,
                            orderable: true,
                            className: "text-center"
                        },
                        {
                            data: 'nombre_conductor',
                            name: 'Conductor',
                            searchable: true,
                            orderable: true,
                            className: "text-center"
                        },
                        {
                            data: 'cant_pasajeros_terminal',
                            name: 'Cantida de Pasajeros Terminal',
                            searchable: true,
                            orderable: true

                        },
                        {
                            data: 'cant_pasajeros',
                            name: 'Cantida de Pasajeros',
                            searchable: true,
                            orderable: true

                        },

                        {
                            data: 'ruta',
                            name: 'Ruta',
                            searchable: false,
                            orderable: false
                        },
                       
                        {
                            data: 'fecha_registro',
                            name: 'Fecha Ruta'
                        },

                        {
                            data: 'hora_registro',
                            name: 'Fecha/Hora liquidacion'
                        }
                        
                       
                        
                        // {
                        //     "title": "Acciones",
                        //     "data": "id",
                        //     className: "table_align_center",
                        //     render: function(data, type, row, meta ) {
                        //         return '<div class="btn-group"><a class="btn btn-success btn-sm" href="/regpasajeros/'+data+'" style="margin-right: 6px;" disabled><i class="fa fa-eye"></i></a><a class="btn btn-info btn-sm" href="/regpasajeros/'+data+'/edit" disabled><i class="fas fa-pencil-alt"></i></a></div>';
                        //     }
                        // }
                    ]

            });


            $('#filtrar').click(function() {
                // $('.status_id').empty();
               
                table.draw();

            });

            $('#filtrar2').click(function() {
                // console.log( $('.num_interno').val() );
                table.draw();
            });

        });
    </script>

@endsection

