@extends('layouts.app')
@section('title')
    Editar Liquidacion
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Liquidaci&oacuten Veh&iacuteculo</h3>
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


                            <form action="{{ route('regpasajeros.updateLiquidacion', $regpasajero->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    
                                    <div class="col-xs-12 col-sm-3 col-md-3" hidden>
                                        <div class="form-group">
                                            <label for="id">Ruta: </label>
                                            <input class="form-control" type="text" name="id"  value="{{ $regpasajero->id }}" readonly>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                           <label for="num_interno">N&uacutemero Interno:</label>
                                           <!-- <input type="text" name="num_interno" class="form-control" value="{{ $regpasajero->num_interno }}" > -->
                                           {!! Form::select('num_interno', $Numerosinternos, $regpasajero->num_interno , ['class' => 'select2 form-control num_interno']  ) !!}
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="ruta">Ruta: </label>
                                            <!--<input class="form-control" type="text" name="ruta"  value="{{ $regpasajero->ruta }}" >-->
                                            {!! Form::select('ruta', ['Armenia'=>'Armenia','Cartago'=>'Cartago','Virginia'=>'Virginia'],$regpasajero->ruta,['class'=>'select2 form-control ruta'] )!!}
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fecha">Pasajeros Terminal:</label>
                                            <input class="form-control" type="number" id="cant_pasajeros_terminal" name="cant_pasajeros_terminal"  value="{{ $regpasajero->cant_pasajeros_terminal }}" required readonly>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fecha">Pasajeros Ruta:</label>
                                            <input class="form-control" type="number" name="cant_pasajeros"  value="{{ $regpasajero->cant_pasajeros }}" required>
                                        </div>
                                    </div>
                                 
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="cod_recaudo">Conduce:</label>
                                            <input class="form-control" type="text" name="cod_recaudo"  value="{{ $regpasajero->cod_recaudo }}" >
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones:</label>
                                            <input class="form-control" type="text" name="observaciones"  value="{{ $regpasajero->observaciones }}" required>
                                        </div>
                                    </div>


                                </div>

                                <!--BOTTON para hacer el submit y guardar el registro  -->
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 " >
                                         <div class="form-floating">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>                            
                                        </div>
                                    </div>
                                   
                                </div>
                            </form>

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
        $(document).ready(function(){
            $(".ruta").change(function(){
                var valor_real = '{{ $regpasajero->cant_pasajeros_terminal }}';
                var ruta = $('.ruta').val();

                if (ruta == 'Cartago'){
                    $('#cant_pasajeros_terminal').attr('readonly', false);  
                    $('#cant_pasajeros_terminal').val(valor_real);
                }else{
                    $('#cant_pasajeros_terminal').attr('readonly', true);  
                    $('#cant_pasajeros_terminal').val(valor_real);
                }

            });
           
        });    
    </script>
@endsection

