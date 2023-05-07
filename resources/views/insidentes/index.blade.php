@extends('layouts.app')
@section('title')
    Incidentes
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Incidencias en Vehículos</h3>
        </div>
                                                   
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
       
                        @can('crear-insidente')
                        <a class="btn btn-warning" href="{{ route('insidentes.create') }}">Nuevo</a> <br><br>

                        @endcan 
        
                            <!-- <div class="table-responsive"> -->
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
                                        <th style="color:#fff;">Acciones</th>
                                    </thead>  
                                    <tbody>
                                    @foreach ($insidentes as $insidente)
                                    <tr>
                                        <td style="display: none;">{{ $insidente->id }}</td>
                                        <td>{{ $insidente->num_interno}}</td>                          
                                        <td>{{ $insidente->placa }}</td>
                                        <td>{{ $insidente->tipo }}</td>
                                         <td>{{ $insidente->fecha }}</td>
                                         <td>{{ $insidente->descripcion }}</td>
                                         <td>{{ $insidente->duracion }}</td>
                                         <td>{{ $insidente->solucion }}</td>
                                        <td> 
                                            @if($insidente->estado == '1')
                                            <a  class="btn btn-success btn-sm" data-toggle="mensaje" title="Novedad solucionada" style="margin-right: 6px;">
                                                Finalizada
                                            </a>
                                            @else
                                            <!-- <a class="btn btn-danger btn-sm" title="Finalizar novedad" href="{{ route('insidentes.edit',$insidente->id) }}"> En curso
                                            </a> -->
                                                @can('editar-insidente')
                                                <a  class="btn btn-danger btn-sm" 
                                                    title="Finalizar novedad" 
                                                    href="{{ route('insidentes.duracion',$insidente->id) }}" >
                                                    En curso
                                                </a>
                                                @endcan
                                            @endif 

                                                                             
                                        </td>
                                       
                                        <td>
                                            <div class="btn-group">
                                               
                                                @can('ver-insidente')
                                                    <a class="btn btn-success btn-sm" href="{{ route('insidentes.show',$insidente->id) }}" data-bs-toggle="tooltip" data-placement="top" title="Ver registro" style="margin-right: 6px;">
                                                        <i class='fa fa-eye'></i>
                                                    </a>
                                                @endcan

                                                @can('editar-insidente')
                                                <?php if ($insidente->estado == '0'): ?>
                                                    <a class="btn btn-info btn-sm" href="{{ route('insidentes.edit',$insidente->id) }}" data-bs-toggle="tooltip" title="Editar Registro" style="margin-right: 6px;" >
                                                    <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                <?php endif ?>

                                                @endcan

                                                <form action="{{ route('insidentes.destroy',$insidente->id) }}" method="POST" class="form_insidentes">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-insidente')
                                                    <!-- <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="mensaje" title="Borrar Registro" style="margin-right: 6px;">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button> -->
                                                    @endcan  
                                                </form>
                                               
                                                  
                                            </div>
                                           
                                        </td>
                                    </tr>


                                    @endforeach
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

    @include('insidentes.actualizar')


@endsection


@section('scripts')
    
    <!-- DATA TABLES  -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.js"></script>
    <script src="{{ asset('js/incidente.js') }}"></script>

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


      
         $('.form_insidentes').submit(function(e){
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
            dom: 'lBfrtip',  //dom: 'lBfrtip',
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

        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();   
        });

        
    </script>
@endsection
