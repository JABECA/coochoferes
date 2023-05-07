@extends('layouts.app')
@section('title')
    Ver Vehiculo
@endsection
@section('content')
    <section class="section">

        <div class="section-header">
            <h3 class="page__heading">HV del Veh&iacuteculo</h3>
        </div>
       
        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>Im&aacutegenes</h3> 
                            <div class="row" style="text-align: center;">

                                <div id="frontal" class="col-xs-12 col-sm-3 col-md-3">
                                    <!--Imagen frontal  -->
                                </div>
                                
                                <div id="posterior" class="col-xs-12 col-sm-3 col-md-3">
                                    <!--Imagen posterior  -->
                                </div>
                                
                                <div id="laterald" class="col-xs-12 col-sm-3 col-md-3">
                                    <!--Imagen lateral derecha  -->
                                </div>
                                
                                <div id="laterali" class="col-xs-12 col-sm-3 col-md-3">
                                    <!--Imagen lateral izquierda  -->
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                             
                                <h3>Datos Generales</h3><br>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                           <label for="num_interno">N&uacutemero interno: {{ $vehiculo->num_interno }}</label><br>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="placa">Placa: {{ $vehiculo->placa }}</label><br>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="id_propietario">Propietario: {{ $propietario }}</label><br>
                                        </div>
                                    </div>

                                     <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="id_conductor">Conductor: {{ $conductor }}</label><br>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="marca">Marca: {{ $vehiculo->marca }}</label><br>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="cant_pasajeros">Cantidad Pasajeros: {{ $vehiculo->cant_pasajeros }}</label><br>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="modelo">Modelo: {{ $vehiculo->modelo }} </label><br>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="motor">Motor: {{ $vehiculo->motor }}</label><br>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="chasis">Chasis: {{ $vehiculo->chasis }}</label><br>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="carroceria">Carroceria: {{ $vehiculo->carroceria }}</label><br>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="tipo_combustible">Tipo de Combustible: {{ $vehiculo->tipo_combustible }}</label><br>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="num_SOAT">SOAT: {{ $vehiculo->num_SOAT }} </label><br>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_venc_SOAT">Vencimiento SOAT: {{ $vehiculo->fec_venc_SOAT }}</label><br>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="num_RTM">RTM: {{ $vehiculo->num_RTM }}</label><br>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_venc_RTM">Vencimiento RTM: {{ $vehiculo->fec_venc_RTM }}</label><br>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="num_TOP">TOP: {{ $vehiculo->num_TOP }}</label><br>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fec_venc_TOP">Vencimiento TOP: {{ $vehiculo->fec_venc_TOP }}</label><br>
                                        </div>
                                    </div>

                                 
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="">Ciudad TOP: {{ $vehiculo->ciudad_TOP }}</label><br>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones: {{ $vehiculo->observaciones }}</label><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="section-body">
            <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Novedades</h3>
                        <table id="insidentes" class="table table-striped table-bordered shadow-lg mt-4 dt-responsive" style="width:100%;">
                            <thead class="tabla-header-bg">
                                <th style="display: none;">ID</th>                                                       
                                <th style="color:#fff;"># Interno</th>
                                <th style="color:#fff;">Placa</th>
                                <th style="color:#fff;">Tipo</th>
                                <th style="color:#fff;">Fecha</th>
                                <th style="color:#fff;">Descripción</th>
                                <th style="color:#fff;">Duración</th>
                                <th style="color:#fff;">Solución</th>
                                <th style="color:#fff;">Estado</th>
                            </thead>  
                            <tbody>
                                @foreach ($insidentes as $insidente)
                                <tr>
                                    <td style="display: none;">{{ $insidente->id }}</td>                          
                                    <td>{{ $insidente->num_interno }}</td>
                                    <td>{{ $insidente->placa }}</td>
                                    <td>{{ $insidente->tipo }}</td>
                                    <td>{{ $insidente->fecha }}</td>
                                    <td>{{ $insidente->descripcion }}</td>
                                    <td>{{ $insidente->duracion }}</td>
                                    <td>{{ $insidente->solucion }}</td>
                                    <td> 
                                        @if($insidente->estado == '1')
                                            <a  class="btn btn-success btn-sm" style="margin-right: 6px;">Finalizada</a>
                                            @else
                                            @can('editar-insidente')
                                                <a  class="btn btn-danger btn-sm">En curso</a>
                                            @endcan
                                        @endif 
                                    </td>
                                </tr>
                                 @endforeach
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

    <script type="text/javascript">

        $(document).ready(function () {
            $('#insidentes').DataTable({
            language: {

                "sProcessing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla ",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },
            order: [[0, 'desc']],
            responsive: "true",
            dom: 'lfrtip',  //dom: 'lBfrtip',
            buttons:[ 
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel" aria-hidden="true"></i>',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf"></i>',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger'
                },

            ],
            columnDefs: [
            {
                target: 0,
                visible: false,
                searchable: false,
            },
           
        ],

            });
        });

        var placa =  "<?php echo $vehiculo->placa; ?>";
        // console.log(placa);
        const frontal = 'http://localhost/alistamiento/public/img/vehiculos/'+placa+'/'+placa+'_frontal.png'; //Img en variable para enviar lo que desees
        const contenedor = document.getElementById("frontal");
        contenedor.insertAdjacentHTML(
          "beforeend",
          `<img src=${frontal} alt=${frontal} width="200px" height="200px" id="frontal1">` // Backticks para img variable
        );

        var img1 = document.getElementById('frontal1');
        img1.onerror = cargarImagenPorDefecto;
        function cargarImagenPorDefecto(e){
          e.target.src= 'http://localhost/alistamiento/public/img/vehiculos/noimage.png';
        }
      

        const posterior = 'http://localhost/alistamiento/public/img/vehiculos/'+placa+'/'+placa+'_posterior.png' //Img en variable para enviar lo que desees
        const contenedor2 = document.getElementById("posterior");
        contenedor2.insertAdjacentHTML(
          "beforeend",
          `<img src=${posterior} alt=${posterior} width="200px" height="200px" id="posterior1">` // Backticks para img variable
        );

        var img2 = document.getElementById('posterior1');
        img2.onerror = cargarImagenPorDefecto;
        function cargarImagenPorDefecto(e){
          e.target.src= 'http://localhost/alistamiento/public/img/vehiculos/noimage.png';
        }


        const laterald = 'http://localhost/alistamiento/public/img/vehiculos/'+placa+'/'+placa+'_laterald.png' //Img en variable para enviar lo que desees
        const contenedor3 = document.getElementById("laterald");
        contenedor3.insertAdjacentHTML(
          "beforeend",
          `<img src=${laterald} alt=${laterald} width="200px" height="200px" id="laterald1">` // Backticks para img variable
        );

        var img3 = document.getElementById('laterald1');
        img3.onerror = cargarImagenPorDefecto;
        function cargarImagenPorDefecto(e){
          e.target.src= 'http://localhost/alistamiento/public/img/vehiculos/noimage.png';
        }


        const laterali = 'http://localhost/alistamiento/public/img/vehiculos/'+placa+'/'+placa+'_laterali.png' //Img en variable para enviar lo que desees
        const contenedor4 = document.getElementById("laterali");
        contenedor4.insertAdjacentHTML(
          "beforeend",
          `<img src=${laterali} alt=${laterali} width="200px" height="200px" id="laterali1">` // Backticks para img variable
        );

        var img4 = document.getElementById('laterali1');
        img4.onerror = cargarImagenPorDefecto;
        function cargarImagenPorDefecto(e){
          e.target.src= 'http://localhost/alistamiento/public/img/vehiculos/noimage.png';
        }
    
    
    
    </script>
@endsection