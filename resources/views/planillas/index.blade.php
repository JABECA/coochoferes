@extends('layouts.app')
@section('title')
    Planillas
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Planillas de Alistamiento</h3>
        </div>
        <?php 
            $fecha_actual = date("d-m-Y");
            $minFceha = date("d-m-Y",strtotime($fecha_actual." - 1 days"));
            $maxFecha = date("d-m-Y",strtotime($fecha_actual." + 1 days")); 
        ?>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                        <div class="row mb-3">
                          
                            <div class="col-md-2">
                                <label>N&uacutemero Interno:</label>
                                <select class="select2 form-control num_interno" name="num_interno" id="num_interno">
                                        <option value="" selected>Seleccione un Veh&iacuteculo: </option>
                                        <?php 
                                        foreach ($Numerosinternos as $key => $value) {
                                            echo "<option value='".$value."'> ".$value."<option/>";
                                        }

                                        ?>
                                </select> 
                            </div>

                     
                            <div class="col-md-1">
                                    <label style="color: white;">Filtrar</label>
                                    <button class="form-control btn btn-info" id="filtrar"><i class="fa fa-search"></i></button>
                            </div>

                                                      
                        </div>

                        @can('crear-planillas')
                        <a class="btn btn-warning" href="{{ route('planillas.create') }}">Nueva</a> <br><br>                       
                        @endcan 

                            <!-- <div class="table-responsive"> -->
                                <table  class="table table-striped table-bordered shadow-lg mt-4  planillas" style="width:100%;">
                                    <thead class="tabla-header-bg">
                                        <th style="display: none;">ID</th>                                                       
                                        <th style="color:#fff;"># Interno</th>
                                        <th style="color:#fff;">Fecha</th>
                                        <th style="color:#fff;">Conductor</th>
                                        <th style="color:#fff;">Kilometraje</th>
                                        <th style="color:#fff;">Estado Planilla</th>
                                        <th style="color:#fff;">Estado Veh&iacuteculo</th>
                                        <th style="color:#fff;">Supervisor</th>
                                        <th style="color:#fff;">Fecha Supervision</th>
                                        <th style="color:#fff;">Acciones</th>
                                    </thead>  
                                    <tbody>
                                 
                                    </tbody>               
                                </table>
                             </div>
                            <!-- Centramos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                              
                            </div>                    
                            <!-- </div> -->
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

        
        $(document).ready(function () {

            $(".num_interno").select2();
            // $(".fecha_ini").flatpickr();
            // $(".fecha_fin").flatpickr();

            const table = $('.planillas').DataTable({

                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: {
                        url: "{{route('planillas.index')}}",
                        data: function(d) {
                            d.num_interno  = $('.num_interno').val()
                            // d.fecha_ini = $('.fecha_ini').val(),
                            // d.fecha_fin  = $('.fecha_fin').val()
                        },
                    },
                     "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                      "iDisplayLength": 10,
                      "aaSorting": [[1, 'desc']],
                    dataType: 'json',
                    type: "POST",
                    dom: 'lrtip',
                    columns: [

                        {
                            data: 'id',
                            name: 'id',
                            searchable: true,
                            orderable: true,
                            visible: false

                        },
                        {
                            data: 'numero_interno',
                            name: '# interno',
                            searchable: true,
                            orderable: true
                        },
                        {
                            data: 'fecha',
                            name: 'Fecha Planilla',
                            searchable: true,
                            orderable: true

                        },
                        {
                            data: 'conductor',
                            name: 'Conductor',
                            searchable: true,
                            orderable: true

                        },

                        {
                            data: 'kilometraje',
                            name: 'Kilometraje',
                            searchable: false,
                            orderable: false
                        },
                       
                        {
                            "title": "Estado Planilla",
                            "data": "estado_planilla",
                            render: function(data, type, row, meta ) {
                                if(row.estado_planilla == null || row.estado_planilla == 0 ){
                                    return '<a class="btn btn-danger btn-sm" href="#" data-bs-toggle="mensaje" title="Pdte de Supervision" style="margin-right: 6px;">Pendiente Supervision</a>';
                                }else if(row.estado_planilla != null )
                                    return '<a class="btn btn-success btn-sm" href="#" data-bs-toggle="mensaje" title="Planilla Supervisada" style="margin-right: 6px;">Supervisado</a>';
                            }
                        },
                         {
                            data: 'estado_vehiculo',
                            name: 'Estado Vehículo',
                            render: function(data, type, row, meta ) {
                                
                                if(row.estado_vehiculo == null ){
                                    return '';
                                }else if(row.estado_vehiculo == 1 && row.estado_planilla == 1){
                                    return '<a class="btn btn-success btn-sm" href="#" data-bs-toggle="mensaje" title="Vehiculo Activo" style="margin-right: 6px;"><i class="far fa-check-square"></a>';
                                }else if(row.estado_vehiculo == 0 && row.estado_planilla == 1 )
                                    return '<a class="btn btn-danger btn-sm" href="#" data-bs-toggle="mensaje" title="Vehiculo Inactivo" style="margin-right: 6px;"><i class="far fa-times-circle"></a>';
                                else{
                                    return '';
                                }
                            }
                        },

                        {
                            data: 'usr_supervisa',
                            name: 'Usr Supervisor'
                        },
                        {
                            data: 'fecha_supervision',
                            name: 'Fecha Supervision',
                            searchable: false,
                            orderable: false,
                            visible: false
                        },

                        {
                            "title": "Acciones",
                            "data": "id",
                            className: "table_align_center",
                            render: function(data, type, row, meta ) {
                                // href="/vehiculos/'+data+'/edit"
                                return '<div class="btn-group"><a class="btn btn-info" href="/planillas/'+data+'/ver" data-bs-toggle="mensaje" title="Ver" style="margin-right: 10px;"><i class="fas fa-glasses"></i></a><a class="btn btn-warning" href="/planillas/'+data+'/edit" data-bs-toggle="mensaje" title="Editar" style="margin-right: 4px;"><i class="fas fa-edit"></i></a><a class="btn btn-success" href="/planillas/'+data+'/pdf" target="_blank" data-bs-toggle="mensaje" title="PDF" style="margin-right: 10px;"><i class="fas fa-file-pdf"></i></a></div>';
                            }
                        }
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
