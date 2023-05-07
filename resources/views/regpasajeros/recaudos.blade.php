@extends('layouts.app')
@section('title')
    Recaudos
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Recaudo Diario</h3>
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

                 

                            <!-- <div class="table-responsive"> -->
                                <table  class="table table-striped table-bordered shadow-lg mt-4  recaudos" style="width:100%;">
                                    <thead class="tabla-header-bg">
                                        <th style="display: none;">ID</th>                                                       
                                        <th ># Interno</th>
                                        <th >Conduce</th>
                                        <th >Valor</th>
                                    </thead>  
                                    <tbody>
                                 
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th style="display: none;"></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>              
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

    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.13.1/api/sum().js"></script>

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

       
        const semanaEnMilisegundos = 1000 * 60 * 60 * 24 * 7;
        const diaEnMilisegundos = 1000 * 60 * 60 * 24;

           
        $(document).ready(function () {


            const table = $('.recaudos').DataTable({

                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: {
                        url: "{{route('recaudos.recaudos')}}",
                        data: function(d) {
                            
                        },
                    },
                     "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
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
                            name: '# Interno',
                            searchable: true,
                            orderable: true
                        },
                        {
                            data: 'cod_recaudo',
                            name: 'Conduce',
                            searchable: true,
                            orderable: true

                        },
                        {
                            data: 'total_cuadre',
                            name: 'Total Cuadre',
                            searchable: true,
                            orderable: true

                        }

                    ],
                    drawCallback: function(){
                        var api = this.api();
                        
                        $(api.column(3).footer()).html(
                            'Total: '+api.column(3, {page:'current'}).data().sum()
                        );

                        $(api.column(2).footer()).html(
                            'Total conduces: '+api.column(2, {page:'current'}).rows().count()
                        );
                        console.log(table.rows().count());
                    }

            });


        });


       


        
    </script>
@endsection
