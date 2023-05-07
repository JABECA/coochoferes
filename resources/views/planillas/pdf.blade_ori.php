<?php 
	setlocale(LC_ALL, 'es_ES');
	date_default_timezone_set('America/Bogota');
	$fecha = $planilla[0]['fecha'];
	$fecha_entero = strtotime($fecha);
	$monthNum = date("m", $fecha_entero);
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PDF Planilla Alistamiento</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<style>
		.page-break {
		    page-break-after: always;
		}

		.centrar{
			text-align: center;
		}
	</style>
</head>
<body>
	<div style="text-align: center;">

		@include('planillas.headerpdf')

		<br>

		<table  id='tbldatos' border='1' align="center" style="width:100%; font-size: 10px;" > 
			
			<thead>
				<th class="centrar">Indicador</th>
				<th class="centrar">Items</th>
				<th colspan="31" style="text-align: center;">Dia del mes</th>
			</thead>
			
			<tbody>
				
				<tr>
					<td class="centrar"><img src="" alt="" width="8" height="8">Si Cumple &nbsp;&nbsp;&nbsp; <img src="" alt="" width="8" height="8">No cumple</td>
					<td style="text-align: center;"><b>MES: <?php echo $monthName; ?></b></td>
					<?php 
					for ($i=1; $i <= 31 ; $i++) { 
						echo "<td>".$i."</td>";
					}
					?>
				</tr>

				<tr>
					<td rowspan="5" class="centrar">Llantas</td>
					<td >Presión</td>
					<?php 


						for ($i=0; $i <=30 ; $i++) { 
						echo "<td></td>";
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
					<td>Encienden direccionales (adelante y atrás)</td>
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
					<td>Linterna, gator</td>
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

		<table  id="vencimientos"  border='1' style="width:50%; font-size: 10px;">
			<caption style="text-align: left;">Vencimientos:</caption>
			<tbody>
				<tr>
					<td >Licencia de Conducción</td>
					<td ><?php echo $vencimientos['fec_venc_licencia']; ?></td>
				</tr>
				<tr>
					<td>SOAT</td>
					<td><?php echo $vencimientos['fec_venc_SOAT']; ?></td>
				</tr>
				<tr>
					<td>RTM</td>
					<td><?php echo $vencimientos['fec_venc_RTM']; ?></td>
				</tr>
				<tr>
					<td>Tta de Operación</td>
					<td><?php echo $vencimientos['fec_venc_TOP']; ?></td>
				</tr>
				<tr>
					<td>Mantenimiento Preventivo</td>
					<td><?php echo $vencimientos['fec_venc_mto']; ?></td>
				</tr>
				
			</tbody>
		</table>

		<br>

		@include('planillas.footerpdf')

 	</div>

 	<div class="page-break"></div>

 	@include('planillas.headerpdf')
 	
 	<br>

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
 	<br>
 	@include('planillas.footerpdf')

 	
	   	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
	 	<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="crossorigin="anonymous"></script>

 
	 	<script type="text/javascript">

	 		var planillas = '<?php echo $planilla; ?>';
	 		var datos = JSON.parse(planillas);

	 		for (var i = 0; i < datos.length; i++) {
	 			
	 			let presion				   = datos[i]['presion'];
	 			let labrado				   = datos[i]['labrado'];
	 			let tuercas				   = datos[i]['tuercas'];
	 			let rines  				   = datos[i]['rines'];
	 			let repuesto               = datos[i]['repuesto'];
	 			let freno_parqueo          = datos[i]['freno_parqueo'];
				let sistema_frenos         = datos[i]['sistema_frenos'];
				let liquido_frenos         = datos[i]['liquido_frenos'];
				let luz_reversa	           = datos[i]['luz_reversa'];
				let luces_bajas	           = datos[i]['luces_bajas'];
				let luces_altas	           = datos[i]['luces_altas'];
				let cucuyos	               = datos[i]['cucuyos'];
				let luces_freno	           = datos[i]['luces_freno'];
				let direccionales          = datos[i]['direccionales'];
				let nivel_temperatura      = datos[i]['nivel_temperatura'];
				let nivel_conbustible      = datos[i]['nivel_conbustible'];
				let presion_aceite	       = datos[i]['presion_aceite'];
				let nivel_bateria	       = datos[i]['nivel_bateria'];
				let retrovisores	       = datos[i]['retrovisores'];
				let puertas	               = datos[i]['puertas'];
				let nivel_aceite	       = datos[i]['nivel_aceite'];
				let fugas_motor	           = datos[i]['fugas_motor'];
				let nivel_direccion	       = datos[i]['nivel_direccion'];
				let nivel_refrigerante	   = datos[i]['nivel_refrigerante'];
				let nivel_limpiabrisas	   = datos[i]['nivel_limpiabrisas'];
				let pito	               = datos[i]['pito'];
				let limpiabrisas	       = datos[i]['limpiabrisas'];
				let tapa_radiador	       = datos[i]['tapa_radiador'];
				let correa_ventilador	   = datos[i]['correa_ventilador'];
				let bateria	               = datos[i]['bateria'];
				let ajuste_bornes	       = datos[i]['ajuste_bornes'];
				let transmision	           = datos[i]['transmision'];
				let filtros_hys	           = datos[i]['filtros_hys'];
				let conos_triangulos_tacos = datos[i]['conos_triangulos_tacos'];
				let herramientas	       = datos[i]['herramientas'];
				let linterna_gato	       = datos[i]['linterna_gato'];
				let cruceta_llave_pernos   = datos[i]['cruceta_llave_pernos'];
				let extintor	           = datos[i]['extintor'];
				let salida_emergencia	   = datos[i]['salida_emergencia'];
				let botiquin	           = datos[i]['botiquin'];
				let cinturones	           = datos[i]['cinturones'];
				let velocimetro	           = datos[i]['velocimetro'];
				let aseo_general	       = datos[i]['aseo_general'];
				let conductor_uniformado   = datos[i]['conductor_uniformado'];
				let conductor_carnet       = datos[i]['conductor_carnet'];

				let conductor = datos[i]['conductor'];
 				let supervisor = datos[i]['usr_supervisa'];
 				let obs_supervisor = datos[i]['obs_supervisor'];
 				let obs_conductor = datos[i]['observaciones'];
				 			
	 			let dia_mes = new Date(datos[i]['fecha']);
			    let dia_planilla = dia_mes.getDate();
			    var tabla = document.getElementById('tbldatos');
			    
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
	 	</script> 

	 	<!-- <script type="text/javascript">

	 		var planillas = '<?php echo $planilla; ?>';
	 		var datos = JSON.parse(planillas);

	 		for (var i = 0; i < datos.length; i++) {
	 			
	 			let conductor = datos[i]['conductor'];
 				let supervisor = datos[i]['usr_supervisa'];
 				let obs_supervisor = datos[i]['obs_supervisor'];
 				let obs_conductor = datos[i]['observaciones'];
	 			let dia_mes = new Date(datos[i]['fecha']);
			    let dia_planilla = dia_mes.getDate();

			    if(obs_supervisor == null || obs_supervisor =='' ){
			    	obs_supervisor = ''
			    }else{
			    	obs_supervisor = ' D: '+obs_supervisor;
			    }

			     if(obs_conductor == null || obs_conductor =='' ){
			    	obs_conductor = ''
			    }else{
			    	obs_conductor = ' C: '+obs_conductor;
			    }
			    
			    var tabla_responsables = document.getElementById('tbldatosresponsables');


				tabla_responsables.rows[dia_planilla].cells[1].innerHTML  = conductor;
				tabla_responsables.rows[dia_planilla].cells[2].innerHTML  = supervisor;
				tabla_responsables.rows[dia_planilla].cells[3].innerHTML  = obs_conductor+obs_supervisor;



	 		}
	 	
	 	</script>
 -->
	 	<script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 980, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 8);
            ');

        }
		</script>
	 	 
 	
</body>
</html>


