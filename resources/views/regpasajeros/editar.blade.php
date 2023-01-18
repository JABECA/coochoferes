@extends('layouts.app')
@section('title')
    Editar Liquidacion
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Liquidacion vehiculo</h3>
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
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                           <label for="num_interno">Numero Interno:</label>
                                           <!-- <input type="text" name="num_interno" class="form-control" value="{{ $regpasajero->num_interno }}" > -->
                                           {!! Form::select('num_interno', $Numerosinternos, NULL, ['class' => 'select2 form-control num_interno']  ) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fecha">Pasajeros Terminal:</label>
                                            <input class="form-control" type="number" name="cant_pasajeros_terminal"  value="{{ $regpasajero->cant_pasajeros_terminal }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fecha">Pasajeros Ruta:</label>
                                            <input class="form-control" type="number" name="cant_pasajeros"  value="{{ $regpasajero->cant_pasajeros }}">
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
