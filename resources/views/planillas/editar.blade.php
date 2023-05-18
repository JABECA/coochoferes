@extends('layouts.app')
@section('title')
    Editar Planilla de Alistamiento
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Planilla de Alistamiento</h3>
        </div>
        <?php 
            date_default_timezone_set('America/Bogota');
            $fecha_actual = date("Y-m-d");
            $minFceha = date("Y-m-d",strtotime($fecha_actual." - 1 days"));
            $maxFecha = date("Y-m-d",strtotime($fecha_actual));

            $time = time();
            $horaRegistro =  date("Y-m-d H:i:s", $time);

        ?>
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


                            
                            <form action="{{ route('planillas.update', $planilla->id) }}" method="POST" enctype="multipart/form-data" class="form_planillas" id="form_planillas">


                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Numero Interno:</label>
                                        <input  class="form-control" type="text"  name="num_interno" value="{{$planilla->numero_interno}}" readonly>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombre Supervisor:</label>
                                        <input  class="form-control" type="text"  name="usr_supervisa" id="usr_supervisa" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" readonly>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <label for="">Fecha de Supervisión:</label>
                                        <input type="date" name="fecha_supervision" min="<?php echo $minFceha; ?>" max="<?php echo $maxFecha; ?>"  value="<?php echo $maxFecha; ?>" class="form-control fecha_registro" readonly/>  
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-2 col-md-2" style="display: none;">
                                    <div class="form-group">
                                        <label for="">Hora:</label>
                                        <input type="text" name="hora_registro" value="<?php echo $horaRegistro; ?>" class="form-control hora_registro" />  
                                    </div>
                                </div>
                            </div>

                            
                            <!-- _____________________________________________________________________________________________________________________________ -->
                            <!-- <hr width=100% align="center"  size=20 color="#FF0000"><br> -->

                            
                            <div class="row col-xs-12 col-sm-12 col-md-12" style="border: solid;">
                                    

                                <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center; text-decoration: underline;">
                                    <h3>Llantas</h3><br>
                                </div>
                                <div id="presion1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Presion</label></li>
                                        <ol>
                                        <?php if ( $planilla->presion == 1 ): ?>
                                            <li><input class="cumple" type="radio" value="1" name="presion" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2" name="presion" /> No Cumple</li>
                                        <?php elseif ( $planilla->presion != 1 ):?>
                                            <li><input class="cumple" type="radio" value="1" name="presion"  /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2" name="presion" checked /> No Cumple</li>
                                        <?php endif ?>
                                        </ol>

                                    </ul>
                                </div>

                                <div id="labrado1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Labrado</label></li>
                                        <ol>
                                        <?php if ( $planilla->labrado == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="labrado" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="labrado" /> No Cumple</li>
                                        <?php elseif ($planilla->labrado != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="labrado" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="labrado" checked /> No Cumple</li>
                                        <?php endif ?>  
                                        </ol>
                                    </ul>
                                </div>



                                <div id="tuercas1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Tuercas Completas y Aseguradas</li>
                                        <ol>
                                        <?php if ( $planilla->tuercas == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="tuercas" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="tuercas" /> No Cumple</li>
                                        <?php elseif ($planilla->tuercas != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="tuercas" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="tuercas" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>



                                <div id="rines1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Estado de los Rines</li>
                                        <ol>
                                        <?php if ( $planilla->rines == 1): ?>
                                            <li><input class="cumple" type="radio" value="1" name="rines" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2" name="rines" /> No Cumple</li>
                                        <?php elseif ($planilla->rines != 1): ?>
                                             <li><input class="cumple" type="radio" value="1" name="rines" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2" name="rines" /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>




                                <div id="repuesto1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Estado Llanta de Repuesto</li>
                                        <ol>
                                        <?php if ( $planilla->repuesto == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="repuesto" checked/> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="repuesto" /> No Cumple</li>
                                        <?php elseif ($planilla->repuesto != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="repuesto" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="repuesto" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>
                            </div><br>

                            
                            <div class="row col-xs-12 col-sm-12 col-md-12" style="border: solid;">

                                <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center; text-decoration: underline;">
                                    <h3>Frenos</h3><br>
                                </div>
                                
                                <div id="Feno_Parqueo" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Funciona Freno de Parqueo</li>
                                        <ol>
                                        <?php if ( $planilla->freno_parqueo == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="freno_parqueo" checked/> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="freno_parqueo" /> No Cumple</li>
                                        <?php elseif ($planilla->freno_parqueo != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="freno_parqueo" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="freno_parqueo" checked/> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul> 
                                </div>

                                <div id="Sistema_Frenos" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Funciona el Sistema de Frenos</li>
                                        <ol>
                                        <?php if ( $planilla->sistema_frenos == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="sistema_frenos" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="sistema_frenos" /> No Cumple</li>
                                        <?php elseif ($planilla->sistema_frenos != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="sistema_frenos" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="sistema_frenos" checked  /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Liquido_Frenos" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Liquido de Frenos/Limites</li>
                                        <ol>
                                        <?php if ( $planilla->liquido_frenos == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="liquido_frenos" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="liquido_frenos" /> No Cumple</li>
                                        <?php elseif ($planilla->liquido_frenos != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="liquido_frenos" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="liquido_frenos" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>
                            </div><br>


                            <div class="row col-xs-12 col-sm-12 col-md-12" style="border: solid;">

                                <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center; text-decoration: underline;">
                                    <h3>Luces</h3><br>
                                </div>
                                
                                <div id="Luz_Reversa" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Enciende Luz Reversa</li>
                                        <ol>
                                        <?php if ( $planilla->luz_reversa == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="luz_reversa" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="luz_reversa" /> No Cumple</li>
                                        <?php elseif ($planilla->luz_reversa != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="luz_reversa" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="luz_reversa" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Luces_Bajas" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Enciende Luces Bajas</li>
                                        <ol>
                                        <?php if ( $planilla->luces_bajas == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="luces_bajas" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="luces_bajas" /> No Cumple</li>
                                        <?php elseif ($planilla->luces_bajas != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="luces_bajas" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="luces_bajas" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Luces_Altas" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Enciende Luces Altas</li>
                                        <ol>
                                        <?php if ( $planilla->luces_altas == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="luces_altas" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="luces_altas" /> No Cumple</li>
                                        <?php elseif ($planilla->luces_altas != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="luces_altas" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="luces_altas" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Cucuyos1" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Enciende Cocuyos</li>
                                        <ol>
                                        <?php if ( $planilla->cucuyos == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="cucuyos" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="cucuyos" /> No Cumple</li>
                                        <?php elseif ($planilla->cucuyos != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="cucuyos" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="cucuyos" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Luces_Freno" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Enciende Luces Freno</li>
                                        <ol>
                                        <?php if ( $planilla->luces_freno == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="luces_freno" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="luces_freno" /> No Cumple</li>
                                        <?php elseif ($planilla->luces_freno != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="luces_freno" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="luces_freno" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Direccionales1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Enciende Direccionales</li>
                                        <ol>
                                        <?php if ( $planilla->direccionales == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="direccionales" checked/> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="direccionales" /> No Cumple</li>
                                        <?php elseif ($planilla->direccionales != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="direccionales" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="direccionales" checked/> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>
                            </div><br>


                            <div class="row col-xs-12 col-sm-12 col-md-12" style="border: solid;">

                                <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center; text-decoration: underline;">
                                    <h3>Indicadores del Tablero</h3><br>
                                </div>
                                
                                <div id="Nivel_Conbustible" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Nivel del Combustible</li>
                                        <ol>
                                        <?php if ( $planilla->nivel_conbustible == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="nivel_conbustible" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="nivel_conbustible" /> No Cumple</li>
                                        <?php elseif ($planilla->nivel_conbustible != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="nivel_conbustible" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="nivel_conbustible" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Presion_Aceite" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Indicador Presion Aceite</li>
                                        <ol>
                                        <?php if ( $planilla->presion_aceite == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="presion_aceite" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="presion_aceite" /> No Cumple</li>
                                        <?php elseif ($planilla->presion_aceite != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="presion_aceite" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="presion_aceite" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Nivel_Bateria" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Indicador Nivel Bateria</li>
                                        <ol>
                                        <?php if ( $planilla->nivel_bateria == 1): ?>
                                            <li><input class="cumple" type="radio" value="1" name="nivel_bateria" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2" name="nivel_bateria" /> No Cumple</li>
                                        <?php elseif ($planilla->nivel_bateria != 1): ?>
                                            <li><input class="cumple" type="radio" value="1" name="nivel_bateria" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2" name="nivel_bateria" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Nivel_Temperatura" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Indicador de Temperatura</li>
                                        <ol>
                                        <?php if ( $planilla->nivel_temperatura == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="nivel_temperatura" checked /> Cumple<br/></li>
                                            <li><input class="noCumple" type="radio" value="2"  name="nivel_temperatura" /> No Cumple</li>
                                        <?php elseif ($planilla->nivel_temperatura != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="nivel_temperatura" /> Cumple<br/></li>
                                            <li><input class="noCumple" type="radio" value="2"  name="nivel_temperatura" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>
                            </div><br>

                          
                            <div class="row col-xs-12 col-sm-12 col-md-12" style="border: solid;">

                                <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center; text-decoration: underline; ">
                                    <h3>Condiciones de Funcionamiento</h3><br>
                                </div>
                                
                                <div id="retrovisores1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Espejos Retrovidores Funcionando</li>
                                        <ol>
                                        <?php if ( $planilla->retrovisores == 1): ?>
                                            <li><input class="cumple"type="radio" value="1"  name="retrovisores" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="retrovisores" /> No Cumple</li>
                                        <?php elseif ($planilla->retrovisores != 1): ?>
                                            <li><input class="cumple"type="radio" value="1"  name="retrovisores" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="retrovisores" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>


                                <div id="puertas1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Todas la Puertas Cierran y Ajustan</li>
                                        <ol>
                                        <?php if ( $planilla->puertas == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="puertas" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="puertas" /> No Cumple</li>
                                        <?php elseif ($planilla->puertas != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="puertas" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="puertas" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Nivel_Aceite" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Nivel Aceite Motor</li>
                                        <ol>
                                        <?php if ( $planilla->nivel_aceite == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="nivel_aceite" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="nivel_aceite" /> No Cumple</li>
                                        <?php elseif ($planilla->nivel_aceite != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="nivel_aceite" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="nivel_aceite" checked/> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>
                                
                                
                                <div id="Nivel_Aceite" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">No Fugas de MOtor</li>
                                        <ol>
                                        <?php if ( $planilla->fugas_motor == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="fugas_motor" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="fugas_motor" /> No Cumple</li>
                                        <?php elseif ($planilla->fugas_motor != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="fugas_motor" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="fugas_motor" checked/> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Nivel_Direccion" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Nivel Liquido Direccion</li>
                                        <ol>
                                        <?php if ( $planilla->nivel_direccion == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="nivel_direccion" checked/> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="nivel_direccion" /> No Cumple</li>
                                        <?php elseif ($planilla->nivel_direccion != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="nivel_direccion" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="nivel_direccion" checked/> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>
                                
                                <div id="Nivel_Refrigerante" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Nivel Liquido Refrigerante</li>
                                        <ol>
                                        <?php if ( $planilla->nivel_refrigerante == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="nivel_refrigerante" checked/> Cumple<br/></li>
                                            <li><input class="noCumple" type="radio" value="2"  name="nivel_refrigerante" /> No Cumple<br/></li>
                                        <?php elseif ($planilla->nivel_refrigerante != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="nivel_refrigerante" /> Cumple<br/></li>
                                            <li><input class="noCumple" type="radio" value="2"  name="nivel_refrigerante" checked/> No Cumple<br/></li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Nivel_Limpiabrisas" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Nivel Agua Limpiabrisas</li>
                                        <ol>
                                        <?php if ( $planilla->nivel_limpiabrisas == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="nivel_limpiabrisas" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="nivel_limpiabrisas" /> No Cumple</li>
                                        <?php elseif ($planilla->nivel_limpiabrisas != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="nivel_limpiabrisas" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="nivel_limpiabrisas" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="pito1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Pito Funcionando</li>
                                        <ol>
                                        <?php if ( $planilla->pito == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="pito" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="pito" /> No Cumple</li>
                                        <?php elseif ($planilla->pito != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="pito" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="pito" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="limpiabrisas1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Limpiabrisas Funcionando</li>
                                        <ol>
                                        <?php if ( $planilla->limpiabrisas == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="limpiabrisas" checked  /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="limpiabrisas" /> No Cumple</li>
                                        <?php elseif ($planilla->limpiabrisas != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="limpiabrisas" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="limpiabrisas" checked  /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Tapa_Radiador" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Radiador con Tapa Ajustada</li>
                                        <ol>
                                        <?php if ( $planilla->tapa_radiador == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="tapa_radiador" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="tapa_radiador" /> No Cumple</li>
                                        <?php elseif ($planilla->tapa_radiador != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="tapa_radiador" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="tapa_radiador" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Correa_Ventilador" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Correa Ventilador Tensionada</li>
                                        <ol>
                                        <?php if ( $planilla->correa_ventilador == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="correa_ventilador" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="correa_ventilador" /> No Cumple</li>
                                        <?php elseif ($planilla->correa_ventilador != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="correa_ventilador" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="correa_ventilador" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="bateria1" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Bateria sin Residuos</li>
                                        <ol>
                                        <?php if ( $planilla->bateria == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="bateria" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="bateria" /> No Cumple</li>
                                        <?php elseif ($planilla->bateria != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="bateria" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="bateria" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>
                                
                                <div id="bateria1" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Ajuste de Bornes</li>
                                        <ol>
                                        <?php if ( $planilla->ajuste_bornes == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="ajuste_bornes" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="ajuste_bornes" /> No Cumple</li>
                                        <?php elseif ($planilla->ajuste_bornes != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="ajuste_bornes" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="ajuste_bornes" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>
                                
                                
                                <div id="bateria1" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Transmision</li>
                                        <ol>
                                        <?php if ( $planilla->transmision == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="transmision" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="transmision" /> No Cumple</li>
                                        <?php elseif ($planilla->transmision != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="transmision" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="transmision" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>
                                
                                <div id="bateria1" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Filtros Humedos y Secos</li>
                                        <ol>
                                        <?php if ( $planilla->filtros_hys == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="filtros_hys" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="filtros_hys" /> No Cumple</li>
                                        <?php elseif ($planilla->filtros_hys != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="filtros_hys" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="filtros_hys" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>
                                
                                
                                
                                
                                
                            </div><br>


                            <div class="row col-xs-12 col-sm-12 col-md-12" style="border: solid;">

                                <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center; text-decoration: underline; ">
                                    <h3>Equipo de Carretera y Seguridad</h3><br>
                                </div>
                                
                                <div id="Conos_Triangulos_Tacos" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Conos, Triangulos, Tacos</label></li>
                                        <ol>
                                        <?php if ( $planilla->conos_triangulos_tacos == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="conos_triangulos_tacos" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="conos_triangulos_tacos" /> No Cumple</li>
                                        <?php elseif ($planilla->conos_triangulos_tacos != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="conos_triangulos_tacos" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="conos_triangulos_tacos" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="herramientas1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Herramientas</label></li>
                                        <ol>
                                        <?php if ( $planilla->herramientas == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="herramientas" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2" name="herramientas" /> No Cumple</li>                                             
                                        <?php elseif ($planilla->herramientas != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="herramientas" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2" name="herramientas" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Linterna_Gato" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Linterna, Gato</label></li>
                                        <ol>
                                        <?php if ( $planilla->linterna_gato == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="linterna_gato" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="linterna_gato" /> No Cumple</li>
                                        <?php elseif ($planilla->linterna_gato != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="linterna_gato" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="linterna_gato" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Cruceta_Llave_Pernos" class="col-xs-3 col-sm-3 col-md-3">
                                     <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Cruceta, Llave de Pernos</label></li>
                                        <ol>
                                        <?php if ( $planilla->cruceta_llave_pernos == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="cruceta_llave_pernos" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="cruceta_llave_pernos" /> No Cumple</li>
                                        <?php elseif ($planilla->cruceta_llave_pernos != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="cruceta_llave_pernos" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="cruceta_llave_pernos" checked /> No Cumple</li>
                                        <?php endif ?> 
                                            
                                        </ol>
                                    </ul>
                                </div>

                                <div id="extintor1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Extintor 5 Libras</label></li>
                                        <ol>
                                        <?php if ( $planilla->extintor == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="extintor" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="extintor" /> No Cumple</li>
                                        <?php elseif ($planilla->extintor != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="extintor" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="extintor" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Salida_Emergencia" class="col-xs-3 col-sm-3 col-md-3">
                                     <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Salidas Emergencia</label></li>
                                        <ol>
                                        <?php if ( $planilla->salida_emergencia == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="salida_emergencia" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="salida_emergencia" /> No Cumple</li>
                                        <?php elseif ($planilla->salida_emergencia != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="salida_emergencia" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="salida_emergencia" checked /> No Cumple</li>
                                        <?php endif ?> 
                                            
                                        </ol>
                                    </ul>
                                </div>

                                <div id="botiquin1" class="col-xs-3 col-sm-3 col-md-3">
                                     <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Botiquin</label></li>
                                        <ol>
                                        <?php if ( $planilla->botiquin == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="botiquin" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="botiquin" /> No Cumple</li>
                                        <?php elseif ($planilla->botiquin != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="botiquin" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="botiquin" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                  
                                </div>
                                
                                <div id="cinturones1" class="col-xs-3 col-sm-3 col-md-3">
                                     <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Cinturones de Seguridad</label></li>
                                        <ol>
                                        <?php if ( $planilla->cinturones == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="cinturones" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="cinturones" /> No Cumple</li>
                                        <?php elseif ($planilla->cinturones != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="cinturones" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="cinturones" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                   
                                </div>

                                <div id="velocimetro1" class="col-xs-4 col-sm-4 col-md-4">
                                     <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Dispositivo de Velocidad (solo colectivo)</label></li>
                                        <ol>
                                        <?php if ( $planilla->velocimetro == 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="velocimetro" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="velocimetro" /> No Cumple</li>
                                        <?php elseif ($planilla->velocimetro != 1): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="velocimetro" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="velocimetro" checked /> No Cumple</li>
                                        <?php endif ?> 
                                        </ol>
                                    </ul>
                                  
                                </div>
                            </div><br>


                            <div class="row col-xs-12 col-sm-12 col-md-12" style="border: solid;">

                                <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center; text-decoration: underline; ">
                                    <h3>Aseo y Presentacion</h3><br>
                                </div>
                                
                                <div id="aseo_general1" class="col-xs-2 col-sm-2 col-md-2">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Aseo General</label></li>
                                        <ol>
                                        <?php if ( $planilla->aseo_general == 1 ): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="aseo_general" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="aseo_general" /> No Cumple</li>
                                        <?php elseif ( $planilla->aseo_general != 1 ):?>
                                            <li><input class="cumple" type="radio" value="1"  name="aseo_general"  /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="aseo_general" checked /> No Cumple</li>   
                                        <?php endif ?>
                                           
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Conductor_Uniformado" class="col-xs-3 col-sm-2 col-md-3">
                                    
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Conductor Uniformado</label></li>
                                        <ol>
                                        <?php if ( $planilla->conductor_uniformado == 1 ): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="conductor_uniformado" checked /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="conductor_uniformado" /> No Cumple</li>
                                        <?php elseif ( $planilla->conductor_uniformado != 1 ):?>
                                            <li><input class="cumple" type="radio" value="1"  name="conductor_uniformado"  /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="conductor_uniformado" checked/> No Cumple</li>
                                        <?php endif ?>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Conductor_Carnet" class="col-xs-3 col-sm-3 col-md-3">
                                    
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Conductor con Carnet</label></li>
                                        <ol>
                                        <?php if ( $planilla->conductor_carnet == 1 ): ?>
                                            <li><input class="cumple" type="radio" value="1"  name="conductor_carnet" checked/> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="conductor_carnet" /> No Cumple</li>
                                        <?php elseif ( $planilla->conductor_carnet != 1 ):?>
                                             <li><input class="cumple" type="radio" value="1"  name="conductor_carnet" /> Cumple</li>
                                            <li><input class="noCumple" type="radio" value="2"  name="conductor_carnet" checked/> No Cumple</li>
                                        <?php endif ?>
                                           
                                        </ol>
                                    </ul><br><br>
                                   
                                </div>
                            </div><br><br>

                            <div class="row col-xs-12 col-sm-12 col-md-12" style="border: solid;">

                                <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center; text-decoration: underline; ">
                                    <h3>Aprobar Vehiculo</h3><br>
                                </div>
                                
                                <div id="aseo_general1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Aprobar/Desaprobar</label></li>
                                        <ol>
                                            <?php if ( $planilla->estado_vehiculo == 1 ): ?>
                                                <li><input  type="radio" value="1"  name="estado_vehiculo"  checked/> Aprobar Vehículo</li>
                                                <li><input  type="radio" value="2"  name="estado_vehiculo"  /> Desaprobar Vehículo</li>   
                                            <?php elseif ( $planilla->estado_vehiculo != 1 ):?>
                                                <li><input  type="radio" value="1"  name="estado_vehiculo"  /> Aprobar Vehículo</li>
                                                <li><input  type="radio" value="2"  name="estado_vehiculo" checked /> Desaprobar Vehículo</li>   
                                            <?php endif ?>
                                        </ol>
                                    </ul>
                                </div>

                            </div><br><br>
                            
                            <!-- _____________________________________________________________________________________________________________________________ -->
                            <!-- <hr width=100% align="center"  size=20 color="#FF0000"><br> -->


                            <div class="col-xs-12 col-sm-6 col-md-6" >
                                    <div class="form-group">
                                        <label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Observaciones:</label>
                                        <input type="text" name="observaciones" class="form-control observaciones" placeholder="Este campo puede ir vacio">
                                    </div>
                            </div>
                               
                          

                            <!-- conductor o usuario que esta logueado y creando la planilla -->
                            <div class="col-xs-12 col-sm-3 col-md-3" style="display: none;">
                                <div class="form-group">
                                    <label for="">Usuario Crea:</label>
                                    {!! Form::text('usr_crea', \Illuminate\Support\Facades\Auth::user()->name , array('class' => 'form-control')) !!}
                                </div>
                            </div> <br><br>
                            <input type="text" name="id" value="{{$planilla->id}}" style="display: none;">

                            <div class="btn-group">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 50px;">Guardar</button>
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

        // document.getElementById("form_planillas").addEventListener('submit', validar);

        // function validar(evt) {
            
        // var cumple   = $('.cumple:checked').length;
        //   var noCumple = $('.noCumple:checked').length;
        //   console.log(cumple);
        //   console.log(noCumple);
           
        // }

        // $('input[type="radio"]').change(function(){
        //   let cumple   = $('.cumple:checked').length;
        //   let noCumple = $('.noCumple:checked').length;
        //   console.log(cumple);
        //   console.log(noCumple);
        // });

       
        $('.form_planillas').submit(function(e){
                    
                    e.preventDefault();

                    var itemsNocumple = '';

                    
                    // ____________________________________________________________________________________________
                    var presion = $("input[type=radio][name = presion]:checked ").val();
                    if (presion) { 
                        if($("input[type=radio][name = presion]:checked ").val() == 2){
                            itemsNocumple += 'Presion';
                        }
                    } else { alert('no fue seleccionada la presion de las llantas'); return false; }
                    // ********************************************************************************************
                    

                    

                    // ____________________________________________________________________________________________
                    var labrado = $("input[type=radio][name = labrado]:checked ").val();
                    if (labrado) { 
                        if($("input[type=radio][name = labrado]:checked ").val() == 2){
                            itemsNocumple += ' Labrado ';
                        }
                    } else { alert('no fue seleccionada el labrado de las llantas'); return false; }
                    // ********************************************************************************************
                    



                    // ____________________________________________________________________________________________
                    var tuercas = $("input[type=radio][name = tuercas]:checked").val();
                    if (tuercas) { 
                        if($("input[type=radio][name = tuercas]:checked ").val() == 2){
                            itemsNocumple += ' Tuercas ';
                        }
                    } else { alert('no fue seleccionada Tuercas Completas y Aseguradas'); return false; }
                    // ********************************************************************************************
                    



                    // ____________________________________________________________________________________________
                    var rines = $("input[type=radio][name = rines]:checked ").val();
                    if (rines) { 
                        if($("input[type=radio][name = rines]:checked ").val() == 2){
                            itemsNocumple += ' Rines ';
                        }
                    } else { alert('no fue seleccionada Estado de los Rines'); return false; }
                    // ********************************************************************************************
                    



                    // ____________________________________________________________________________________________
                    var repuesto = $("input[type=radio][name = repuesto]:checked").val();
                    if (repuesto) { 
                        if($("input[type=radio][name = repuesto]:checked ").val() == 2){
                            itemsNocumple += ' Repuesto ';
                        }
                    } else { alert('no fue seleccionada Estado Llanta de Repuesto  '); return false; }
                    // ********************************************************************************************
                    



                    // ____________________________________________________________________________________________
                    var freno_parqueo = $("input[type=radio][name = freno_parqueo]:checked").val();
                    if (freno_parqueo) { 
                        if($("input[type=radio][name = freno_parqueo]:checked ").val() == 2){
                            itemsNocumple += ' FrenoParqueo ';
                        }
                    } else { alert('no fue seleccionada Funciona Freno de Parqueo'); return false; }
                    // ********************************************************************************************
                    



                    // ____________________________________________________________________________________________
                    var sistema_frenos = $("input[type=radio][name = sistema_frenos]:checked").val();
                    if (sistema_frenos) { 
                        if($("input[type=radio][name = sistema_frenos]:checked ").val() == 2){
                            itemsNocumple += ' SistemaFrenos ';
                        }
                    } else { alert('no fue seleccionada Funciona el Sistema de Frenos  '); return false; }
                    // ********************************************************************************************
                    



                    // ____________________________________________________________________________________________
                    var liquido_frenos = $("input[type=radio][name = liquido_frenos]:checked").val();
                    if (liquido_frenos) { 
                        if($("input[type=radio][name = liquido_frenos]:checked ").val() == 2){
                            itemsNocumple += ' LiquidoFrenos ';
                        }
                    } else { alert('no fue seleccionada Liquido de Frenos dentro de los limites'); return false; }
                    // ********************************************************************************************
                    



                    // ____________________________________________________________________________________________
                    var luz_reversa = $("input[type=radio][name = luz_reversa]:checked").val();
                    if (luz_reversa) { 
                        if($("input[type=radio][name = luz_reversa]:checked ").val() == 2){ 
                            itemsNocumple += ' LuzReversa ';
                        }
                    } else { alert('no fue seleccionada Enciende Luz Reversa'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var luces_bajas = $("input[type=radio][name = luces_bajas]:checked").val();
                    if (luces_bajas) { 
                        if($("input[type=radio][name = luces_bajas]:checked ").val() == 2){
                            itemsNocumple += ' LucesBajas ';
                        }
                    } else { alert('no fue seleccionada Enciende Luces Bajas '); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var luces_altas = $("input[type=radio][name = luces_altas]:checked").val();
                    if (luces_altas) { 
                        if($("input[type=radio][name = luces_altas]:checked ").val() == 2){
                            itemsNocumple += ' LucesAltas ';
                        }
                    } else { alert('no fue seleccionada Enciende Luces Altas'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var cucuyos = $("input[type=radio][name = cucuyos]:checked").val();
                    if (cucuyos) { 
                        if($("input[type=radio][name = cucuyos]:checked ").val() == 2){
                            itemsNocumple += ' Cucuyos ';
                        }
                    } else { alert('no fue seleccionada Enciende Cocuyos'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var luces_freno = $("input[type=radio][name = luces_freno]:checked").val();
                    if (luces_freno) { 
                        if($("input[type=radio][name = luces_freno]:checked ").val() == 2){
                            itemsNocumple += ' LucesFreno ';
                        }
                    } else { alert('no fue seleccionada Enciende Luces Freno'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var direccionales = $("input[type=radio][name = direccionales]:checked").val();
                    if (direccionales) { 
                        if($("input[type=radio][name = direccionales]:checked ").val() == 2){
                            itemsNocumple += ' Direccionales ';
                        }
                    } else { alert('no fue seleccionada Enciende Direccionales(adelante y atras)'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var nivel_conbustible = $("input[type=radio][name = nivel_conbustible]:checked").val();
                    if (nivel_conbustible) { 

                        if($("input[type=radio][name = nivel_conbustible]:checked ").val() == 2){
                            itemsNocumple += ' NivelCombustible ';
                        }
                    } else { alert('no fue seleccionada Nivel del Combustible '); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var presion_aceite = $("input[type=radio][name = presion_aceite]:checked").val();
                    if (presion_aceite) { 
                        if($("input[type=radio][name = presion_aceite]:checked ").val() == 2){
                            itemsNocumple += ' PresionAceite ';
                        }
                    } else { alert('no fue seleccionada Indicador Presion Aceite'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var nivel_bateria = $("input[type=radio][name = nivel_bateria]:checked").val();
                    if (nivel_bateria) { 
                        if($("input[type=radio][name = nivel_bateria]:checked ").val() == 2){
                            itemsNocumple += ' NivelBateria ';
                        }
                    } else { alert('no fue seleccionada Indicador Nivel Bateria'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var nivel_temperatura = $("input[type=radio][name = nivel_temperatura]:checked").val();
                    if (nivel_temperatura) { 
                        if($("input[type=radio][name = nivel_temperatura]:checked ").val() == 2){
                            itemsNocumple += ' NivelTemperatura ';
                        }
                    } else { alert('no fue seleccionada Indicador de Temperatura '); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var retrovisores = $("input[type=radio][name = retrovisores]:checked").val();
                    if (retrovisores) { 
                        if($("input[type=radio][name = retrovisores]:checked ").val() == 2){
                            itemsNocumple += ' Retrovisores ';
                        }
                    } else { alert('no fue seleccionada Espejos Retrovidores Funcionando'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var puertas = $("input[type=radio][name = puertas]:checked").val();
                    if (puertas) { 
                        if($("input[type=radio][name = puertas]:checked ").val() == 2){
                            itemsNocumple += ' Puertas ';
                        }
                    } else { alert('no fue seleccionada Todas la Puertas Cierran y Ajustan '); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var nivel_aceite = $("input[type=radio][name = nivel_aceite]:checked").val();
                    if (nivel_aceite) { 
                        if($("input[type=radio][name = nivel_aceite]:checked ").val() == 2){
                            itemsNocumple += ' NivelAceite ';
                        }

                    } else { alert('no fue seleccionada Nivel Aceite Motor'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var nivel_direccion = $("input[type=radio][name = nivel_direccion]:checked").val();
                    if (nivel_direccion) { 
                        if($("input[type=radio][name = nivel_direccion]:checked ").val() == 2){
                            itemsNocumple += ' NivelDireccion ';
                        }
                    } else { alert('no fue seleccionada Nivel Liquido Direccion'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var nivel_refrigerante = $("input[type=radio][name = nivel_refrigerante]:checked").val();
                    if (nivel_refrigerante) { 
                        if($("input[type=radio][name = nivel_refrigerante]:checked ").val() == 2){
                            itemsNocumple += ' NivelRefrigerante ';
                        }
                    } else { alert('no fue seleccionada Nivel Liquido Refrigerante'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var nivel_limpiabrisas = $("input[type=radio][name = nivel_limpiabrisas]:checked").val();
                    if (nivel_limpiabrisas) { 
                        if($("input[type=radio][name = nivel_limpiabrisas]:checked ").val() == 2){
                            itemsNocumple += ' NivelLimpiabrisas ';
                        }
                    } else { alert('no fue seleccionada Nivel Agua Limpiabrisas'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var pito = $("input[type=radio][name = pito]:checked").val();
                    if (pito) { 
                        if($("input[type=radio][name = pito]:checked ").val() == 2){
                            itemsNocumple += ' Pito ';
                        }
                    } else { alert('no fue seleccionada Pito Funcionando'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var limpiabrisas = $("input[type=radio][name = limpiabrisas]:checked").val();
                    if (limpiabrisas) { 
                        if($("input[type=radio][name = limpiabrisas]:checked ").val() == 2){
                            itemsNocumple += ' Limpiabrisas ';
                        }
                    } else { alert('no fue seleccionada Limpiabrisas Funcionando'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var tapa_radiador = $("input[type=radio][name = tapa_radiador]:checked").val();
                    if (tapa_radiador) { 
                        if($("input[type=radio][name = tapa_radiador]:checked ").val() == 2){
                            itemsNocumple += ' TapaRadiador ';
                        }
                    } else { alert('no fue seleccionada Radiador con Tapa Ajustada'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var correa_ventilador = $("input[type=radio][name = correa_ventilador]:checked").val();
                    if (correa_ventilador) { 
                        if($("input[type=radio][name = correa_ventilador]:checked ").val() == 2){
                            itemsNocumple += ' CorreaVentilador ';
                        }
                    } else { alert('no fue seleccionada Correa Ventilador Tensionada'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var bateria = $("input[type=radio][name = bateria]:checked").val();
                    if (bateria) { 
                        if($("input[type=radio][name = bateria]:checked ").val() == 2){
                            itemsNocumple += ' Bateria ';
                        }

                    } else { alert('no fue seleccionada Bateria sin Residuos'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var conos_triangulos_tacos = $("input[type=radio][name = conos_triangulos_tacos]:checked").val();
                    if (conos_triangulos_tacos) { 
                        if($("input[type=radio][name = conos_triangulos_tacos]:checked ").val() == 2){
                            itemsNocumple += ' ConosTriangulosTacos ';
                        }
                    } else { alert('no fue seleccionada Conos, Triangulos, Tacos'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var herramientas = $("input[type=radio][name = herramientas]:checked").val();
                    if (herramientas) { 
                        if($("input[type=radio][name = herramientas]:checked ").val() == 2){
                            itemsNocumple += ' Herramientas ';
                        }

                    } else { alert('no fue seleccionada Herramientas'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var linterna_gato = $("input[type=radio][name = linterna_gato]:checked").val();
                    if (linterna_gato) { 
                        if($("input[type=radio][name = linterna_gato]:checked ").val() == 2){
                            itemsNocumple += ' LinternaGato ';
                        }
                    } else { alert('no fue seleccionada Linterna, Gato'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var cruceta_llave_pernos = $("input[type=radio][name = cruceta_llave_pernos]:checked").val();
                    if (cruceta_llave_pernos) { 
                        if($("input[type=radio][name = cruceta_llave_pernos]:checked ").val() == 2){
                            itemsNocumple += ' CrucetaLlavePernos ';
                        }

                    } else { alert('no fue seleccionada Cruceta, Llave de Pernos'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var extintor = $("input[type=radio][name = extintor]:checked").val();
                    if (extintor) { 
                        if($("input[type=radio][name = extintor]:checked ").val() == 2){
                            itemsNocumple += ' Extintor ';
                        }

                    } else { alert('no fue seleccionada Extintor 5 Libras'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var salida_emergencia = $("input[type=radio][name = salida_emergencia]:checked").val();
                    if (salida_emergencia) { 
                        if($("input[type=radio][name = salida_emergencia]:checked ").val() == 2){
                            itemsNocumple += ' SalidaEmergencia ';
                        }

                    } else { alert('no fue seleccionada Salidas de Emergencia'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var botiquin = $("input[type=radio][name = botiquin]:checked").val();
                    if (botiquin) { 
                        if($("input[type=radio][name = botiquin]:checked ").val() == 2){
                            itemsNocumple += ' Botiquin ';
                        }
                    } else { alert('no fue seleccionada Botiquin'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var cinturones = $("input[type=radio][name = cinturones]:checked").val();
                    if (cinturones) { 
                        if($("input[type=radio][name = cinturones]:checked ").val() == 2){
                            itemsNocumple += ' Cinturones ';
                        }
                    } else { alert('no fue seleccionada Cinturones de Seguridad'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var velocimetro = $("input[type=radio][name = velocimetro]:checked").val();
                    if (velocimetro) { 
                        if($("input[type=radio][name = velocimetro]:checked ").val() == 2){
                            itemsNocumple += ' Velocimetro ';
                        }
                    } else { alert('no fue seleccionada Dispositivo de Velocidad (solo colectivo)'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var aseo_general = $("input[type=radio][name = aseo_general]:checked").val();
                    if (aseo_general) { 
                        if($("input[type=radio][name = aseo_general]:checked ").val() == 2){
                            itemsNocumple += ' AseoGeneral ';
                        }
                    } else { alert('no fue seleccionada Aseo General'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var conductor_uniformado = $("input[type=radio][name = conductor_uniformado]:checked ").val();
                    if (conductor_uniformado) { 
                        if($("input[type=radio][name = conductor_uniformado]:checked ").val() == 2){
                            itemsNocumple += ' ConductorUniformado ';
                        }
                    } else { alert('no fue seleccionada Conductor Uniformado'); return false; }
                    // ********************************************************************************************


                    // ____________________________________________________________________________________________
                    var conductor_carnet = $("input[type=radio][name = conductor_carnet]:checked").val();
                    if (conductor_carnet) { 
                        if($("input[type=radio][name = conductor_carnet]:checked ").val() == 2){
                            itemsNocumple += ' ConductorCarnet ';
                        }
                    } else { alert('no fue seleccionada Conductor con Carnet'); return false; }
                    // ********************************************************************************************


                    var estado_vehiculo = $("input[type=radio][name = estado_vehiculo]:checked ").val();
                    if (estado_vehiculo) { console.log(estado_vehiculo);} else { alert('no fue seleccionada la aprobacion o desaprobacion del vehículo'); return false; }

                   

                    if (estado_vehiculo == 2) {
                        var mensajeVehiculo = 'e Inhabilitar el Vehículo';
                    }else{
                        var mensajeVehiculo = 'y Habilitar el Vehículo';
                    }

                    var mensaje = '';
                    if(itemsNocumple != ''){
                        mensaje = 'Los Items que no cumplen requerimientos de seguridad son: '+itemsNocumple;
                    }

                    // var cumple   = $('.cumple:checked').length;
                    // var noCumple = $('.noCumple:checked').length;
                    // if (noCumple > 0) { var mensaje = "Existen "+noCumple+ " items que no cumplen los requerimientos de seguridad";}else{var mensaje = "";}

                    // console.log(cumple);
                    // console.log(noCumple);

                    Swal.fire({
                      title: mensaje,
                      text: 'Estas seguro(a) de guardar la planilla '+mensajeVehiculo+' ?',
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Si, grabar el registro!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                       this.submit()
                       
                      }
                    });
                });
    </script>

    <script type="text/javascript">

   
    </script>

@endsection

