<?php 
    setlocale(LC_ALL, 'es_ES');
    date_default_timezone_set('America/Bogota');
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

<html>
    <head>               
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" > -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" type="text/javascript"></script>
        <script  src="https://code.jquery.com/jquery-3.6.4.min.js"  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="  crossorigin="anonymous"></script>
        
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" type="text/javascript" ></script> -->
        <style type="text/css" media="screen">
           
        </style>
    </head>
    <body>

            @include('planillas.headerpdf')
       
            <table  id='table' border='1' align="center" style="width:100%; font-size: 10px; display: block;" > 

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

            @include('planillas.vencimientos')

            @include('planillas.footerpdf')
      
           <table id='tbldatosresponsables' border='1' align="center" style="width:100%; font-size: 10px;">
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
        
        <button type="button" onclick="exportPdf()" class="btn btn-primary">Export To PDF</button>
    </body>
    <script>
        
        var planillas = '<?php echo $planilla; ?>';
        var datos = JSON.parse(planillas);

        var ok = '<?php echo $imagenes[2]; ?>';
        var x = '<?php echo $imagenes[3]; ?>';


        //para imprimir el numero interno del vehiculo
        var tabla_vehiculo = document.getElementById('table');
        var numero_interno = datos[0]['numero_interno'];
        tabla_vehiculo.rows[1].cells[0].innerHTML   = 'Vehiculo: '+numero_interno;


        for (var i = 0; i < datos.length; i++) {
                
                let presion                = datos[i]['presion'];
                let labrado                = datos[i]['labrado'];
                let tuercas                = datos[i]['tuercas'];
                let rines                  = datos[i]['rines'];
                let repuesto               = datos[i]['repuesto'];
                let freno_parqueo          = datos[i]['freno_parqueo'];
                let sistema_frenos         = datos[i]['sistema_frenos'];
                let liquido_frenos         = datos[i]['liquido_frenos'];
                let luz_reversa            = datos[i]['luz_reversa'];
                let luces_bajas            = datos[i]['luces_bajas'];
                let luces_altas            = datos[i]['luces_altas'];
                let cucuyos                = datos[i]['cucuyos'];
                let luces_freno            = datos[i]['luces_freno'];
                let direccionales          = datos[i]['direccionales'];
                let nivel_temperatura      = datos[i]['nivel_temperatura'];
                let nivel_conbustible      = datos[i]['nivel_conbustible'];
                let presion_aceite         = datos[i]['presion_aceite'];
                let nivel_bateria          = datos[i]['nivel_bateria'];
                let retrovisores           = datos[i]['retrovisores'];
                let puertas                = datos[i]['puertas'];
                let nivel_aceite           = datos[i]['nivel_aceite'];
                let fugas_motor            = datos[i]['fugas_motor'];
                let nivel_direccion        = datos[i]['nivel_direccion'];
                let nivel_refrigerante     = datos[i]['nivel_refrigerante'];
                let nivel_limpiabrisas     = datos[i]['nivel_limpiabrisas'];
                let pito                   = datos[i]['pito'];
                let limpiabrisas           = datos[i]['limpiabrisas'];
                let tapa_radiador          = datos[i]['tapa_radiador'];
                let correa_ventilador      = datos[i]['correa_ventilador'];
                let bateria                = datos[i]['bateria'];
                let ajuste_bornes          = datos[i]['ajuste_bornes'];
                let transmision            = datos[i]['transmision'];
                let filtros_hys            = datos[i]['filtros_hys'];
                let conos_triangulos_tacos = datos[i]['conos_triangulos_tacos'];
                let herramientas           = datos[i]['herramientas'];
                let linterna_gato          = datos[i]['linterna_gato'];
                let cruceta_llave_pernos   = datos[i]['cruceta_llave_pernos'];
                let extintor               = datos[i]['extintor'];
                let salida_emergencia      = datos[i]['salida_emergencia'];
                let botiquin               = datos[i]['botiquin'];
                let cinturones             = datos[i]['cinturones'];
                let velocimetro            = datos[i]['velocimetro'];
                let aseo_general           = datos[i]['aseo_general'];
                let conductor_uniformado   = datos[i]['conductor_uniformado'];
                let conductor_carnet       = datos[i]['conductor_carnet'];

                let conductor = datos[i]['conductor'];
                let supervisor = datos[i]['usr_supervisa'];
                let obs_supervisor = datos[i]['obs_supervisor'];
                let obs_conductor = datos[i]['observaciones'];
                
                let dia_mes = new Date(datos[i]['fecha']);
                let dia_planilla = dia_mes.getDate();
                var tabla = document.getElementById('table');

                var tablaresponsables = document.getElementById('tbldatosresponsables');
                
                
                // tabla.rows[2].cells[dia_planilla+1].innerHTML   = presion; 
                let id = '#p'+(dia_planilla-1)+' '; 
                $(id).addClass('verde');
                if(presion == 1){
                    var imgEstado = '<?php echo $imagenes[2]; ?>';
                }else if(presion == 0){
                    var imgEstado = '<?php echo $imagenes[3]; ?>';
                }else{
                    var imgEstado = '';                    
                }
                tabla.rows[2].cells[dia_planilla+1].innerHTML   = presion;
                tabla.rows[3].cells[dia_planilla].innerHTML     = labrado;
                tabla.rows[4].cells[dia_planilla].innerHTML     = tuercas;
                tabla.rows[5].cells[dia_planilla].innerHTML     = rines;
                tabla.rows[6].cells[dia_planilla].innerHTML     = repuesto;
                tabla.rows[7].cells[dia_planilla+1].innerHTML   = freno_parqueo;
                tabla.rows[8].cells[dia_planilla].innerHTML     = sistema_frenos;
                tabla.rows[9].cells[dia_planilla].innerHTML     = liquido_frenos;
                tabla.rows[10].cells[dia_planilla+1].innerHTML  = luz_reversa;
                tabla.rows[11].cells[dia_planilla].innerHTML    = luces_bajas;
                tabla.rows[12].cells[dia_planilla].innerHTML    = luces_altas;
                tabla.rows[13].cells[dia_planilla].innerHTML    = cucuyos;
                tabla.rows[14].cells[dia_planilla].innerHTML    = luces_freno;
                tabla.rows[15].cells[dia_planilla].innerHTML    = direccionales;
                tabla.rows[16].cells[dia_planilla+1].innerHTML  = nivel_temperatura;
                tabla.rows[17].cells[dia_planilla].innerHTML    = nivel_conbustible;
                tabla.rows[18].cells[dia_planilla].innerHTML    = presion_aceite;
                tabla.rows[19].cells[dia_planilla].innerHTML    = nivel_bateria;
                tabla.rows[20].cells[dia_planilla+1].innerHTML  = retrovisores;
                tabla.rows[21].cells[dia_planilla].innerHTML    = puertas;
                tabla.rows[22].cells[dia_planilla].innerHTML    = nivel_aceite;
                tabla.rows[23].cells[dia_planilla].innerHTML    = fugas_motor;
                tabla.rows[24].cells[dia_planilla].innerHTML    = nivel_direccion;
                tabla.rows[25].cells[dia_planilla].innerHTML    = nivel_refrigerante;
                tabla.rows[26].cells[dia_planilla].innerHTML    = nivel_limpiabrisas;
                tabla.rows[27].cells[dia_planilla].innerHTML    = pito;
                tabla.rows[28].cells[dia_planilla].innerHTML    = limpiabrisas;
                tabla.rows[29].cells[dia_planilla].innerHTML    = tapa_radiador;
                tabla.rows[30].cells[dia_planilla].innerHTML    = correa_ventilador;
                tabla.rows[31].cells[dia_planilla].innerHTML    = bateria;
                tabla.rows[32].cells[dia_planilla].innerHTML    = ajuste_bornes;
                tabla.rows[33].cells[dia_planilla].innerHTML    = transmision;
                tabla.rows[34].cells[dia_planilla].innerHTML    = filtros_hys;
                tabla.rows[35].cells[dia_planilla+1].innerHTML  = conos_triangulos_tacos;
                tabla.rows[36].cells[dia_planilla].innerHTML    = herramientas;
                tabla.rows[37].cells[dia_planilla].innerHTML    = linterna_gato;
                tabla.rows[38].cells[dia_planilla].innerHTML    = cruceta_llave_pernos;
                tabla.rows[39].cells[dia_planilla].innerHTML    = extintor;
                tabla.rows[40].cells[dia_planilla].innerHTML    = salida_emergencia;
                tabla.rows[41].cells[dia_planilla].innerHTML    = botiquin;
                tabla.rows[42].cells[dia_planilla].innerHTML    = cinturones;
                tabla.rows[43].cells[dia_planilla].innerHTML    = velocimetro;
                tabla.rows[44].cells[dia_planilla+1].innerHTML  = aseo_general;
                tabla.rows[45].cells[dia_planilla].innerHTML    = conductor_uniformado;
                tabla.rows[46].cells[dia_planilla].innerHTML    = conductor_carnet;
              
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
            pdf.setFont("courier");
            pdf.setFontType("normal");

            const pageCount = pdf.internal.getNumberOfPages(); 
            for(let i = 1; i <= pageCount; i++) {
                    pdf.setPage(i);

                    const pageSize = pdf.internal.pageSize;
                    const pageWidth = pageSize.width ? pageSize.width : pageSize.getWidth();
                    const pageHeight = pageSize.height ? pageSize.height : pageSize.getHeight();
                   
                    const footer = `Page ${i} of ${pageCount}`;

                    // Footer
                    pdf.setFontSize(4);
                    pdf.text(footer, pageWidth / 2 - (pdf.getTextWidth(footer) / 2), pageHeight - 15, { baseline: 'bottom' });
                } 
           
            pdf.autoTable({html:'#encabezado',
                startY: 13,
                startX: 5,
                showHead: 'everyPage',
                theme:'grid', //striped
                margin: { horizontal: 10 },
                setFont: 'courier',
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
                styles: {overflow: 'linebreak', textColor: 0, cellWidth: '5', font: 'courier', halign: 'center', fontSize: 9, cellPadding: 1, overflowColumns: 'linebreak'},
            });  //encabezado


            pdf.autoTable({html:'#table',

                didParseCell: (HookData) => {
                     
                    if (HookData.cell.text[0] == ['1']) {
                        HookData.cell.text = 'C';
                        HookData.cell.styles.textColor = '#008f39'; //#008f39 verde //#ff0000 rojo
                    }else if(HookData.cell.text[0] == ['2']){
                        HookData.cell.text = 'N';
                        HookData.cell.styles.textColor = '#ff0000';
                    }

                 
                    if(HookData.cell.raw.id == 'dia1'){
                        HookData.cell.text = '1';
                        HookData.cell.styles.textColor = [0,0,0];
                     }

                     if(HookData.cell.raw.id == 'dia2'){
                        HookData.cell.text = '2';
                        HookData.cell.styles.textColor = [0,0,0];
                     }
                    


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
                setFont: 'courier',
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
                styles: {overflow: 'linebreak', cellWidth: '5', valign: 'middle', textColor: 0, font: 'courier', halign: 'center', fontSize: 8, cellPadding: 1, overflowColumns: 'linebreak'},


            });  //cuerpo

            pdf.autoTable({html:'#vencimientos',
                startY: 640,
                startX: 5,
                showHead: 'everyPage',
                theme:'grid', //striped
                margin: { horizontal: 10 },
                setFont: 'courier',
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
                styles: {overflow: 'linebreak', cellWidth: '5', textColor: 0, font: 'courier', halign: 'left', fontSize: 7, cellPadding: 1, overflowColumns: 'linebreak'},
            });  //vencimientos

            pdf.autoTable({html:'#pie',
                startY: 717,
                startX: 5,
                showHead: 'everyPage',
                theme:'grid', //striped
                margin: { horizontal: 10 },
                setFont: 'courier',
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
                styles: {overflow: 'linebreak', lineColor: [255,255, 255], cellWidth: '5', textColor: 0, font: 'courier', halign: 'center', fontSize: 7, cellPadding: 1, overflowColumns: 'linebreak'},
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
                setFont: 'courier',
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
                styles: {overflow: 'linebreak', textColor: 0, cellWidth: '5', font: 'courier', halign: 'center', fontSize: 9, cellPadding: 1, overflowColumns: 'linebreak'},
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
                setFont: 'courier',
                columnStyles:{
                    0:{cellWidth:15, halign: 'center', minCellHeight: 20 },
                    1:{cellWidth:130, halign: 'center' },
                    2:{cellWidth:130, halign: 'center'},
                    3:{cellWidth:317},

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
                styles: {overflow: 'linebreak', cellWidth: '5', valign: 'middle', textColor: 0, font: 'courier', halign: 'left', fontSize: 5, cellPadding: 1, overflowColumns: 'linebreak'},


            });  //cuerpo

            pdf.autoTable({html:'#pie2',
                startY: 717,
                startX: 5,
                showHead: 'everyPage',
                theme:'grid', //striped
                margin: { horizontal: 10 },
                setFont: 'courier',
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
                styles: {overflow: 'linebreak', lineColor: [255,255, 255], cellWidth: '5', textColor: 0, font: 'courier', halign: 'center', fontSize: 7, cellPadding: 1, overflowColumns: 'linebreak'},
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
</html>