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
                                        <th >Conductor</th>
                                        <th >Pasajeros Terminal</th>
                                        <th >Pasajeros Ruta</th>
                                        <th >Ruta</th>
                                        <th >Total cuadre</th>
                                        <th >Fecha Ruta</th>
                                        <th >Fecha/Hora Liquidacion</th>
                                        <th >Usr Liquida</th> <!--  -->
                                        <th >Fecha/hora Recaudo</th> <!--  -->
                                        <th >Usr recaudo</th>  <!--  -->
                                        <th >Codigo recaudo</th>
                                        <th >Estado/Cod recaudo</th>
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
            // let imageLogo = "{{ asset('img/logo_solo.png') }}";

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
                            data: 'nombre_conductor',
                            name: 'Conductor',
                            searchable: true,
                            orderable: true
                        },
                        {
                            data: 'cant_pasajeros_terminal',
                            name: 'Pasajeros Terminal',
                            searchable: true,
                            orderable: true

                        },
                        {
                            data: 'cant_pasajeros',
                            name: 'Pasajeros Ruta',
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
                    ],

                    buttons: [

                        {
                            extend: 'excel',
                            className: 'btn-light',
                            text: 'Excel',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },

                        {
                            extend: 'pdf',
                            className: 'btn-light',
                            filename: 'Administrador de recaudos',
                            pageSize: 'A4',
                            text: 'PDF',
                            orientation: 'landscape',
                            exportOptions: {
                                columns: [1,2,3,4,5,6,7,8,9,10,11,13],
                                search: 'applied',
                                order: 'applied'
                            },
                            customize: function (doc) {
                        //Remove the title created by datatTables
                        doc.content.splice(0,1);
                        //Create a date string that we use in the footer. Format is dd-mm-yyyy
                        var now = new Date();
                        var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();
                        // Logo converted to base64
                        // var logo = getBase64FromImageUrl('https://datatables.net/media/images/logo.png');
                        // The above call should work, but not when called from codepen.io
                        // So we use a online converter and paste the string in.
                        // Done on http://codebeautify.org/image-to-base64-converter
                        // It's a LONG string scroll down to see the rest of the code !!!
                        var logo = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAA7EAAAEJCAYAAABCJaBoAAAACXBIWXMAAA7DAAAOwwHHb6hkAAAAIGNIUk0AAHolAACAgwAA+f8AAIDoAABSCAABFVgAADqXAAAXb9daH5AAAFw0SURBVHja7N15mFTlgT/676mtt2roZu3uCIrYhbgmXShmEulOMBlnaC93JomKQ8Zkoig3Zn6PQXLvnd8TEZJJJsPiLxnnEpZMfpkY1IyTZxzAmEQT0LggNGJUlEYEQWjWXqu61lPv/aOqoLqpqq7lfU+dU/X9PE8/LN1ddeos73m/5900IQSIiIiIiIiIrMDGXUBEREREREQMsUREREREREQMsURERERERMQQS0RERERERMQQS0RERERERMQQS0RERERERAyxRERERERERAyxRERERERERAyxRERERERExBBLRERERERExBBLRERERERExBBLREREREREDLFEREREREREDLFEREREREREDLFERERERETEEEtERERERETEEEtkWnbuAiIiIiIihlgiq3BxFxARERERMcQSWUU1dwEREREREUMskVVUAdC4G4iIiIiIGGKJrIDdiYmIiIiIGGKJLBM47WBLLBERERERQyyRArUlvpYciS8bry0iIiIiIjUc3AVUZiG2X/Jr6gBEmv93IT7pkzvxvlWIt9oKADEAIQDDAHwAggDCPDxERERERAyxRKmqEG8BjUl8zfCoEFsLYELiKzlz8esZfvfGxJ9BAL2Jr2EeJiIiIiIihlgiAHBKfr0bAXSnXCuTADQlwvKuHH4/NdzOTfz+SQBnAUR5uIiIiIiIGGKpstkhtyU2jHi34FoAHwPQiMytrmPZlRKM6wEcB1tliYiIiIjyxslniDIbQPxBz4wiA2yq1xOvNQNAHXcxEREREVF+2BJL5USH3PGwAQDTAbwjeTuTYfhqAIfBFlkiIiIiopyxJZbKSURyiD2pIMCmqkO8mzIfJhERERERMcRShbkW8fGrhdJSvoyS7Fo8iYePiIiIiCg3bAGicpJPt1w74rMMJ7+ciK/9esjgbX4dwMcRX982yENIRERERMQQS5UhmmOIdQEYB2A84uu82gH8qcTbXoV4a+xHPIxERERERNlpQgjuBbK66xBfe/VElp+xA2hIhMUqEwTXdJ/hPcSX9SEiIiIiogzYEkvlIAKgN8v3qwA0Id4C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';
                        // A documentation reference can be found at
                        // https://github.com/bpampuch/pdfmake#getting-started
                        // Set page margins [left,top,right,bottom] or [horizontal,vertical]
                        // or one number for equal spread
                        // It's important to create enough space at the top for a header !!!
                        doc.pageMargins = [30,70,20,30];
                        // Set the font size fot the entire document
                        doc.defaultStyle.fontSize = 7;
                        // Set the fontsize for the table header
                        doc.styles.tableHeader.fontSize = 7;
                        // Create a header object with 3 columns
                        // Left side: Logo
                        // Middle: brandname
                        // Right side: A document title
                        doc['header']=(function(page, pages) {
                            return {
                                columns: [
                                    {
                                        image: logo,
                                        width: 130,
                                        margin: [30]
                                    },
                                    {
                                        alignment: 'center',
                                        italics: true,
                                        text: 'SISTEMA DE GESTION DE CALIDAD                                                                                                                           PROCESO TRA-TRANSPORTE                                                                                                                                   PLANILLA DE MOVILIZACION DE PASAJEROS',
                                        fontSize: 12,
                                        // margin: [10,0]
                                    },
                                   
                                    {
                                        alignment: 'center',
                                        fontSize: 12,
                                        text: 'Codigo: SGC-FOR-TRA-032                                                                                                                                                  Version: 001                                                                                                                                        Fecha: 10/07/2019                                                                                                                                                             Página  '+page.toString()+' de '+pages.toString()
                                    }
                                ],
                                margin: 5
                            }
                        });
                        // Create a footer object with 2 columns
                        // Left side: report creation date
                        // Right side: current page and total pages
                        doc['footer']=(function(page, pages) {
                            return {
                                columns: [
                                    {
                                        alignment: 'left',
                                        text: ['Creado el: ', { text: jsDate.toString() }]
                                    },
                                    {
                                        alignment: 'right',
                                        text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                                    }
                                ],
                                margin: 10
                            }
                        });
                        // Change dataTable layout (Table styling)
                        // To use predefined layouts uncomment the line below and comment the custom lines below
                        // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
                        var objLayout = {};
                        objLayout['hLineWidth'] = function(i) { return .5; };
                        objLayout['vLineWidth'] = function(i) { return .5; };
                        objLayout['hLineColor'] = function(i) { return '#aaa'; };
                        objLayout['vLineColor'] = function(i) { return '#aaa'; };
                        objLayout['paddingLeft'] = function(i) { return 4; };
                        objLayout['paddingRight'] = function(i) { return 4; };
                        doc.content[0].layout = objLayout;
                }
                        },

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
