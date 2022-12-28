@extends('layouts.app')
@section('title')
    Editar Incidente
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar incidente vehiculo</h3>
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


                            <form action="{{ route('insidentes.update', $insidente->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                           <label for="num_interno">Placa:</label>
                                           <input type="text" name="num_interno" class="form-control" value="{{ $insidente->placa }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="tipo">Tipo:</label>
                                            <!-- <input class="form-control" type="text" name="tipo"  value="{{ $insidente->tipo }}"> -->
                                            {!! Form::select('tipo', ['Accidente'                => 'Accidente',
                                                              'Mantenimiento preventivo' => 'Mantenimiento preventivo',
                                                              'Mantenimiento correctivo' => 'Mantenimiento correctivo',
                                                              'Falla mecanica'           => 'Falla mecanica',
                                                              'Falla electrica'          => 'Falla electrica',
                                                              'Incapacidad conductor'    => 'Incapacidad conductor'
                                                             ] , 
                                                              $insidente->tipo, 
                                                              ['class' => 'select2 form-control']  )  !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fecha">Fecha:</label>
                                            <input class="form-control" type="date" name="fecha"  value="{{ $insidente->fecha }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                   

                                    <div class="col-xs-12 col-sm-9 col-md-9">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <input type="text" class="form-control" name="descripcion"  value="{{ $insidente->descripcion }}"></textarea>
                                        </div>
                                    </div>
                                  
                                </div>

                                <!--BOTTON para hacer el submit y guardar el registro  -->
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 " >
                                         <div class="form-floating">
                                            <button type="submit" class="btn btn-primary">Guardar</button>                            
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
