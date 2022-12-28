@extends('layouts.app')
@section('title')
    Crear Insidente
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear insidente a vehiculo</h3>
        </div>
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


                            {!! Form::open(array('route' => 'insidentes.store','method'=>'POST')) !!}
                            @csrf
                            <div class="row">

                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="num_interno">Numero Interno Vehiculo:</label> 
                                        <select class="select2 form-control" id="num_interno" name="num_interno">
                                            <option value="1">Seleccione el numero Interno</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                        <!-- {!! Form::select('num_interno', $numerosInternos, NULL, ['class' => 'select2 form-control']  ) !!} -->
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Placa Vehiculo:</label> 
                                        <select class="select2 form-control" id="placa" name="placa">
                                            
                                        </select>
                                        <!-- {!! Form::select('placa', $vehiculos, NULL, ['class' => 'select2 form-control']  ) !!} -->
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha:</label>
                                        {!! Form::date('fecha', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Tipo:</label>
                                        {!! Form::select('tipo', ['Accidente'                => 'Accidente',
                                                                  'Mantenimiento preventivo' => 'Mantenimiento preventivo',
                                                                  'Mantenimiento correctivo' => 'Mantenimiento correctivo',
                                                                  'Falla mecanica'           => 'Falla mecanica',
                                                                  'Falla electrica'          => 'Falla electrica',
                                                                  'Incapacidad conductor'    => 'Incapacidad conductor',
                                                                  'Cambio conductor'         => 'Cambio conductor',
                                                                  'Cambio propietario'         => 'Cambio propietario',
                                                                 ] , 
                                                                  NULL, 
                                                                  ['class' => 'select2 form-control']  ) 
                                        !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Descripcion:</label>
                                        {!! Form::textarea('descripcion', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div> 

                                <div class="col-xs-12 col-sm-3 col-md-3" style="display: none;">
                                    <div class="form-group">
                                        <label for="">Usuario Crea:</label>
                                        {!! Form::text('usr_crea', \Illuminate\Support\Facades\Auth::user()->name , array('class' => 'form-control')) !!}
                                    </div>
                                </div>     
                            </div>

                            <div class="row">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                           
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
     $(document).ready(function () {

        $('#num_interno').on('change', function(){
            var num_interno =  $(this).val();
            
            if($.trim(num_interno) != ''){
                $.get('/api/insidentes/'+num_interno+'/placas',  function(placas){
                        console.log(placas);
                        $('#placa').empty();
                        // $('#placa').append("<option value=''>Seleccione una placa</option>");
                        for (var i =0; i<placas.length; i++) {
                           $('#placa').append("<option value='"+placas[i].placa+"'>"+placas[i].placa+"</option>");
                        }
                });
            }
        });


     });
    
</script>

@endsection

