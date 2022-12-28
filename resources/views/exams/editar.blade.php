@extends('layouts.app')
@section('title')
    Editar Examen
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar examen conductor</h3>
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


                            <form action="{{ route('exams.update',$exam->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="">Conductor:</label>

                                            <select name="id_conductor" class="select2 form-control" disabled>
                                                 <option value="{{ $exam->id_conductor}}">{{$driver}}</option>
                                               <?php
                                               
                                                foreach($conductores as $clave => $valor){

                                                    echo '
                                                        <option value=" '.$valor['id'].'">'.$valor['nombres'].' '.$valor['apellidos'].'</option>
                                                    ';
                                                }
                                               ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="tipo">Tipo:</label>
                                            <input class="form-control" type="text" name="tipo"  value="{{ $exam->tipo }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion:</label>
                                            <input class="form-control" type="textarea" name="descripcion"  value="{{ $exam->descripcion }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="fecha">Fecha:</label>
                                            <input class="form-control" type="date" name="fecha"  value="{{ $exam->fecha }}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="vigencia">Vigencia:</label>
                                            <input class="form-control" type="text" name="vigencia"  value="{{ $exam->vigencia }}">
                                        </div>
                                    </div>

                                    
                                    <!--BOTTON para hacer el submit y guardar el registro  -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 " >
                                         <div class="form-floating">
                                            <button type="submit" class="btn btn-primary">Guardar</button>                            
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
