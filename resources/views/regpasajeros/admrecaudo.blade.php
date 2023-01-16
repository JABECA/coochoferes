@extends('layouts.app')
@section('title')
    ADM recaudos
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Administrar Recaudos</h3>
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
                                <label>Numero Interno:</label>
                                {!! Form::select('num_interno', $Numerosinternos, NULL, ['class' => 'select2 form-control num_interno']  ) !!}
                            </div>
                           
                           <div class="col-md-3">
                                <label>Fecha ini: </label>
                                <input type="date" name="fecha_registro" class="form-control fecha_ini" />
                            </div>

                            <div class="col-md-3">
                                <label>Fecha fin: </label>
                                <input type="date" name="fecha_registro" class="form-control fecha_fin" />
                            </div>

                            <div class="col-md-1">
                                    <label style="color: white;">Filtrar</label>
                                    <button class="form-control btn btn-info" id="filtrar">Filtrar</button>
                            </div>

                                                      
                        </div>

        
                            <!-- <div class="table-responsive"> -->
                                <table  class="table table-striped table-bordered shadow-lg mt-4  regpasajeros" style="width:100%;">
                                    <thead class="tabla-header-bg">
                                        <th style="display: none;">ID</th>                                                       
                                        <th ># Interno</th>
                                        <th >Cantidad Pasajeros Terminal</th>
                                        <th >Cantidad Pasajeros Ruta</th>
                                        <th >Ruta</th>
                                        <th >Total cuadre</th>
                                        <th >Fecha Ruta</th>
                                        <th >Fecha/Hora Liquidacion</th>
                                        <th >Usr Liquida</th> <!--  -->
                                        <th >Fecha/hora Recaudo</th> <!--  -->
                                        <th >Usr recaudo</th>  <!--  -->
                                        <th >Codigo recaudo</th>
                                        <th >Estado</th>
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

        // $('#vehiculos').submit(function(e){
        //       e.preventDefault();
        //       alert('seguro de eliminar');

        // });
        
        // $('#vehiculos').submit(function(e){
        //     e.preventDefault();
        //     Swal.fire({
        //       title: 'Estas seguro(a) de eliminar el registro?',
        //       text: "No podrás revertir esto!",
        //       icon: 'warning',
        //       showCancelButton: true,
        //       confirmButtonColor: '#3085d6',
        //       cancelButtonColor: '#d33',
        //       confirmButtonText: 'Si, borrar registro!'
        //     }).then((result) => {
        //       if (result.isConfirmed) {
        //         this.submit();
               
        //       }
        //     });
        // });

        const semanaEnMilisegundos = 1000 * 60 * 60 * 24 * 7;
        const diaEnMilisegundos = 1000 * 60 * 60 * 24;

        date = new Date();
        year = date.getFullYear();
        month = date.getMonth() + 1;
        day = date.getDate(); 
        hoy = year+'-'+month+'-'+day;
        today = Date.parse(year+'-'+month+'-'+day);
        let todaymenosSemana = today-semanaEnMilisegundos;

        $('.form_vehiculos').submit(function(e){
            e.preventDefault();
            Swal.fire({
              title: 'Estas seguro(a) de eliminar el registro?',
              text: "No podrás revertir esto!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, borrar registro!'
            }).then((result) => {
              if (result.isConfirmed) {
               this.submit()
               
              }
            });
        });

        $(document).ready(function () {

            $(".num_interno").select2();
            $(".fecha_ini").flatpickr();
            $(".fecha_fin").flatpickr();

            const table = $('.regpasajeros').DataTable({

                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: {
                        url: "{{route('admrecaudos.admrecaudo')}}",
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
                    dom: 'lBfrtip',
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
                            orderable: true
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
                            data: 'total_cuadre',
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
                        },

                        {
                            data: 'usr_crea',
                            name: 'Usr liquida'
                        },

                        {
                            data: 'fecha_recaudo',
                            name: 'Fecha/Hora recaudo'
                        },

                        {
                            data: 'usr_recaudo',
                            name: 'Usr recaduo'
                        },
                        {
                            data: 'cod_recaudo',
                            name: 'Recibo de pago',
                            searchable: false,
                            orderable: false,
                            visible: false
                        },

                        {   
                            "title": "Estado/Cod recaudo",
                            "data": "cod_recaudo",
                            render: function(data, type, row, meta ) {
                                if(row.cod_recaudo == null){
                                    return '<a class="btn btn-danger btn-sm" href="#" data-bs-toggle="mensaje" title="pdte de pago" style="margin-right: 6px;">Pendiente de pago</a>';
                                }else if(row.cod_recaudo != null)
                                    return '<a class="btn btn-success btn-sm" href="#" data-bs-toggle="mensaje" title="liquidado" style="margin-right: 6px;">Liquidado con recibo '+data+'</a>';
                            }
                            
                        },
                        
                        {
                            "title": "Acciones",
                            "data": "id",
                            className: "table_align_center",
                            render: function(data, type, row, meta ) {
                                // href="/vehiculos/'+data+'/edit"
                                return '<div class="btn-group"><a class="btn btn-success btn-sm" href="/regpasajeros/'+data+'" style="margin-right: 6px;"><i class="fa fa-eye"></i></a><a class="btn btn-info btn-sm" href="/regpasajeros/'+data+'/edit"><i class="fas fa-pencil-alt"></i></a></div>';
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
