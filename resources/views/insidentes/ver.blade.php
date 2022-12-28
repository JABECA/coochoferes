@extends('layouts.app')
@section('title')
    Ver Incidente
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Incidencia Vehiculo</h3>
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


                            <form action="{{ route('insidentes.update',$insidente->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                           <label for="placa">Placa :</label><br>
                                           <label>{{ $insidente->placa }}</label>
                                           <!-- <input type="text" name="placa" class="form-control" value="{{ $insidente->placa }}" readonly> -->
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="tipo">Tipo de novedad :</label><br>
                                            <label>{{ $insidente->tipo }}</label>
                                            <!-- <input class="form-control" type="text" name="tipo"  value="{{ $insidente->tipo }}" readonly> -->
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion de la novedad :</label><br>
                                            <label>{{ $insidente->descripcion }}</label>
                                            <!-- <input class="form-control" type="text" name="descripcion"  value="{{ $insidente->descripcion }}" readonly> -->
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fecha">Fecha :</label><br>
                                            <label>{{ $insidente->fecha }}</label>
                                            <!-- <input class="form-control" type="date" name="fecha"  value="{{ $insidente->fecha }}" readonly> -->
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="duracion">Duracion :</label><br>
                                            <label>{{ $insidente->duracion }}</label>
                                            <!-- <input class="form-control" type="text" name="duracion"  value="{{ $insidente->duracion }}" readonly> -->
                                        </div>
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
