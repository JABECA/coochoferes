@extends('layouts.app')
@section('title')
    Crear Planilla de Alistamiento
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Planilla de Alistamiento</h3>
        </div>
        <?php 
            date_default_timezone_set('America/Bogota');
            $fecha_actual = date("Y-m-d");
            // $minFceha = date("Y-m-d",strtotime($fecha_actual." - 7 days"));
            // $maxFecha = date("Y-m-d",strtotime($fecha_actual." + 7 days"));

             $minFceha = date("Y-m-d",strtotime($fecha_actual));
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


                        {!! Form::open(array('route' => 'planillas.store','method'=>'POST',  'class' => 'form_planillas', 'enctype' => 'multipart/form-data')) !!}
                            
                            <div class="row">

                                <div class="col-xs-12 col-sm-2 col-md-2" >
                                    <div class="form-group">
                                        <label for="">N&uacutemero Interno:</label><br>
                                        <input type="number" name="num_interno" id="num_interno" value="{{$num_interno}}" >
                                       
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3 col-md-3" >
                                    <div class="form-group">
                                        <label for="">Nombre Conductor:</label>
                                        <input  class="form-control" type="text"  name="nombre_conductor" id="nombre_conductor" value="{{$conductor}}" >
                                        <!-- {!! Form::text('usr_crea', \Illuminate\Support\Facades\Auth::user()->name , array('class' => 'form-control')) !!} -->
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-2 col-md-2" >
                                    <div class="form-group">
                                        <label for="">Fecha:</label>
                                        <input type="date" name="fecha_registro" min="<?php echo $minFceha; ?>" max="<?php echo $maxFecha; ?>"  value="<?php echo $maxFecha; ?>" class="form-control fecha_registro" />  
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-2 col-md-2" style="display: none;">
                                    <div class="form-group">
                                        <label for="">Hora:</label>
                                        <input type="text" name="hora_registro" value="<?php echo $horaRegistro; ?>" class="form-control hora_registro" />  
                                    </div>
                                </div>
                            </div>


                            <div class="row col-xs-12 col-sm-12 col-md-12" style="border: solid;">
                                    

                                <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center; text-decoration: underline;">
                                    <h3>Llantas</h3><br>
                                </div>
                                <div id="presion1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Presi&oacuten</label></li>
                                        <ol>
                                            <li><input type="radio" value="1" id="presion" name="presion"  /> Cumple</li>
                                            <li><input type="radio" value="2" id="presion" name="presion"  /> No Cumple</li>
                                        </ol>

                                    </ul>
                                </div>

                                <div id="labrado1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Labrado</label></li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="labrado" /> Cumple</li>
                                            <li><input type="radio" value="2"  name="labrado" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>



                                <div id="tuercas1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Tuercas Completas y Aseguradas</li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="tuercas" /> Cumple</li>
                                            <li><input type="radio" value="2"  name="tuercas" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>



                                <div id="rines1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Estado de los Rines</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="rines" /> Cumple</li>
                                            <li><input type="radio" value="2" name="rines" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>


                                <div id="repuesto1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Estado Llanta de Repuesto</li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="repuesto" /> Cumple</li>
                                            <li><input type="radio" value="2"  name="repuesto" /> No Cumple</li>
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
                                            <li><input type="radio" value="1"  name="freno_parqueo" /> Cumple</li>
                                            <li><input type="radio" value="2"  name="freno_parqueo" /> No Cumple</li>
                                        </ol>
                                    </ul> 
                                </div>

                                <div id="Sistema_Frenos" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Funciona el Sistema de Frenos</li>
                                        <ol>
                                            <li><input type="radio" value="1"   name="sistema_frenos" /> Cumple</li>
                                            <li><input type="radio" value="2"   name="sistema_frenos" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Liquido_Frenos" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Liquido de Frenos/Limites</li>
                                        <ol>
                                            <li><input type="radio" value="1"   name="liquido_frenos" /> Cumple</li>
                                            <li><input type="radio" value="2"   name="liquido_frenos" /> No Cumple</li>
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
                                            <li><input type="radio" value="1" name="luz_reversa" /> Cumple</li>
                                            <li><input type="radio" value="2"  name="luz_reversa" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Luces_Bajas" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Enciende Luces Bajas</li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="luces_bajas" /> Cumple</li>
                                            <li><input type="radio" value="2"  name="luces_bajas" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Luces_Altas" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Enciende Luces Altas</li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="luces_altas" /> Cumple</li>
                                             <li><input type="radio" value="2"  name="luces_altas" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Cucuyos1" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Enciende Cocuyos</li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="cucuyos" /> Cumple</li>
                                            <li><input type="radio" value="2"  name="cucuyos" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Luces_Freno" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Enciende Luces Freno</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="luces_freno" /> Cumple</li>
                                            <li><input type="radio" value="2" name="luces_freno" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Direccionales1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Enciende Direccionales</li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="direccionales" /> Cumple</li>
                                            <li><input type="radio" value="2"  name="direccionales" /> No Cumple</li>
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
                                            <li><input type="radio" value="1"  name="nivel_conbustible"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="nivel_conbustible" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Presion_Aceite" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Indicador Presi&oacuten Aceite</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="presion_aceite"  /> Cumple</li>
                                            <li><input type="radio" value="2" name="presion_aceite" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Nivel_Bateria" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Indicador Nivel Bateria</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="nivel_bateria"  /> Cumple</li>
                                            <li><input type="radio" value="2" name="nivel_bateria" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Nivel_Temperatura" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Indicador de Temperatura</li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="nivel_temperatura"  /> Cumple<br/></li>
                                            <li><input type="radio" value="2"  name="nivel_temperatura" /> No Cumple</li>
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
                                            <li><input type="radio" value="1"  name="retrovisores"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="retrovisores" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>


                                <div id="puertas1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Todas la Puertas Cierran y Ajustan</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="puertas"  /> Cumple</li>
                                            <li><input type="radio" value="2" name="puertas" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Nivel_Aceite" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Nivel Aceite Motor</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="nivel_aceite"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="nivel_aceite" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>
                                
                                <div id="bateria1" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">No Fugas de Motor</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="fugas_motor"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="fugas_motor" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Nivel_Direccion" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Nivel Liquido Direcci&oacuten</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="nivel_direccion" /> Cumple</li>
                                            <li><input type="radio" value="2" name="nivel_direccion" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>
                                
                                 <div id="Nivel_Refrigerante" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Nivel Liquido Refrigerante</li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="nivel_refrigerante" /> Cumple<br/></li>
                                            <li><input type="radio" value="2"  name="nivel_refrigerante" /> No Cumple<br/></li>
                                        </ol>
                                    </ul>
                                </div>

                                 <div id="Nivel_Limpiabrisas" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Nivel Agua Limpiabrisas</li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="nivel_limpiabrisas"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="nivel_limpiabrisas" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="pito1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Pito Funcionando</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="pito"  /> Cumple</li>
                                            <li><input type="radio" value="2" name="pito" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="limpiabrisas1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Limpiabrisas Funcionando</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="limpiabrisas"   /> Cumple</li>
                                            <li><input type="radio" value="2"  name="limpiabrisas" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                 <div id="Tapa_Radiador" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Radiador con Tapa Ajustada</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="tapa_radiador"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="tapa_radiador" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                 <div id="Correa_Ventilador" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Correa Ventilador Tensionada</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="correa_ventilador"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="correa_ventilador" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                 <div id="bateria1" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Bateria sin Residuos</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="bateria"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="bateria" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>
                                
                                <div id="bateria1" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Ajuste de Bornes</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="ajuste_bornes"  /> Cumple</li>
                                            <li><input type="radio" value="2" name="ajuste_bornes" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>
                                
                             
                                
                                <div id="bateria1" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Transmisi&oacuten</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="transmision"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="transmision" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>
                                
                                <div id="bateria1" class="col-xs-3 col-sm-3 col-md-3">
                                   <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Filtros humedos y secos</li>
                                        <ol>
                                            <li><input type="radio" value="1" name="filtros_hys"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="filtros_hys" /> No Cumple</li>
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
                                            <li><input type="radio" value="1"  name="conos_triangulos_tacos"  /> Cumple</li>
                                            <li><input type="radio" value="2" name="conos_triangulos_tacos" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="herramientas1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Herramientas</label></li>
                                        <ol>
                                            <li><input type="radio" value="1" name="herramientas"  /> Cumple</li>
                                            <li> <input type="radio" value="2"  name="herramientas" /> No Cumple</li>                                             
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Linterna_Gato" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Linterna, Gato</label></li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="linterna_gato"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="linterna_gato" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Cruceta_Llave_Pernos" class="col-xs-3 col-sm-3 col-md-3">
                                     <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Cruceta, Llave de Pernos</label></li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="cruceta_llave_pernos"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="cruceta_llave_pernos" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="extintor1" class="col-xs-3 col-sm-3 col-md-3">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Extintor 5 Libras</label></li>
                                        <ol>
                                            <li><input type="radio" value="1" name="extintor"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="extintor" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Salida_Emergencia" class="col-xs-3 col-sm-3 col-md-3">
                                     <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Salidas Emergencia</label></li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="salida_emergencia"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="salida_emergencia" /> No Cumple</li>
                                            
                                        </ol>
                                    </ul>
                                </div>

                                <div id="botiquin1" class="col-xs-3 col-sm-3 col-md-3">
                                     <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Botiqu&iacuten</label></li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="botiquin"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="botiquin" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                  
                                </div>
                                
                                <div id="cinturones1" class="col-xs-3 col-sm-3 col-md-3">
                                     <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Cinturones de Seguridad</label></li>
                                        <ol>
                                            <li><input type="radio" value="1" name="cinturones"  /> Cumple</li>
                                            <li><input type="radio" value="2" name="cinturones" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                   
                                </div>

                                <div id="velocimetro1" class="col-xs-4 col-sm-4 col-md-4">
                                     <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Dispositivo de Velocidad (solo colectivo)</label></li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="velocimetro"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="velocimetro" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                  
                                </div>
                            </div><br>


                            <div class="row col-xs-12 col-sm-12 col-md-12" style="border: solid;">

                                <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center; text-decoration: underline; ">
                                    <h3>Aseo y Presentación</h3><br>
                                </div>
                                
                                <div id="aseo_general1" class="col-xs-2 col-sm-2 col-md-2">
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Aseo General</label></li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="aseo_general"  /> Cumple</li>
                                            <li><input type="radio" value="2"  name="aseo_general" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Conductor_Uniformado" class="col-xs-3 col-sm-2 col-md-3">
                                    
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Conductor Uniformado</label></li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="conductor_uniformado"  /> Cumple</li>
                                            <li><input type="radio" value="2" name="conductor_uniformado" /> No Cumple</li>
                                        </ol>
                                    </ul>
                                </div>

                                <div id="Conductor_Carnet" class="col-xs-3 col-sm-3 col-md-3">
                                    
                                    <ul>
                                        <li><label for="" style="font-weight: bold;  font-style: italic; font-size: 18px; ">Conductor con Carnet</label></li>
                                        <ol>
                                            <li><input type="radio" value="1"  name="conductor_carnet" /> Cumple</li>
                                            <li><input type="radio" value="2" name="conductor_carnet" /> No Cumple</li>
                                           
                                        </ol>
                                    </ul><br><br>
                                   
                                </div>
                            </div><br><br>


                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="">Observaciones:</label>
                                    <input type="text" name="observaciones" class="form-control observaciones" placeholder="Este campo puede ir vacio">
                                </div>
                            </div>


                            <!-- conductor o usuario que esta logueado y creando la planilla -->
                            <div class="col-xs-12 col-sm-3 col-md-3" style="display: none;">
                                <div class="form-group">
                                    <label for="">Usuario Crea:</label>
                                    {!! Form::text('usr_crea', \Illuminate\Support\Facades\Auth::user()->name , array('class' => 'form-control')) !!}
                                </div>
                            </div> 

                          
                            <button type="submit" class="btn btn-primary">Guardar</button>
                       
                        {!! Form::close() !!}

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

       
        $('.form_planillas').submit(function(e){
                    
                    e.preventDefault();

                    var presion = $("input[type=radio][name = presion]:checked ").val();
                    if (presion) { } else { alert('no fue seleccionada la presion de las llantas'); return false; }

                    var labrado = $("input[type=radio][name = labrado]:checked ").val();
                    if (labrado) { } else { alert('no fue seleccionada el labrado de las llantas'); return false; }

                    var tuercas = $("input[type=radio][name = tuercas]:checked").val();
                    if (tuercas) { } else { alert('no fue seleccionada Tuercas Completas y Aseguradas'); return false; }
                    
                    var rines = $("input[type=radio][name = rines]:checked ").val();
                    if (rines) { } else { alert('no fue seleccionada Estado de los Rines'); return false; }
                    
                    var repuesto = $("input[type=radio][name = repuesto]:checked").val();
                    if (repuesto) { } else { alert('no fue seleccionada Estado Llanta de Repuesto  '); return false; }
                    
                    var freno_parqueo = $("input[type=radio][name = freno_parqueo]:checked").val();
                    if (freno_parqueo) { } else { alert('no fue seleccionada Funciona Freno de Parqueo'); return false; }
                    
                    var sistema_frenos = $("input[type=radio][name = sistema_frenos]:checked").val();
                    if (sistema_frenos) { } else { alert('no fue seleccionada Funciona el Sistema de Frenos  '); return false; }
                    
                    var liquido_frenos = $("input[type=radio][name = liquido_frenos]:checked").val();
                    if (liquido_frenos) { } else { alert('no fue seleccionada Liquido de Frenos dentro de los limites'); return false; }
                    
                    var luz_reversa = $("input[type=radio][name = luz_reversa]:checked").val();
                    if (luz_reversa) { } else { alert('no fue seleccionada Enciende Luz Reversa'); return false; }
                    
                    var luces_bajas = $("input[type=radio][name = luces_bajas]:checked").val();
                    if (luces_bajas) { } else { alert('no fue seleccionada Enciende Luces Bajas '); return false; }
                    
                    var luces_altas = $("input[type=radio][name = luces_altas]:checked").val();
                    if (luces_altas) { } else { alert('no fue seleccionada Enciende Luces Altas'); return false; }

                    var cucuyos = $("input[type=radio][name = cucuyos]:checked").val();
                    if (cucuyos) { } else { alert('no fue seleccionada Enciende Cocuyos'); return false; }

                    var luces_freno = $("input[type=radio][name = luces_freno]:checked").val();
                    if (luces_freno) { } else { alert('no fue seleccionada Enciende Luces Freno'); return false; }
                    
                    var direccionales = $("input[type=radio][name = direccionales]:checked").val();
                    if (direccionales) { } else { alert('no fue seleccionada Enciende Direccionales(adelante y atras)'); return false; }

                    var nivel_conbustible = $("input[type=radio][name = nivel_conbustible]:checked").val();
                    if (nivel_conbustible) { } else { alert('no fue seleccionada Nivel del Combustible '); return false; }

                    var presion_aceite = $("input[type=radio][name = presion_aceite]:checked").val();
                    if (presion_aceite) { } else { alert('no fue seleccionada Indicador Presion Aceite'); return false; }

                    var nivel_bateria = $("input[type=radio][name = nivel_bateria]:checked").val();
                    if (nivel_bateria) { } else { alert('no fue seleccionada Indicador Nivel Bateria'); return false; }

                    var nivel_temperatura = $("input[type=radio][name = nivel_temperatura]:checked").val();
                    if (nivel_temperatura) { } else { alert('no fue seleccionada Indicador de Temperatura '); return false; }

                    var retrovisores = $("input[type=radio][name = retrovisores]:checked").val();
                    if (retrovisores) { } else { alert('no fue seleccionada Espejos Retrovidores Funcionando'); return false; }

                    var puertas = $("input[type=radio][name = puertas]:checked").val();
                    if (puertas) { } else { alert('no fue seleccionada Todas la Puertas Cierran y Ajustan '); return false; }

                    var nivel_aceite = $("input[type=radio][name = nivel_aceite]:checked").val();
                    if (nivel_aceite) { } else { alert('no fue seleccionada Nivel Aceite Motor'); return false; }

                    var nivel_direccion = $("input[type=radio][name = nivel_direccion]:checked").val();
                    if (nivel_direccion) { } else { alert('no fue seleccionada Nivel Liquido Direccion'); return false; }

                    var nivel_refrigerante = $("input[type=radio][name = nivel_refrigerante]:checked").val();
                    if (nivel_refrigerante) { } else { alert('no fue seleccionada Nivel Liquido Refrigerante'); return false; }

                    var nivel_limpiabrisas = $("input[type=radio][name = nivel_limpiabrisas]:checked").val();
                    if (nivel_limpiabrisas) { } else { alert('no fue seleccionada Nivel Agua Limpiabrisas'); return false; }

                    var pito = $("input[type=radio][name = pito]:checked").val();
                    if (pito) { } else { alert('no fue seleccionada Pito Funcionando'); return false; }

                    var limpiabrisas = $("input[type=radio][name = limpiabrisas]:checked").val();
                    if (limpiabrisas) { } else { alert('no fue seleccionada Limpiabrisas Funcionando'); return false; }

                    var tapa_radiador = $("input[type=radio][name = tapa_radiador]:checked").val();
                    if (tapa_radiador) { } else { alert('no fue seleccionada Radiador con Tapa Ajustada'); return false; }

                    var correa_ventilador = $("input[type=radio][name = correa_ventilador]:checked").val();
                    if (correa_ventilador) { } else { alert('no fue seleccionada Correa Ventilador Tensionada'); return false; }

                    var bateria = $("input[type=radio][name = bateria]:checked").val();
                    if (bateria) { } else { alert('no fue seleccionada Bateria sin Residuos'); return false; }

                    var conos_triangulos_tacos = $("input[type=radio][name = conos_triangulos_tacos]:checked").val();
                    if (conos_triangulos_tacos) { } else { alert('no fue seleccionada Conos, Triangulos, Tacos'); return false; }

                    var herramientas = $("input[type=radio][name = herramientas]:checked").val();
                    if (herramientas) { } else { alert('no fue seleccionada Herramientas'); return false; }

                    var linterna_gato = $("input[type=radio][name = linterna_gato]:checked").val();
                    if (linterna_gato) { } else { alert('no fue seleccionada Linterna, Gato'); return false; }

                    var cruceta_llave_pernos = $("input[type=radio][name = cruceta_llave_pernos]:checked").val();
                    if (cruceta_llave_pernos) { } else { alert('no fue seleccionada Cruceta, Llave de Pernos'); return false; }

                    var extintor = $("input[type=radio][name = extintor]:checked").val();
                    if (extintor) { } else { alert('no fue seleccionada Extintor 5 Libras'); return false; }

                    var salida_emergencia = $("input[type=radio][name = salida_emergencia]:checked").val();
                    if (salida_emergencia) { } else { alert('no fue seleccionada Salidas de Emergencia'); return false; }

                    var botiquin = $("input[type=radio][name = botiquin]:checked").val();
                    if (botiquin) { } else { alert('no fue seleccionada Botiquin'); return false; }

                    var cinturones = $("input[type=radio][name = cinturones]:checked").val();
                    if (cinturones) { } else { alert('no fue seleccionada Cinturones de Seguridad'); return false; }

                    var velocimetro = $("input[type=radio][name = velocimetro]:checked").val();
                    if (velocimetro) { } else { alert('no fue seleccionada Dispositivo de Velocidad (solo colectivo)'); return false; }

                    var aseo_general = $("input[type=radio][name = aseo_general]:checked").val();
                    if (aseo_general) { } else { alert('no fue seleccionada Aseo General'); return false; }

                    var conductor_uniformado = $("input[type=radio][name = conductor_uniformado]:checked ").val();
                    if (conductor_uniformado) { } else { alert('no fue seleccionada Conductor Uniformado'); return false; }

                    var conductor_carnet = $("input[type=radio][name = conductor_carnet]:checked").val();
                    if (conductor_carnet) { } else { alert('no fue seleccionada Conductor con Carnet'); return false; }


                                        
                    Swal.fire({
                      title: 'Estas seguro(a) de guardar la planilla ?',
                      text: "No podrás revertir esto!",
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
