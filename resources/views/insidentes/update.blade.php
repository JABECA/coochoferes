@extends('layouts.app')
@section('title')
    Editar Incidente
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Probando actualizar</h3>
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


                            <form action="{{ route('insidentes.actualizar', $insidente->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                           <label for="id_incidente">Incidente:</label>
                                           <input type="text" name="id_incidente" class="form-control" value="{{ $insidente->id }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                           <label for="solucion">Descripcion de la Solucion :</label>
                                           <input type="text" name="solucion" class="form-control" value="" required>
                                        </div>
                                    </div>
                                   

                                     <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                           <label for="duracion">Duracion:(dias)</label>
                                           <input type="text" name="duracion" class="form-control" value="" required >
                                        </div>
                                    </div>

                                     <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                           <input type="text" name="estado" class="form-control" value="1" hidden>
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
