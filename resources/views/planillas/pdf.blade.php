@extends('layouts.app')
@section('title')
    Planillas
@endsection


<?php 
    setlocale(LC_ALL, 'es_ES');
    date_default_timezone_set('America/Bogota');
    $vehiculo = $planilla[0]['numero_interno'];
    $fecha = $planilla[0]['fecha'];
    $fecha_entero = strtotime($fecha);
    $monthNum = date("m", $fecha_entero);
    $anio = date("Y", $fecha_entero);
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
    $monthName = strftime('%B', $dateObj->getTimestamp());
    switch($monthName){   

        case "January":
        $monthName = "Enero";
        break;

        case "February":
        $monthName = "Febrero";
        break;

        case "March":
        $monthName = "Marzo";
        break;

        case "April":
        $monthName = "Abril";
        break;

        case "May":
        $monthName = "Mayo";
        break;

        case "June":
        $monthName = "Junio";
        break;

        case "July":
        $monthName = "Julio";
        break;

        case "August":
        $monthName = "Agosto";
        break;

        case "September":
        $monthName = "Septiembre";
        break;

        case "Octuber":
        $monthName = "Octubre";
        break;

        case "November":
        $monthName = "Noviembre";
        break;

        case "December":
        $monthName = "Diciembre";
        break;
        
    }


?>

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.css"/>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style type="text/css" media="screen">
        .verde{
            color: green;
        }
        .rojo{
            color: red;
        }
    </style>

@endsection


@section('content')

    <section class="section">

        <div class="section-header">
            
            <div class="row w-100 align-items-center">
                <div class="col text-center">
                    <h3 class="page__heading">Planilla de alistamiento veh&iacuteculo {{$vehiculo}}</h3>
                     <button type="button" onclick="exportPdf()" class="btn btn-primary">Generar PDF &nbsp;<i class="btn btn-success fas fa-file-pdf"></i></button>
                </div>  
            </div>
           
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('planillas.headerpdf')
                            

                            <label class="col-sm-2">Tabla registros diarios :</label>
                            <button id="mostrarTBldatos" title="Mostrar" style="background: #F39200;"><i class="fas fa-angle-double-down"></i></button>
                            <button id="ocultarTBldatos" title="Ocultar" style="background: #E30613;"><i class="fas fa-angle-double-up"></i></button><br>
                            
                            <div id="div_tblRegistros">
                                <table  id='table' class="table table-striped table-bordered table-sm " style="width:100%;" > 

                                <thead>
                                    <th class="centrar">Indicador</th>
                                    <th class="centrar">Items</th>
                                    <th colspan="31" style="text-align: center;">Dia del mes</th>
                                </thead>
                                
                                <tbody>
                                    
                                    <tr>
                                        <td class="centrar"></td>
                                        <td style="text-align: center;"><b>MES: {{$monthName}} &nbsp;&nbsp;&nbsp; Año: {{$anio}} </b></td>
                                        <td id="dia1">1</td><td id="dia2">2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                        <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                        <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="5" class="centrar">Llantas</td>
                                        <td >Presión</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td id='p".$i."'></td>";
                                            }
                                        ?>
                                    </tr>
                                    
                                    <tr>
                                        <td >Labrado</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>
                                    
                                    <tr>
                                        <td>Tuercas completas y aseguradas</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>  
                                    </tr>

                                    <tr>
                                        <td>Estado Rines</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Estado llanta repuesto</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>


                                    <tr>
                                        <td rowspan="3" class="centrar">Frenos</td>
                                        <td >Funciona el freno de parqueo</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>
                                    
                                    <tr>
                                        <td>Funciona el sistema de frenos</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Liquido de frenos dentro de los límites</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>
                                    
                                    <tr>
                                        <td rowspan="6" class="centrar">Luces</td>
                                        <td >Enciende luz de reversa</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>
                                    
                                    <tr>
                                        <td>Encienden luces bajas</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Encienden luces altas</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Encienden cucuyos</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Encienden luces de freno</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>

                                    <tr>
                                        <td>Enciende direccionales(adelante y atrás)</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td rowspan="4" class="centrar">Indicadores del tablero</td>
                                        <td >Nivel de temperatura</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>
                                    
                                    <tr>
                                        <td>Nivel de combustible</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>Indicador de presión de aceite</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Indicador nivel de batería</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td rowspan="15" class="centrar">Condiciones de funcionamiento</td>
                                        <td >Espejos retrovisores funcionando</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>
                                    
                                    <tr>
                                        <td>Todas las puertas cierran y ajustan</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Nivel de aceite del motor</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Fugas motor</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Nivel de liquido de la dirección</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Nivel de liquido refrijerante</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Nivel del agua del limpiabrizas</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Pito funcionando</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>
                                    

                                    <tr>
                                        <td>limpiabrisas funcionando</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>
                                    

                                    <tr>
                                        <td>Radiador con tapa ajustada</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>
                                    
                                    <tr>
                                        <td>Correa del ventilador tensionada</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>
                                    

                                    <tr>
                                        <td>Betería sin residuos</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Ajuste de Bornes</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Transmision</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Filtros HyS</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>
                                    


                                    <tr>
                                        <td rowspan="9" class="centrar">Equipo de carretera y seguridad</td>
                                        <td >Conos, tríangulos, tacos</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>
                                    
                                    <tr>
                                        <td>Herramientas</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Linterna, gato</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Cruceta-llave de pernos</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Extintor 5 libras</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Salidas de emergencia</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Botiquín</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Cinturones de seguridad</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Dispositivo de velocidad (solo colectivo)</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td rowspan="3" class="centrar">Aseo y presentacion</td>
                                        <td >Aseo general del vehículo</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>
                                    
                                    <tr>
                                        <td>Conductor uniformado (solo colectivo)</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td>Conductor con carnet</td>
                                        <?php 
                                            for ($i=0; $i <=30 ; $i++) { 
                                            echo "<td></td>";
                                            }
                                        ?>
                                    </tr>

                                </tbody>
                                </table>
                            </div>

                            <label class="col-sm-2">Tabla Vencimientos :</label>
                            <button id="mostrarVencimientos" title="Mostrar" style="background: #F39200;" ><i class="fas fa-angle-double-down"></i></button>
                            <button id="ocultarVencimientos" title="Ocultar" style="background: #E30613;"><i class="fas fa-angle-double-up"></i></button><br>

                            <div id="div_tblVencimientos">
                                <table  id="vencimientos" class="table table-striped table-bordered table-sm " style="width:100%;" >
                                <tbody>
                                    <thead>
                                        <th colspan="1">VENCIMIENTOS</th>
                                        <th></th>
                                    </thead>
                                    <tr>
                                        <td>Licencia de Conducción:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>SOAT:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>RTM:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tarjeta de Operacioón:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Mantenimiento Precentivo:</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>

                           
                            <label class="col-sm-2">Tabla Responsable/Despachador :</label>
                            <button id="mostrarResponsables" title="Mostrar" style="background: #F39200;"><i class="fas fa-angle-double-down"></i></button>
                            <button id="ocultarResponsables" title="Ocultar" style="background: #E30613;"><i class="fas fa-angle-double-up"></i></button>

                            <div id="div_tblResponsables">
                                <table id='tbldatosresponsables' class="table table-striped table-bordered table-sm " style="width:100%;" >
                                <thead>
                                    <tr class="centrar">
                                        <th style="width:3%; height:2%; ">DIA</th>
                                        <th style="width:20%">CONDUCTOR</th>
                                        <th style="width:20%">DESPACHADOR</th>
                                        <th style="width:57%">OBSERVACIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php 
                                        for ($i=0; $i <= 30 ; $i++) { 
                                            $J=$i+1;
                                            echo "
                                                <tr class='centrar'>
                                                    <td style='width:3%;  height:2.4%; '>$J</td>
                                                    <td style='width:20%; height:2.4%; '></td>
                                                    <td style='width:20%; height:2.4%; '></td>
                                                    <td style='width:20%; height:2.4%; '></td>
                                                </tr>
                                            ";
                                        }


                                    ?>
                                        
                                                
                                    
                                </tbody>
                                </table>
                            </div>

                            @include('planillas.footerpdf')
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- 
        <div class="row w-100 align-items-center">
            <div class="col text-center">
                <button type="button" onclick="exportPdf()" class="btn btn-primary">Generar PDF</button>
            </div>  
        </div> -->
       
    </section>
@endsection

@section('scripts')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" type="text/javascript"></script>

    <script>
        $(document).ready(function(){

            $('#div_tblRegistros').hide();
            $('#div_tblVencimientos').hide();
            $('#div_tblResponsables').hide();

            $("#mostrarTBldatos").click(function(){
                $('#div_tblRegistros').show(1000);
            });
            $("#ocultarTBldatos").click(function(){
                $('#div_tblRegistros').hide(1000);
            });

             $("#mostrarVencimientos").click(function(){
                $('#div_tblVencimientos').show(1000);
            });
            $("#ocultarVencimientos").click(function(){
                $('#div_tblVencimientos').hide(1000);
            });

            $("#mostrarResponsables").click(function(){
                $('#div_tblResponsables').show(1000);
            });
            $("#ocultarResponsables").click(function(){
                $('#div_tblResponsables').hide(1000);
            });
        });
        var planillas = '<?php echo $planilla; ?>';
        var datos = JSON.parse(planillas);

        var ok = '<?php echo $imagenes[2]; ?>';
        var x = '<?php echo $imagenes[3]; ?>';


        //para imprimir el numero interno del vehiculo
        var tabla_vehiculo = document.getElementById('table');
        var numero_interno = datos[0]['numero_interno'];
        tabla_vehiculo.rows[1].cells[0].innerHTML   = 'Vehiculo: '+numero_interno;

       

        var tabla = document.getElementById('table');


        for (var i = 0; i < datos.length; i++) {

                let dia_mes = new Date(datos[i]['fecha']);
                let dia_planilla = dia_mes.getDate();

                let presion                = datos[i]['presion'];
                if(presion){
                    if(presion == '1'){
                        presion = 'C';
                        tabla.rows[2].cells[dia_planilla+1].innerHTML = presion; 
                        tabla.rows[2].cells[dia_planilla+1].style.color = "#39ff14";   
                    }else if(presion == '2'){
                        presion = 'N';
                        tabla.rows[2].cells[dia_planilla+1].innerHTML = presion; 
                        tabla.rows[2].cells[dia_planilla+1].style.color = "#ff0000";
                    }
                }else{presion = '';
            }
                

                let labrado = datos[i]['labrado'];
                if(labrado){
                    if(labrado == '1'){
                        labrado = 'C';
                        tabla.rows[3].cells[dia_planilla].innerHTML = labrado;
                        tabla.rows[3].cells[dia_planilla].style.color = "#39ff14";
                    }else if(labrado == '2'){
                        labrado = 'N';
                        tabla.rows[3].cells[dia_planilla].innerHTML = labrado;
                        tabla.rows[3].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    labrado = '';
                }

                let tuercas = datos[i]['tuercas'];
                if(tuercas){
                    if(tuercas == '1'){
                        tuercas = 'C';
                        tabla.rows[4].cells[dia_planilla].innerHTML = tuercas;
                        tabla.rows[4].cells[dia_planilla].style.color = "#39ff14";
                    }else if(tuercas == '2'){
                        tuercas = 'N';
                        tabla.rows[4].cells[dia_planilla].innerHTML = tuercas;
                        tabla.rows[4].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    tuercas = '';
                }

                let rines = datos[i]['rines'];
                if(rines){
                    if(rines == '1'){
                        rines = 'C';
                        tabla.rows[5].cells[dia_planilla].innerHTML = rines;
                        tabla.rows[5].cells[dia_planilla].style.color = "#39ff14";
                    }else if(rines == '2'){
                        rines = 'N';
                        tabla.rows[5].cells[dia_planilla].innerHTML = rines;
                        tabla.rows[5].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    rines = '';
                }

                let repuesto               = datos[i]['repuesto'];
                if(repuesto){
                    if(repuesto == '1'){
                        repuesto = 'C';
                        tabla.rows[6].cells[dia_planilla].innerHTML = repuesto;
                        tabla.rows[6].cells[dia_planilla].style.color = "#39ff14"; 
                    }else if(repuesto == '2'){
                        repuesto = 'N';
                        tabla.rows[6].cells[dia_planilla].innerHTML = repuesto;
                        tabla.rows[6].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    repuesto = '';
                }
                
                let freno_parqueo          = datos[i]['freno_parqueo'];
                if(freno_parqueo){
                    if(freno_parqueo == '1'){
                        freno_parqueo = 'C';
                        tabla.rows[7].cells[dia_planilla+1].innerHTML   = freno_parqueo;
                        tabla.rows[7].cells[dia_planilla+1].style.color =  "#39ff14"; 
                    }else if(freno_parqueo == '2'){
                        freno_parqueo = 'N';
                        tabla.rows[7].cells[dia_planilla+1].innerHTML   = freno_parqueo;
                        tabla.rows[7].cells[dia_planilla+1].style.color = "#ff0000";
                    }
                }else{
                        freno_parqueo = '';
                }

                
                let sistema_frenos         = datos[i]['sistema_frenos'];
                if(sistema_frenos){
                    if(sistema_frenos == '1'){
                        sistema_frenos = 'C';
                        tabla.rows[8].cells[dia_planilla].innerHTML   = sistema_frenos;
                        tabla.rows[8].cells[dia_planilla].style.color = "#39ff14";
                    }else if(sistema_frenos == '2'){
                        sistema_frenos = 'N';
                        tabla.rows[8].cells[dia_planilla].innerHTML   = sistema_frenos;
                        tabla.rows[8].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    sistema_frenos = '';
                }

                
                let liquido_frenos         = datos[i]['liquido_frenos'];
                if(liquido_frenos){
                    if(liquido_frenos == '1'){
                        liquido_frenos = 'C';
                        tabla.rows[9].cells[dia_planilla].innerHTML = liquido_frenos;
                        tabla.rows[9].cells[dia_planilla].style.color = "#39ff14";
                    }else if(liquido_frenos == '2'){
                        liquido_frenos = 'N';
                        tabla.rows[9].cells[dia_planilla].innerHTML = liquido_frenos;
                        tabla.rows[9].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    liquido_frenos = '';
                }
           


                let luz_reversa            = datos[i]['luz_reversa'];
                if(luz_reversa){
                    if(luz_reversa == '1'){
                        luz_reversa = 'C';
                        tabla.rows[10].cells[dia_planilla+1].innerHTML  = luz_reversa;
                        tabla.rows[10].cells[dia_planilla+1].style.color ="#39ff14";
                    }else if(luz_reversa == '2'){
                        luz_reversa = 'N';
                        tabla.rows[10].cells[dia_planilla+1].innerHTML  = luz_reversa;
                        tabla.rows[10].cells[dia_planilla+1].style.color = "#ff0000";
                    }
                }else{
                    luz_reversa = '';
                }



                
                let luces_bajas            = datos[i]['luces_bajas'];
                if(luces_bajas){
                    if(luces_bajas == '1'){
                        luces_bajas = 'C';
                        tabla.rows[11].cells[dia_planilla].innerHTML    = luces_bajas;
                        tabla.rows[11].cells[dia_planilla].style.color ="#39ff14";
                    }else if(luces_bajas == '2'){
                        luces_bajas = 'N';
                        tabla.rows[11].cells[dia_planilla].innerHTML    = luces_bajas;
                        tabla.rows[11].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    luces_bajas = '';
                }
                


                let luces_altas            = datos[i]['luces_altas'];
                if(luces_altas){
                    if(luces_altas == '1'){
                        luces_altas = 'C';
                        tabla.rows[12].cells[dia_planilla].innerHTML    = luces_altas;
                        tabla.rows[12].cells[dia_planilla].style.color ="#39ff14";
                    }else if(luces_altas == '2'){
                        luces_altas = 'N';
                        tabla.rows[12].cells[dia_planilla].innerHTML    = luces_altas;
                        tabla.rows[12].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    luces_altas = '';
                }
                


                let cucuyos                = datos[i]['cucuyos'];
                if(cucuyos){
                    if(cucuyos == '1'){
                        cucuyos = 'C';
                        tabla.rows[13].cells[dia_planilla].innerHTML    = cucuyos;
                        tabla.rows[13].cells[dia_planilla].style.color ="#39ff14";
                    }else if(cucuyos == '2'){
                        cucuyos = 'N';
                        tabla.rows[13].cells[dia_planilla].innerHTML    = cucuyos;
                        tabla.rows[13].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    cucuyos = '';
                }


                
                let luces_freno            = datos[i]['luces_freno'];
                if(luces_freno){
                    if(luces_freno == '1'){
                        luces_freno = 'C';
                         tabla.rows[14].cells[dia_planilla].innerHTML    = luces_freno;
                         tabla.rows[14].cells[dia_planilla].style.color ="#39ff14";
                    }else if(luces_freno == '2'){
                        luces_freno = 'N';
                         tabla.rows[14].cells[dia_planilla].innerHTML    = luces_freno;
                         tabla.rows[14].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    luces_freno = '';
                }
                



                let direccionales          = datos[i]['direccionales'];
                if(direccionales){
                    if(direccionales == '1'){
                        direccionales = 'C';
                        tabla.rows[15].cells[dia_planilla].innerHTML    = direccionales;
                        tabla.rows[15].cells[dia_planilla].style.color ="#39ff14";
                    }else if(direccionales == '2'){
                        direccionales = 'N';
                        tabla.rows[15].cells[dia_planilla].innerHTML    = direccionales;
                        tabla.rows[15].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    direccionales = '';
                }


                
                let nivel_temperatura      = datos[i]['nivel_temperatura'];
                if(nivel_temperatura){
                    if(nivel_temperatura == '1'){
                        nivel_temperatura = 'C';
                        tabla.rows[16].cells[dia_planilla+1].innerHTML  = nivel_temperatura;
                        tabla.rows[16].cells[dia_planilla+1].style.color ="#39ff14";
                    }else if(nivel_temperatura == '2'){
                        nivel_temperatura = 'N';
                        tabla.rows[16].cells[dia_planilla+1].innerHTML  = nivel_temperatura;
                        tabla.rows[16].cells[dia_planilla+1].style.color = "#ff0000";
                    }
                }else{
                    nivel_temperatura = '';
                }
                


                let nivel_conbustible      = datos[i]['nivel_conbustible'];
                if(nivel_conbustible){
                    if(nivel_conbustible == '1'){
                        nivel_conbustible = 'C';
                        tabla.rows[17].cells[dia_planilla].innerHTML    = nivel_conbustible;
                        tabla.rows[17].cells[dia_planilla].style.color ="#39ff14";
                    }else if(nivel_conbustible == '2'){
                        nivel_conbustible = 'N';
                        tabla.rows[17].cells[dia_planilla].innerHTML    = nivel_conbustible;
                        tabla.rows[17].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    nivel_conbustible = '';
                }
                

                let presion_aceite         = datos[i]['presion_aceite'];
                if(presion_aceite){
                    if(presion_aceite == '1'){
                        presion_aceite = 'C';
                        tabla.rows[18].cells[dia_planilla].innerHTML    = presion_aceite;
                        tabla.rows[18].cells[dia_planilla].style.color ="#39ff14";
                    }else if(presion_aceite == '2'){
                        presion_aceite = 'N';
                        tabla.rows[18].cells[dia_planilla].innerHTML    = presion_aceite;
                        tabla.rows[18].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    presion_aceite = '';
                }
                
                let nivel_bateria          = datos[i]['nivel_bateria'];
                if(nivel_bateria){
                    if(nivel_bateria == '1'){
                        nivel_bateria = 'C';
                        tabla.rows[19].cells[dia_planilla].innerHTML    = nivel_bateria;
                        tabla.rows[19].cells[dia_planilla].style.color ="#39ff14";
                    }else if(nivel_bateria == '2'){
                        nivel_bateria = 'N';
                        tabla.rows[19].cells[dia_planilla].innerHTML    = nivel_bateria;
                        tabla.rows[19].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    nivel_bateria = '';
                }
                
                let retrovisores           = datos[i]['retrovisores'];
                if(retrovisores){
                    if(retrovisores == '1'){
                        retrovisores = 'C';
                        tabla.rows[20].cells[dia_planilla+1].innerHTML  = retrovisores;
                        tabla.rows[20].cells[dia_planilla+1].style.color ="#39ff14";
                    }else if(retrovisores == '2'){
                        retrovisores = 'N';
                        tabla.rows[20].cells[dia_planilla+1].innerHTML  = retrovisores;
                        tabla.rows[20].cells[dia_planilla+1].style.color = "#ff0000";
                    }
                }else{
                    retrovisores = '';
                }
                
                let puertas                = datos[i]['puertas'];
                if(puertas){
                    if(puertas == '1'){
                        puertas = 'C';
                        tabla.rows[21].cells[dia_planilla].innerHTML    = puertas;
                        tabla.rows[21].cells[dia_planilla].style.color ="#39ff14";
                    }else if(puertas == '2'){
                        puertas = 'N';
                        tabla.rows[21].cells[dia_planilla].innerHTML    = puertas;
                        tabla.rows[21].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    puertas = '';
                }
                
                let nivel_aceite           = datos[i]['nivel_aceite'];
                if(nivel_aceite){
                    if(nivel_aceite == '1'){
                        nivel_aceite = 'C';
                        tabla.rows[22].cells[dia_planilla].innerHTML    = nivel_aceite;
                        tabla.rows[22].cells[dia_planilla].style.color ="#39ff14";
                    }else if(nivel_aceite == '2'){
                        nivel_aceite = 'N';
                        tabla.rows[22].cells[dia_planilla].innerHTML    = nivel_aceite;
                        tabla.rows[22].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    nivel_aceite = '';
                }
                
                let fugas_motor            = datos[i]['fugas_motor'];
                if(fugas_motor){
                    if(fugas_motor == '1'){
                        fugas_motor = 'C';
                        tabla.rows[23].cells[dia_planilla].innerHTML    = fugas_motor;
                        tabla.rows[23].cells[dia_planilla].style.color ="#39ff14";
                    }else if(fugas_motor == '2'){
                        fugas_motor = 'N';
                        tabla.rows[23].cells[dia_planilla].innerHTML    = fugas_motor;
                        tabla.rows[23].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    fugas_motor = '';
                }
                
                let nivel_direccion        = datos[i]['nivel_direccion'];
                if(nivel_direccion){
                    if(nivel_direccion == '1'){
                        nivel_direccion = 'C';
                        tabla.rows[24].cells[dia_planilla].innerHTML    = nivel_direccion;
                        tabla.rows[24].cells[dia_planilla].style.color ="#39ff14";
                    }else if(nivel_direccion == '2'){
                        nivel_direccion = 'N';
                        tabla.rows[24].cells[dia_planilla].innerHTML    = nivel_direccion;
                        tabla.rows[24].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    nivel_direccion = '';
                }

                let nivel_refrigerante     = datos[i]['nivel_refrigerante'];
                if(nivel_refrigerante){
                    if(nivel_refrigerante == '1'){
                        nivel_refrigerante = 'C';
                        tabla.rows[25].cells[dia_planilla].innerHTML    = nivel_refrigerante;
                        tabla.rows[25].cells[dia_planilla].style.color ="#39ff14";
                    }else if(nivel_refrigerante == '2'){
                        nivel_refrigerante = 'N';
                        tabla.rows[25].cells[dia_planilla].innerHTML    = nivel_refrigerante;
                        tabla.rows[25].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    nivel_refrigerante = '';
                }

                let nivel_limpiabrisas     = datos[i]['nivel_limpiabrisas'];
                if(nivel_limpiabrisas){
                    if(nivel_limpiabrisas == '1'){
                        nivel_limpiabrisas = 'C';
                        tabla.rows[26].cells[dia_planilla].innerHTML    = nivel_limpiabrisas;
                        tabla.rows[26].cells[dia_planilla].style.color ="#39ff14";
                    }else if(nivel_limpiabrisas == '2'){
                        nivel_limpiabrisas = 'N';
                        tabla.rows[26].cells[dia_planilla].innerHTML    = nivel_limpiabrisas;
                        tabla.rows[26].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    nivel_limpiabrisas = '';
                }

                let pito                   = datos[i]['pito'];
                if(pito){
                    if(pito == '1'){
                        pito = 'C';
                        tabla.rows[27].cells[dia_planilla].innerHTML    = pito;
                        tabla.rows[27].cells[dia_planilla].style.color ="#39ff14";
                    }else if(pito == '2'){
                        pito = 'N';
                        tabla.rows[27].cells[dia_planilla].innerHTML    = pito;
                        tabla.rows[27].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    pito = '';
                }
                
                let limpiabrisas           = datos[i]['limpiabrisas'];
                if(limpiabrisas){
                    if(limpiabrisas == '1'){
                        limpiabrisas = 'C';
                        tabla.rows[28].cells[dia_planilla].innerHTML    = limpiabrisas;
                        tabla.rows[28].cells[dia_planilla].style.color ="#39ff14";
                    }else if(limpiabrisas == '2'){
                        limpiabrisas = 'N';
                        tabla.rows[28].cells[dia_planilla].innerHTML    = limpiabrisas;
                        tabla.rows[28].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    limpiabrisas = '';
                }

                let tapa_radiador          = datos[i]['tapa_radiador'];
                if(tapa_radiador){
                    if(tapa_radiador == '1'){
                        tapa_radiador = 'C';
                        tabla.rows[29].cells[dia_planilla].innerHTML    = tapa_radiador;
                        tabla.rows[29].cells[dia_planilla].style.color ="#39ff14";
                    }else if(tapa_radiador == '2'){
                        tapa_radiador = 'N';
                        tabla.rows[29].cells[dia_planilla].innerHTML    = tapa_radiador;
                        tabla.rows[29].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    tapa_radiador = '';
                }
                
                let correa_ventilador      = datos[i]['correa_ventilador'];
                if(correa_ventilador){
                    if(correa_ventilador == '1'){
                        correa_ventilador = 'C';
                        tabla.rows[30].cells[dia_planilla].innerHTML    = correa_ventilador;
                        tabla.rows[30].cells[dia_planilla].style.color ="#39ff14";
                    }else if(correa_ventilador == '2'){
                        correa_ventilador = 'N';
                        tabla.rows[30].cells[dia_planilla].innerHTML    = correa_ventilador;
                        tabla.rows[30].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    correa_ventilador = '';
                }

                let bateria                = datos[i]['bateria'];
                if(bateria){
                    if(bateria == '1'){
                        bateria = 'C';
                        tabla.rows[31].cells[dia_planilla].innerHTML    = bateria;
                        tabla.rows[31].cells[dia_planilla].style.color ="#39ff14";
                    }else if(bateria == '2'){
                        bateria = 'N';
                        tabla.rows[31].cells[dia_planilla].innerHTML    = bateria;
                        tabla.rows[31].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    bateria = '';
                }
                
                let ajuste_bornes          = datos[i]['ajuste_bornes'];
                if(ajuste_bornes){
                    if(ajuste_bornes == '1'){
                        ajuste_bornes = 'C';
                        tabla.rows[32].cells[dia_planilla].innerHTML    = ajuste_bornes;
                        tabla.rows[32].cells[dia_planilla].style.color ="#39ff14";
                    }else if(ajuste_bornes == '2'){
                        ajuste_bornes = 'N';
                        tabla.rows[32].cells[dia_planilla].innerHTML    = ajuste_bornes;
                        tabla.rows[32].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    ajuste_bornes = '';
                }

                let transmision            = datos[i]['transmision'];
                if(transmision){
                    if(transmision == '1'){
                        transmision = 'C';
                        tabla.rows[33].cells[dia_planilla].innerHTML    = transmision;
                         tabla.rows[33].cells[dia_planilla].style.color ="#39ff14";
                    }else if(transmision == '2'){
                        transmision = 'N';
                        tabla.rows[33].cells[dia_planilla].innerHTML    = transmision;
                         tabla.rows[33].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    transmision = '';
                }
                
                let filtros_hys            = datos[i]['filtros_hys'];
                if(filtros_hys){
                    if(filtros_hys == '1'){
                        filtros_hys = 'C';
                        tabla.rows[34].cells[dia_planilla].innerHTML    = filtros_hys;
                        tabla.rows[34].cells[dia_planilla].style.color ="#39ff14";
                    }else if(filtros_hys == '2'){
                        filtros_hys = 'N';
                        tabla.rows[34].cells[dia_planilla].innerHTML    = filtros_hys;
                        tabla.rows[34].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    filtros_hys = '';
                }

                let conos_triangulos_tacos = datos[i]['conos_triangulos_tacos'];
                if(conos_triangulos_tacos){
                    if(conos_triangulos_tacos == '1'){
                        conos_triangulos_tacos = 'C';
                        tabla.rows[35].cells[dia_planilla+1].innerHTML  = conos_triangulos_tacos;
                        tabla.rows[35].cells[dia_planilla+1].style.color ="#39ff14";
                    }else if(conos_triangulos_tacos == '2'){
                        conos_triangulos_tacos = 'N';
                        tabla.rows[35].cells[dia_planilla+1].innerHTML  = conos_triangulos_tacos;
                        tabla.rows[35].cells[dia_planilla+1].style.color = "#ff0000";
                    }
                }else{
                    conos_triangulos_tacos = '';
                }

                let herramientas           = datos[i]['herramientas'];
                if(herramientas){
                    if(herramientas == '1'){
                        herramientas = 'C';
                        tabla.rows[36].cells[dia_planilla].innerHTML    = herramientas;
                        tabla.rows[36].cells[dia_planilla].style.color ="#39ff14";
                    }else if(herramientas == '2'){
                        herramientas = 'N';
                        tabla.rows[36].cells[dia_planilla].innerHTML    = herramientas;
                        tabla.rows[36].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    herramientas = '';
                }

                let linterna_gato          = datos[i]['linterna_gato'];
                if(linterna_gato){
                    if(linterna_gato == '1'){
                        linterna_gato = 'C';
                        tabla.rows[37].cells[dia_planilla].innerHTML    = linterna_gato;
                        tabla.rows[37].cells[dia_planilla].style.color ="#39ff14";
                    }else if(linterna_gato == '2'){
                        linterna_gato = 'N';
                        tabla.rows[37].cells[dia_planilla].innerHTML    = linterna_gato;
                        tabla.rows[37].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    linterna_gato = '';
                }

                let cruceta_llave_pernos   = datos[i]['cruceta_llave_pernos'];
                if(cruceta_llave_pernos){
                    if(cruceta_llave_pernos == '1'){
                        cruceta_llave_pernos = 'C';
                        tabla.rows[38].cells[dia_planilla].innerHTML    = cruceta_llave_pernos;
                        tabla.rows[38].cells[dia_planilla].style.color ="#39ff14";
                    }else if(cruceta_llave_pernos == '2'){
                        cruceta_llave_pernos = 'N';
                        tabla.rows[38].cells[dia_planilla].innerHTML    = cruceta_llave_pernos;
                        tabla.rows[38].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    cruceta_llave_pernos = '';
                }
                
                let extintor               = datos[i]['extintor'];
                if(extintor){
                    if(extintor == '1'){
                        extintor = 'C';
                        tabla.rows[39].cells[dia_planilla].innerHTML    = extintor;
                        tabla.rows[39].cells[dia_planilla].style.color ="#39ff14";
                    }else if(extintor == '2'){
                        extintor = 'N';
                        tabla.rows[39].cells[dia_planilla].innerHTML    = extintor;
                        tabla.rows[39].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    extintor = '';
                }

                let salida_emergencia      = datos[i]['salida_emergencia'];
                if(salida_emergencia){
                    if(salida_emergencia == '1'){
                        salida_emergencia = 'C';
                        tabla.rows[40].cells[dia_planilla].innerHTML    = salida_emergencia;
                        tabla.rows[40].cells[dia_planilla].style.color ="#39ff14";
                    }else if(salida_emergencia == '2'){
                        salida_emergencia = 'N';
                        tabla.rows[40].cells[dia_planilla].innerHTML    = salida_emergencia;
                        tabla.rows[40].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    salida_emergencia = '';
                }
                
                let botiquin               = datos[i]['botiquin'];
                if(botiquin){
                    if(botiquin == '1'){
                        botiquin = 'C';
                        tabla.rows[41].cells[dia_planilla].innerHTML    = botiquin;
                        tabla.rows[41].cells[dia_planilla].style.color ="#39ff14";
                    }else if(botiquin == '2'){
                        botiquin = 'N';
                        tabla.rows[41].cells[dia_planilla].innerHTML    = botiquin;
                        tabla.rows[41].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    botiquin = '';
                }
                
                let cinturones             = datos[i]['cinturones'];
                if(cinturones){
                    if(cinturones == '1'){
                        cinturones = 'C';
                        tabla.rows[42].cells[dia_planilla].innerHTML    = cinturones;
                        tabla.rows[42].cells[dia_planilla].style.color ="#39ff14";
                    }else if(cinturones == '2'){
                        cinturones = 'N';
                        tabla.rows[42].cells[dia_planilla].innerHTML    = cinturones;
                        tabla.rows[42].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    cinturones = '';
                }
                
                let velocimetro            = datos[i]['velocimetro'];
                if(velocimetro){
                    if(velocimetro == '1'){
                        velocimetro = 'C';
                        tabla.rows[43].cells[dia_planilla].innerHTML    = velocimetro;
                        tabla.rows[43].cells[dia_planilla].style.color ="#39ff14";
                    }else if(velocimetro == '2'){
                        velocimetro = 'N';
                        tabla.rows[43].cells[dia_planilla].innerHTML    = velocimetro;
                        tabla.rows[43].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    velocimetro = '';
                }
                
                let aseo_general           = datos[i]['aseo_general'];
                if(aseo_general){
                    if(aseo_general == '1'){
                        aseo_general = 'C';
                        tabla.rows[44].cells[dia_planilla+1].innerHTML  = aseo_general;
                        tabla.rows[44].cells[dia_planilla+1].style.color ="#39ff14";
                    }else if(aseo_general == '2'){
                        aseo_general = 'N';
                        tabla.rows[44].cells[dia_planilla+1].innerHTML  = aseo_general;
                        tabla.rows[44].cells[dia_planilla+1].style.color = "#ff0000";
                    }
                }else{
                    aseo_general = '';
                }
                
                let conductor_uniformado   = datos[i]['conductor_uniformado'];
                if(conductor_uniformado){
                    if(conductor_uniformado == '1'){
                        conductor_uniformado = 'C';
                        tabla.rows[45].cells[dia_planilla].innerHTML    = conductor_uniformado;
                        tabla.rows[45].cells[dia_planilla].style.color ="#39ff14";
                    }else if(conductor_uniformado == '2'){
                        conductor_uniformado = 'N';
                        tabla.rows[45].cells[dia_planilla].innerHTML    = conductor_uniformado;
                        tabla.rows[45].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    conductor_uniformado = '';
                }
                
                let conductor_carnet       = datos[i]['conductor_carnet'];
                if(conductor_carnet){
                    if(conductor_carnet == '1'){
                        conductor_carnet = 'C';
                        tabla.rows[46].cells[dia_planilla].innerHTML    = conductor_carnet;
                        tabla.rows[46].cells[dia_planilla].style.color ="#39ff14";
                    }else if(conductor_carnet == '2'){
                        conductor_carnet = 'N';
                        tabla.rows[46].cells[dia_planilla].innerHTML    = conductor_carnet;
                        tabla.rows[46].cells[dia_planilla].style.color = "#ff0000";
                    }
                }else{
                    conductor_carnet = '';
                }
                
            }


        for (var i = 0; i < datos.length; i++) {
                
                let observaciones = '';
                let conductor = datos[i]['conductor'];
                let supervisor = datos[i]['usr_supervisa'];
                
                let obs_supervisor = datos[i]['obs_supervisor'];
                let obs_conductor = datos[i]['observaciones'];

                if (obs_conductor && obs_supervisor){
                    obs_conductor = ' C: '+obs_conductor+'</br>';
                    observaciones += obs_conductor;
                }else if(obs_conductor){
                    obs_conductor = ' C: '+obs_conductor;
                    observaciones += obs_conductor;
                }

                if (obs_supervisor){
                    obs_supervisor = 'D: '+obs_supervisor;
                    observaciones += obs_supervisor;
                }

                let dia_mes = new Date(datos[i]['fecha']);
                let dia_planilla = dia_mes.getDate();

                var tablaresponsables = document.getElementById('tbldatosresponsables');
              
                tablaresponsables.rows[dia_planilla].cells[1].innerHTML   = conductor;
                tablaresponsables.rows[dia_planilla].cells[2].innerHTML   = supervisor;
                tablaresponsables.rows[dia_planilla].cells[3].innerHTML   = observaciones;
              
        }

        //daata´pra pintar los vencimientos
        var fec_venc_licencia = '<?php echo($vencimientos['fec_venc_licencia']) ?>';
        var fec_venc_SOAT     = '<?php echo($vencimientos['fec_venc_SOAT']) ?>';
        var fec_venc_RTM      = '<?php echo($vencimientos['fec_venc_RTM']) ?>';
        var fec_venc_TOP      = '<?php echo($vencimientos['fec_venc_TOP']) ?>';
        var fec_venc_mto      = '<?php echo($vencimientos['fec_venc_mto']) ?>';

        var tabla_vencimientos = document.getElementById('vencimientos');
        
        tabla_vencimientos.rows[1].cells[1].innerHTML = fec_venc_licencia;
        tabla_vencimientos.rows[2].cells[1].innerHTML = fec_venc_SOAT;
        tabla_vencimientos.rows[3].cells[1].innerHTML = fec_venc_RTM;
        tabla_vencimientos.rows[4].cells[1].innerHTML = fec_venc_TOP;
        tabla_vencimientos.rows[5].cells[1].innerHTML = fec_venc_mto;
        

        function exportPdf(){
            var pdf = new jsPDF('p', 'pt', 'letter');
            // console.log(pdf.getFontList());
            pdf.setFont("times");
            pdf.setFontType("normal");

            const pageCount = pdf.internal.getNumberOfPages(); 
            for(let i = 1; i <= pageCount; i++) {
                    pdf.setPage(i);

                    const pageSize = pdf.internal.pageSize;
                    const pageWidth = pageSize.width ? pageSize.width : pageSize.getWidth();
                    const pageHeight = pageSize.height ? pageSize.height : pageSize.getHeight();
                   
                    const footer = `Page ${i} of ${pageCount}`;

                    // Footer
                    // pdf.setFontSize(4);
                    // pdf.text(footer, pageWidth / 2 - (pdf.getTextWidth(footer) / 2), pageHeight - 15, { baseline: 'bottom' });
                } 
           
            pdf.autoTable({html:'#encabezado',
                startY: 13,
                startX: 5,
                showHead: 'everyPage',
                theme:'grid', //striped
                margin: { horizontal: 10 },
                setFont: 'times',
                columnStyles:{
                    0:{cellWidth:150 },
                    1:{cellWidth:252, halign: 'center' },
                    2:{cellWidth:90},
                    3:{cellWidth:100},
                    

                },
                rowStyles:{
                    0:{halign: 'center' },
                },
                bodyStyles: {lineColor: [1, 1, 1]},
                // headStyles :{ fillColor : [227, 6, 19], textColor: [0, 0, 0] },
                // headStyles :{ fillColor : [243, 146, 0], textColor: [0, 0, 0] },
                 headStyles :{ fillColor : [249, 178, 51], textColor: [0, 0, 0] },
                // alternateRowStyles: {fillColor : [231, 215, 252]},
                tableLineColor: [0, 0, 0],

                tableLineWidth: 0.1,
                styles: {overflow: 'linebreak', textColor: 0, cellWidth: '5', font: 'times', halign: 'center', fontSize: 9, cellPadding: 1, overflowColumns: 'linebreak'},
            });  //encabezado


            pdf.autoTable({html:'#table',



                didParseCell: (HookData) => {
                     
                    if (HookData.cell.text[0] == ['C']) {
                        // HookData.cell.text = 'C';

                        HookData.cell.styles.textColor = '#008f39'; //#008f39 verde //#ff0000 rojo
                    }else if(HookData.cell.text[0] == ['N']){
                        // HookData.cell.text = 'N';
                        HookData.cell.styles.textColor = '#ff0000';
                    }

                 
                    // if(HookData.cell.raw.id == 'dia1'){

                    //     HookData.cell.text = '1';
                    //     HookData.cell.styles.textColor = [0,0,0];
                    //  }

                    //  if(HookData.cell.raw.id == 'dia2'){
                    //     HookData.cell.text = '2';
                    //     HookData.cell.styles.textColor = [0,0,0];
                    //  }
                    


                    // if (HookData.cell.text[0] == ['1']) {
                    //     HookData.cell.text = '';
                    //     var imageOK = new Image();
                    //     imageOK.src = ok; /// URL de la imagen
                    //     pdf.addImage(imageOK, 'PNG', HookData.cell.x + 2, HookData.cell.y + 2, 5, 5);
                    //     // HookData.cell.text[0].textColor = [249, 178, 51];
                    // } else if(HookData.cell.text[0] == ['2']) {
                    //     HookData.cell.text = '';
                    //     var imageX = new Image();
                    //     imageX.src = x; /// URL de la imagen
                    //     pdf.addImage(imageX, 'PNG', HookData.cell.x + 2, HookData.cell.y + 2, 5, 5);
                    // }
                   
                },
                startY: 55,
                startX: 5,
                showHead: 'everyPage',
                theme:'grid', //striped
                margin: { horizontal: 10 },
                setFont: 'times',
                columnStyles:{
                    0:{cellWidth:80 },
                    1:{cellWidth:158, halign: 'left' },
                    2:{cellWidth:10},
                    3:{cellWidth:10},
                    4:{cellWidth:10},
                    5:{cellWidth:10},
                    6:{cellWidth:10},
                    7:{cellWidth:10},
                    8:{cellWidth:10},
                    9:{cellWidth:10},
                    10:{cellWidth:10},
                    11:{cellWidth:12},
                    12:{cellWidth:12},
                    13:{cellWidth:12},
                    14:{cellWidth:12},
                    15:{cellWidth:12},
                    16:{cellWidth:12},
                    17:{cellWidth:12},
                    18:{cellWidth:12},
                    19:{cellWidth:12},
                    20:{cellWidth:12},
                    21:{cellWidth:12},
                    22:{cellWidth:12},
                    23:{cellWidth:12},
                    24:{cellWidth:12},
                    25:{cellWidth:12},
                    26:{cellWidth:12},
                    27:{cellWidth:12},
                    28:{cellWidth:12},
                    29:{cellWidth:12},
                    30:{cellWidth:12},
                    31:{cellWidth:12, cellstylesfontSize: '10'},
                    32:{cellWidth:12},
                   

                },
                rowStyles:{
                    0:{halign: 'center' },
                },
                bodyStyles: {lineColor: [1, 1, 1]},
                // headStyles :{ fillColor : [227, 6, 19], textColor: [0, 0, 0] },
                // headStyles :{ fillColor : [243, 146, 0], textColor: [0, 0, 0] },
                 headStyles :{ fillColor : [249, 178, 51], textColor: [0, 0, 0] },
                // alternateRowStyles: {fillColor : [231, 215, 252]},
                tableLineColor: [0, 0, 0],

                tableLineWidth: 0.1,
                styles: {overflow: 'linebreak', cellWidth: '5', valign: 'middle', textColor: 0, font: 'times', halign: 'center', fontSize: 8, cellPadding: 1, overflowColumns: 'linebreak'},


            });  //cuerpo

            pdf.autoTable({html:'#vencimientos',
                startY: 640,
                startX: 5,
                showHead: 'everyPage',
                theme:'grid', //striped
                margin: { horizontal: 10 },
                setFont: 'times',
                tableWidth: 170,
                columnStyles:{
                    0:{cellWidth:110 },
                    1:{cellWidth:60, halign: 'center' },

                },
                rowStyles:{
                    0:{halign: 'center' },
                    1:{halign: 'left' },
                    2:{halign: 'left' },
                    3:{halign: 'left' },
                    4:{halign: 'left' },

                },
                bodyStyles: { lineColor: [1, 1, 1] },
                headStyles :{ fillColor : [255, 255, 255], textColor: [255, 0, 0], halign: 'left' },
                tableLineColor: [0, 0, 0],

                tableLineWidth: 0.9,
                styles: {overflow: 'linebreak', cellWidth: '5', textColor: 0, font: 'times', halign: 'left', fontSize: 7, cellPadding: 1, overflowColumns: 'linebreak'},
            });  //vencimientos

            pdf.autoTable({html:'#pie',
                startY: 717,
                startX: 5,
                showHead: 'everyPage',
                theme:'grid', //striped
                margin: { horizontal: 10 },
                setFont: 'times',
                columnStyles:{
                    0:{cellWidth:150 },
                    1:{cellWidth:442, halign: 'right' },

                },
                rowStyles:{
                    0:{halign: 'left' },
                    1:{halign: 'left' },
                    2:{halign: 'left' },
                    3:{halign: 'left' },
                    
                },
                bodyStyles: {lineColor: [0, 0, 0, 0], fillColor : [0, 0, 0, 0] },
                headStyles :{ fillColor : [249, 178, 51], textColor: [0, 0, 0] },
                // alternateRowStyles: {fillColor : [231, 215, 252]},
                tableLineColor: [255, 255, 255],

                tableLineWidth: 0.9,
                styles: {overflow: 'linebreak', lineColor: [255,255, 255], cellWidth: '5', textColor: 0, font: 'times', halign: 'center', fontSize: 7, cellPadding: 1, overflowColumns: 'linebreak'},
            });  //pie

            var logoCompleto = '<?php echo $imagenes[0]; ?>';
            var logoST = '<?php echo $imagenes[1]; ?>';

            var imageCabecera = new Image();
            imageCabecera.src = logoCompleto; /// URL de la imagen
            pdf.addImage(imageCabecera, 'PNG', 25, 8, 120, 50); // Agregar la imagen al PDF (X, Y, Width, Height)

            var imageFooter = new Image();
            imageFooter.src = logoST; /// URL de la imagen
            pdf.addImage(imageFooter, 'PNG', 25, 730, 110, 30); // Agregar la imagen al PDF (X, Y, Width, Height)
            
            pdf.setFontSize(8);
            pdf.setTextColor("#008f39")  //#008f39  #ff0000
            pdf.text('C: Cumple', 250,645);

            pdf.setFontSize(8);
            pdf.setTextColor("#ff0000")  //#008f39  #ff0000
            pdf.text('N: No Cumple', 350,645);
            // var image = new Image();
            // image.src = imgEstado; /// URL de la imagen
            // pdf.addImage(image, 'PNG', 300, 60, 5, 5); // Agregar la imagen al PDF (X, Y, Width, Height)


            //si la imagen es demasiado pesada esperar la carga de la imagen para mostrar el pdf(opcional)
            // image1.onload = function(){
            //     pdf.save("mipdf.pdf");
            // }
            let mes = new Date(datos[0]['fecha']);
            let mes_a = mes.getMonth(mes);
            let mes_ = mes_a+1;
            let anio = mes.getFullYear(mes);

            //se adiciona una nnueva pagina para el registro de los responsables y despachador
            pdf.addPage();

            pdf.autoTable({html:'#encabezado2',
                startY: 13,
                startX: 5,
                showHead: 'everyPage',
                theme:'grid', //striped
                margin: { horizontal: 10 },
                setFont: 'times',
                columnStyles:{
                    0:{cellWidth:150 },
                    1:{cellWidth:252, halign: 'center' },
                    2:{cellWidth:90},
                    3:{cellWidth:100},
                    

                },
                rowStyles:{
                    0:{halign: 'center' },
                },
                bodyStyles: {lineColor: [1, 1, 1]},
                // headStyles :{ fillColor : [227, 6, 19], textColor: [0, 0, 0] },
                // headStyles :{ fillColor : [243, 146, 0], textColor: [0, 0, 0] },
                 headStyles :{ fillColor : [249, 178, 51], textColor: [0, 0, 0] },
                // alternateRowStyles: {fillColor : [231, 215, 252]},
                tableLineColor: [0, 0, 0],

                tableLineWidth: 0.1,
                styles: {overflow: 'linebreak', textColor: 0, cellWidth: '5', font: 'times', halign: 'center', fontSize: 9, cellPadding: 1, overflowColumns: 'linebreak'},
            });  //encabezado

            var imageCabecera = new Image();
            imageCabecera.src = logoCompleto; /// URL de la imagen
            pdf.addImage(imageCabecera, 'PNG', 25, 8, 120, 50); // Agregar la imagen al PDF (X, Y, Width, Height)

            //aca van la tabla con los datos

            pdf.autoTable({html:'#tbldatosresponsables',

                startY: 55,
                startX: 5,
                showHead: 'everyPage',
                theme:'grid', //striped
                margin: { horizontal: 10 },
                setFont: 'times',
                columnStyles:{
                    0:{cellWidth:15, halign: 'center', minCellHeight: 20 },
                    1:{cellWidth:130, halign: 'center' },
                    2:{cellWidth:130, halign: 'center'},
                    3:{cellWidth:317},

                },
                rowStyles:{
                    
                },
                bodyStyles: {lineColor: [1, 1, 1]},
                // headStyles :{ fillColor : [227, 6, 19], textColor: [0, 0, 0] },
                // headStyles :{ fillColor : [243, 146, 0], textColor: [0, 0, 0] },
                 headStyles :{ fillColor : [249, 178, 51], textColor: [0, 0, 0] },
                // alternateRowStyles: {fillColor : [231, 215, 252]},
                tableLineColor: [0, 0, 0],

                tableLineWidth: 0.1,
                styles: {overflow: 'linebreak', cellWidth: '5', valign: 'middle', textColor: 0, font: 'times', halign: 'center', fontSize: 5, cellPadding: 1, overflowColumns: 'linebreak'},


            });  //cuerpo

            pdf.autoTable({html:'#pie2',
                startY: 717,
                startX: 5,
                showHead: 'everyPage',
                theme:'grid', //striped
                margin: { horizontal: 10 },
                setFont: 'times',
                columnStyles:{
                    0:{cellWidth:150 },
                    1:{cellWidth:442, halign: 'right' },

                },
                rowStyles:{
                    0:{halign: 'left' },
                    1:{halign: 'left' },
                    2:{halign: 'left' },
                    3:{halign: 'left' },
                    
                },
                bodyStyles: {lineColor: [0, 0, 0, 0], fillColor : [0, 0, 0, 0] },
                headStyles :{ fillColor : [249, 178, 51], textColor: [0, 0, 0] },
                // alternateRowStyles: {fillColor : [231, 215, 252]},
                tableLineColor: [255, 255, 255],

                tableLineWidth: 0.9,
                styles: {overflow: 'linebreak', lineColor: [255,255, 255], cellWidth: '5', textColor: 0, font: 'times', halign: 'center', fontSize: 7, cellPadding: 1, overflowColumns: 'linebreak'},
            });  //pie

            var imageFooter = new Image();
            imageFooter.src = logoST; /// URL de la imagen
            pdf.addImage(imageFooter, 'PNG', 25, 730, 110, 30); // Agregar la imagen al PDF (X, Y, Width, Height)


       
            // 'PA'+numero_interno+'_'+mes_+anio
            // const file = new File([blob],"nombre.pdf", { type:"application/pdf" });
            // window.open(URL.createObjectURL(pdf.output("blob")))
            // pdf.output('dataurlnewwindow');
            pdf.save('PA'+numero_interno+'_'+mes_+anio);
         }
    </script>

@endsection