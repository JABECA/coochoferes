@extends('layouts.app')
@section('title')
    Vehiculos
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Vehículos</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-md-2">
                                <label>Fecha Desde:</label>
                                <input type="text" name="start_date" class="form-control start_date" readonly />
                            </div>
                            <div class="col-md-2">
                                <label>Fecha Hasta:</label>
                                <input type="text" name="end_date" class="form-control end_date" readonly />
                            </div>
                            <div class="col-md-2">
                                <label>Documento:</label>
                                <select class="form-control documento" name="documento">
                                    <option value="">Seleccione el tipo</option>
                                    <option value="fec_venc_SOAT">SOAT</option>
                                    <option value="fec_venc_RTM">RTM</option>
                                    <option value="fec_venc_TOP">TOP</option>
                                </select>
                            </div>
                           
                            <div class="col-md-1">
                                <label style="color: white;">Filtrar</label>
                                <!--<button class="form-control btn btn-info" id="filtrar">Filtrar</button>-->
                                <button class="form-control btn btn-info" id="filtrar"><i class="fa fa-search"></i></button>
                            </div>
                        </div>

                        <div class="row mb-3">
                            
                            <div class="col-md-3">
                                <label>Estado</label>
                                <select class="form-control status_id">
                                    <option value="">Seleccione</option>
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>N&uacutemero Interno: </label>
                                <input type="number" name="num_interno" class="form-control num_interno" />
                            </div>
                            
                            <div class="col-md-1">
                                <label style="color: white;">Filtrar</label>
                                <!--<button class="form-control btn btn-info" id="filtrar2">Filtrar</button>-->
                                <button class="form-control btn btn-info" id="filtrar2"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
       
                        @can('crear-vehiculo')
                        <a class="btn btn-warning" href="{{ route('vehiculos.create') }}">Nuevo</a> <br><br>                       
                        @endcan 
        
                            <!-- <div class="table-responsive"> -->
                                <table  class="table table-striped table-bordered shadow-lg mt-4  vehiculos" style="width:100%;">
                                    <thead class="tabla-header-bg">
                                        <th style="display: none;">ID</th>                                                       
                                        <th style="color:#fff;"># Interno</th>
                                        <th style="color:#fff;">Placa</th>
                                        <th style="color:#fff;">Estado</th>
                                        <th style="color:#fff;">Chasis</th>
                                        <th style="color:#fff;">Carroceria</th>
                                        <th style="color:#fff;">Modelo</th>
                                        <th style="color:#fff;">Marca</th>
                                        <th style="color:#fff;">Motor</th>
                                        <th style="color:#fff;">Combustible</th>
                                        <th style="color:#fff;"># SOAT</th>
                                        <th style="color:#fff;">Venc SOAT</th>
                                        <th style="color:#fff;"># RTM</th>
                                        <th style="color:#fff;">Venc RTM</th>
                                        <th style="color:#fff;"># TOP</th>
                                        <th style="color:#fff;">Venc TOP</th>
                                        <th style="color:#fff;">Ciudad Matricula</th>
                                        <th style="color:#fff;">Propietario</th>
                                        <th style="color:#fff;">Conductor</th>
                                        <th style="color:#fff;">id_Propietario</th>
                                        <th style="color:#fff;">id_Conductor</th>
                                        <th style="color:#fff;">Obser.</th>
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

            $(".start_date").flatpickr();
            $(".end_date").flatpickr();
            $(".status_id").select2();
            $(".documento").select2();

            const table = $('.vehiculos').DataTable({

                    processing: true,
                    serverSide: true,
                    responsive: true,

                    ajax: {
                        url: "{{route('vehiculos.index')}}",
                        data: function(d) {
                            d.status_id  = $('.status_id').val(),
                            d.start_date = $('.start_date').val(),
                            d.end_date   = $('.end_date').val(),
                            d.documento  = $('.documento').val(),
                            d.num_interno  = $('.num_interno').val()
                        },
                    },
                     "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                      "iDisplayLength": 10,
                      "order": [[0, 'ASC']],
                    dataType: 'json',
                    type: "POST",
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
                            visible: true
                        },
                        {
                            data: 'placa',
                            name: 'Placa',
                            searchable: true,
                            orderable: true

                        },
                        {   
                            "title": "Estado",
                            "data": "estado",
                            className: "table_align_center",
                            render: function(data, type, row, meta ) {
                                if(row.estado == 1){
                                    return '<a class="btn btn-success btn-sm" href="/vehiculos/'+row.id+'/0" data-bs-toggle="mensaje" title="Desactivar Registro" style="margin-right: 6px;">Activo</a>';
                                }else if(row.estado == 0)
                                    return '<a class="btn btn-danger btn-sm" href="/vehiculos/'+row.id+'/1" data-bs-toggle="mensaje" title="Activar Registro" style="margin-right: 6px;">Inactivo</a>';
                            }
                            
                        },
                        {
                            data: 'chasis',
                            name: 'Chasis'
                        },
                        {
                            data: 'carroceria',
                            name: 'Carroceria',
                            searchable: false,
                            orderable: false
                        },
                        {
                            data: 'modelo',
                            name: 'Modelo'
                        },
                        {
                            data: 'marca',
                            name: 'Marca'
                        },
                        {
                            data: 'motor',
                            name: 'Motor'
                        },
                        {
                            data: 'tipo_combustible',
                            name: 'Combustible'
                        },
                        {
                            data: 'num_SOAT',
                            name: '# SOAT'
                        },
                        {
                            "title": "Fec Venv SOAT",
                            "data": "fec_venc_SOAT",
                            className: "table_align_center",
                            render: function(data, type, row, meta ) {

                                let fechaZoat = row.fec_venc_SOAT;
                                let fechaVencimiento = Date.parse(fechaZoat);

                                let fechaZoatMasSemana = fechaVencimiento+semanaEnMilisegundos;

                                if(today > fechaVencimiento){
                                    return '<a  href="#" style="margin-right: 6px;  color: red; font-size: 1.1em;">'+row.fec_venc_SOAT+'</a>';
                                }else if(today+semanaEnMilisegundos > fechaVencimiento ){
                                    return '<a  href="#" style="margin-right: 6px;  color: orange; font-size: 1.1em;">'+row.fec_venc_SOAT+'</a>';
                                }else{
                                    return '<a  href="#" style="margin-right: 6px; color: green; font-size: 1.1em;">'+row.fec_venc_SOAT+'</a>';
                                }                              
                                
                            }
                        },
                        {
                            data: 'num_RTM',
                            name: '# RTM'
                        },
                        {
                            data: 'fec_venc_RTM',
                            name: 'Fec Ven RTM'
                        },
                        {
                            data: 'num_TOP',
                            name: '# TOP'
                        },
                         {
                            data: 'fec_venc_TOP',
                            name: 'Fec Venc TOP'
                        },
                        {
                            data: 'ciudad_TOP',
                            name: 'Ciudad Matricula'
                        },
                       
                        {
                            data: 'fullname_propietario',
                            name: 'Propietario',
                            visible: true
                        },
                          {
                            data: 'fullname_conductor',
                            name: 'Conductor',
                            visible: true
                        },
                        {
                            data: 'id_propietario',
                            name: 'Propietario',
                            visible: false
                        },
                          {
                            data: 'id_conductor',
                            name: 'Conductor',
                            visible: false
                        },
                          {
                            data: 'observaciones',
                            name: 'Observaciones'
                        },
                        {
                            "title": "Acciones",
                            "data": "id",
                            className: "table_align_center",
                            render: function(data, type, row, meta ) {
                                return '<div class="btn-group"><a class="btn btn-success btn-sm" href="/vehiculos/'+data+'" style="margin-right: 6px;"><i class="fa fa-eye"></i></a><a class="btn btn-info btn-sm" href="/vehiculos/'+data+'/edit"><i class="fas fa-pencil-alt"></i></a></div>';
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
