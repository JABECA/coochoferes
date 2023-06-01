@extends('layouts.app')
@section('title')
    Personas
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Propietarios y/o Conductores</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        
                        <div class="row justify-content-center">
                            
                            <div class="col-md-1" style="padding-top: 30px;">
                                <label>Filtro por tipo de persona: </label>
                            </div>

                            <div class="col-md-2" style="padding-top: 30px;">
                                <select class="select2 form-control tipo_persona" name="tipo_persona">
                                    <option value="">Todos</option>
                                    <option value="id_propietario">Propietarios</option>
                                    <option value="id_conductor">Conductores</option>
                                </select>
                            </div>

                            <div class="col-md-1">
                                <label style="color: white;">Filtrar</label>
                                <button class="form-control btn btn-info" id="filtrar"><i class="fa fa-search"></i></button>
                            </div>
                           
                            
                        </div>


                        @can('crear-persona')
                        <a class="btn btn-warning" href="{{ route('personas.create') }}">Nuevo</a> <br><br>                       
                        @endcan 

                       

                            <!-- <div class="table-responsive"> -->
                                <table id="vehiculos" class="table table-striped table-bordered shadow-lg mt-4 dt-responsive" style="width:100%;">
                                    <thead class="tabla-header-bg">
                                        <th style="display: none;">ID</th>                                                       
                                        <th style="color:#fff;">Nombres</th>
                                        <th style="color:#fff;">Apellidos</th>
                                        <th style="color:#fff;">Identificación</th>
                                        <th style="color:#fff;">Celular</th>
                                        <th style="color:#fff;">Propietario</th>
                                        <th style="color:#fff;">Conductor</th>
                                        <th style="color:#fff;">Estado</th>
                                        <th style="color:#fff;">Inducciones</th>
                                        <th style="color:#fff;">Vacaciones</th>
                                        <th style="color:#fff;">Acciones</th>
                                    </thead>  
                                    <tbody>
                                    @foreach ($personas as $persona)
                                    <tr>
                                        <td style="display: none;">{{ $persona->id }}</td>                          
                                        <td>{{ $persona->nombres }}</td>
                                        <td>{{ $persona->apellidos }}</td>
                                        <td>{{ $persona->identificacion }}</td>
                                        <td>{{ $persona->celular }}</td>
                                        <td>{{ $persona->propietario }}</td>
                                        <td>{{ $persona->conductor }}</td>
                                        <td> 
                                            <?php if ($persona->estado == '1'): ?>
                                                    <a  class="btn btn-success btn-sm" href="/personas/{{$persona->id}}/0" data-bs-toggle="mensaje" title="Desactivar Registro" style="margin-right: 6px;">
                                                        Activo
                                                    </a>
                                                    <?php else: ?>
                                                    <a  class="btn btn-danger btn-sm" href="/personas/{{$persona->id}}/1" data-bs-toggle="mensaje" title="Activar Registro" style="margin-right: 6px;">
                                                        Inactivo
                                                    </a>    
                                            <?php endif ?>
                                        </td>
                                        <th style="color:#fff;"><a href="/exams/{{$persona->id}}">Examenes/Inducciones</a></th>
                                        <th style="color:#fff;"><a href="/vacaciones/{{$persona->id}}">Vacaciones</a></th>
                                        <td>
                                        <form action="{{ route('personas.destroy',$persona->id) }}" method="POST" class="form_persona">    

                                            <!-- <a class="btn btn-success" href="{{ route('personas.edit',$persona->id) }}">Ver</a> -->
                                            <div class="btn-group">
                                               
                                                @can('ver-persona')
                                                    <a class="btn btn-success btn-sm" href="{{ route('personas.show', $persona->id) }}" data-bs-toggle="tooltip" data-placement="top" title="Ver registro" style="margin-right: 6px;">
                                                        <i class='fa fa-eye'></i>
                                                    </a>
                                                @endcan

                                                @can('editar-persona')
                                                <a class="btn btn-info btn-sm" href="{{ route('personas.edit', $persona->id) }}" data-bs-toggle="tooltip" title="Editar Registro" style="margin-right: 6px;">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                @endcan

                                                @csrf
                                                @method('DELETE')
                                                @can('borrar-persona')
                                                <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="mensaje" title="Borrar Registro" style="margin-right: 6px;">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                                @endcan
                                              
                                            </div>
                                        </form>
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

    @if(session('examenes') == 'error')
         <script type="text/javascript">
             Swal.fire(
                  'no encontrado!',
                  'El conductor no tiene examenes.',
                  'error'
                )
        </script>
    @endif

    <script type="text/javascript">
        
        $('.form_persona').submit(function(e){
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
                this.submit();
               
              }
            });
        });

        $(document).ready(function () {
            $('#vehiculos').DataTable({
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
