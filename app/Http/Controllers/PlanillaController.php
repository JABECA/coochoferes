<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Planilla;
use App\Models\Numerosinternos;
use App\Models\Vehiculos;
use App\Models\Persona;
use Session;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;

class PlanillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:ver-planillas|crear-planillas|editar-planillas|borrar-planillas')->only('index');
         $this->middleware('permission:ver-planillas',    ['only' => ['show']]);
         $this->middleware('permission:crear-planillas',  ['only' => ['create','store']]);
         $this->middleware('permission:editar-planillas', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-planillas', ['only' => ['destroy']]);

    }


    public function index(Request $request) {

        if ($request->ajax()) {

            $userName = \Illuminate\Support\Facades\Auth::user()->name;

            if (  ( $request->has('mes')  && !empty($request->get('mes')) ) &&
                  ( $request->has('num_interno')  && !empty($request->get('num_interno')) ) ) {

                    $documento    = 'fecha';                   
                    $mes          = $request->get('mes');
                    $num_interno  = $request->get('num_interno');

                    $planillas = Planilla::select('numero_interno', DB::raw('count(numero_interno) as total') )
                                            ->whereMonth($documento, $mes )
                                            ->where('numero_interno', $num_interno)
                                            ->groupBy('numero_interno')
                                            ->get();

                    for ($i=0; $i < sizeof($planillas); $i++) { 
                        $id = Planilla::where('numero_interno', $planillas[$i]['numero_interno'])->whereMonth('fecha', $mes)->max('id');
                        $planillas[$i]->id = $id;
                    }

                    return DataTables::of($planillas)
                            ->addColumn('actions', 'planillas.actions')
                            ->rawColumns(['actions'])
                            ->make(true);
                   
            }

            
            if (  ( $request->has('mes')  && !empty($request->get('mes')) ) ) {

                    $documento    = 'fecha';                   
                    $mes       = $request->get('mes');
                    
                    $planillas = Planilla::select('numero_interno', DB::raw('count(numero_interno) as total') )
                                            ->whereMonth($documento, $mes )
                                            ->groupBy('numero_interno')
                                            ->get();

                    for ($i=0; $i < sizeof($planillas); $i++) { 
                        $id = Planilla::where('numero_interno', $planillas[$i]['numero_interno'])->whereMonth('fecha', $mes)->max('id');
                        $planillas[$i]->id = $id;
                    }
                    
                    return DataTables::of($planillas)
                            ->addColumn('actions', 'planillas.actions')
                            ->rawColumns(['actions'])
                            ->make(true);
                   
            }


            
            
            $planillas = Planilla::where('numero_interno' , 0)->get();
            
            return DataTables::of($planillas)
                    ->addColumn('actions', 'planillas.actions')
                    ->rawColumns(['actions'])
                    ->make(true);
            
        }

        $Numerosinternos = Numerosinternos::pluck('num_interno', 'num_interno');
       
        return view('planillas.index', compact('Numerosinternos'));
        
    }


    public function revisar(Request $request)
    {
        
        setlocale(LC_ALL, 'es_ES');
        date_default_timezone_set('America/Bogota');
        $mes_actual = date("m");
        $dia_actual = date("d") ;

        if ($request->ajax()) {
            
            $userName = \Illuminate\Support\Facades\Auth::user()->name;

            if ( ( $request->has('fecha_ini')  && !empty($request->get('fecha_ini'))) &&  ( $request->has('fecha_fin')  && !empty($request->get('fecha_fin'))) ) {
                    
                    $documento    = 'fecha';
                    $fecini = $request->get('fecha_ini');
                    $fecfin = $request->get('fecha_fin');
                    $num_interno  = $request->get('num_interno');

                    $planillas = Planilla::whereBetween($documento, [$fecini, $fecfin] )
                                            // ->where('numero_interno' , $num_interno)
                                            ->orderBy('id', 'desc')
                                            ->get();

                    return DataTables::of($planillas)
                            ->addColumn('actions', 'planillas.actions')
                            ->rawColumns(['actions'])
                            ->make(true);
                   
            }


            if (                   
                  ( $request->has('num_interno')  && !empty($request->get('num_interno')) )
               ) {
                    
                    $documento    = 'fecha';
                    if ($request->get('mes') ) {
                       $mes       = $request->get('mes');                    
                    }else{
                       $mes       = $mes_actual;
                    }                   
                    
                    
                    $num_interno  = $request->get('num_interno');

                    // $planillas = Planilla::whereBetween($documento, [$fecini, $fecfin] )
                    //                         ->where('numero_interno' , $num_interno)
                    //                         ->orderBy('id', 'desc')
                    //                         ->get();
                     $planillas = Planilla::whereMonth($documento, $mes )
                                            ->where('numero_interno' , $num_interno)
                                            ->orderBy('id', 'desc')
                                            ->get();
                    // $planillas = Planilla::where('numero_interno' , $num_interno)->orderBy('id', 'desc')->get();
                    
                    // dd($planillas);
                    return DataTables::of($planillas)
                            ->addColumn('actions', 'planillas.actions')
                            ->rawColumns(['actions'])
                            ->make(true);
                   
            }
            
            // $numerosInternos = Numerosinternos::All(); 
            $planillas = Planilla::where('estado_planilla' , 0)->orderBy('id', 'desc' )->limit(10)->get();
             // dd($planillas);
            // $planillas = [];
            
            return DataTables::of($planillas)
                    ->addColumn('actions', 'planillas.actions')
                    ->rawColumns(['actions'])
                    ->make(true);
            
        }

        $Numerosinternos = Numerosinternos::pluck('num_interno', 'num_interno');
       
        return view('planillas.revisar', compact('Numerosinternos'));
        
    }

    public function pdf(Planilla $planilla)
    {
        // SELECT * FROM `planillas` WHERE numero_interno = 134 and fecha BETWEEN '2023-04-01' and '2023-04-20';
        // dd($planilla);
        //extraemos el mes del registro seleccionado
        $fecha = $planilla->fecha;
        $mes = date('m', strtotime($fecha));

        $numero_interno = $planilla->numero_interno;
        $nombrepdf = 'PA_'.$mes.'_'.$numero_interno.'.pdf';

        $logoCompleto = asset('img/coochoferes.png');
        $logoST = asset('img/ST.png');
        $ok     = asset('img/ok.png');
        $x     = asset('img/x.png');
        $ok_base64 = asset('img/ok_base64.png');

        $imagenes = array($logoCompleto ,$logoST, $ok, $x, $ok_base64);
        
        //consultamos por rango de fecha
        // $planillas = Planilla::where('numero_interno', $numero_interno)->whereBetween('fecha', ['2023-04-01', '2023-04-30'])->get();
        
        //consultamos por mes especifico
        $planillas = Planilla::where('numero_interno', $numero_interno)->whereMonth('fecha', $mes)->get();


        $vencimientos = array();
        $venc_docts = Vehiculos::select('fec_venc_SOAT', 'fec_venc_RTM', 'fec_venc_TOP', 'id_conductor', 'fec_venc_mto')->where('num_interno', $numero_interno)->get();

        foreach ($venc_docts as $key => $value) {
            $fec_venc_SOAT = $value['fec_venc_SOAT'];
            $fec_venc_RTM  = $value['fec_venc_RTM'];
            $fec_venc_TOP  = $value['fec_venc_TOP'];
            $id_conductor  = $value['id_conductor'];
            $fec_venc_mto  = $value['fec_venc_mto'];
        }

        $ven_lic_cond = Persona::select('fec_venc_licencia')->where('id', $id_conductor)->get();

        foreach ($ven_lic_cond as $key => $value) {
            $fec_venc_licencia = $value['fec_venc_licencia'];
        }
        
        $vencimientos = array('fec_venc_SOAT'=>$fec_venc_SOAT, 'fec_venc_RTM'=> $fec_venc_RTM, 'fec_venc_TOP'=> $fec_venc_TOP, 'fec_venc_licencia'=> $fec_venc_licencia, 'fec_venc_mto'=> $fec_venc_mto );

        // dd($planillas);
        //retorna el PDF
        // $options = new Options();
        // $options->set('isJavascriptEnabled', TRUE);
        
        // $pdf = \PDF::loadView('planillas.pdf', [ 'planilla'=>$planillas, 'vencimientos'=>$vencimientos] );
        // $pdf->setPaper('legal', 'portrait');
        // $pdf->setOption('enable-javascript', true);
        // $pdf->setOption('javascript-delay', 13500);
        // $pdf->setOption('enable-smart-shrinking', true);
        // $pdf->setOption('no-stop-slow-scripts', true);
        // return $pdf->stream($nombrepdf);

        //retorna la vista en html
        $planilla = $planillas;
        // $planilla = Planilla::where('numero_interno', $numero_interno)->whereBetween('fecha', ['2023-04-01', '2023-04-30'])->get();
         $planillas = Planilla::where('numero_interno', $numero_interno)->whereMonth('fecha', $mes)->get();
        return view('planillas.pdf', compact('planilla', 'vencimientos' , 'imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        date_default_timezone_set('America/Bogota');
        $today = date('Y-m-d');
        $hoy = date('d-m-Y');
        // $today = '2023-04-27 19:15:44'; //para validar dias anteriores
        $today = $today.'%';

        //Buscamos la cedula del usuario logueado
        $user_login_identificacion = \Illuminate\Support\Facades\Auth::user()->identificacion;

        //optenemos el id de la persona conductora del vehiculo a partir de sus datos de login
        $persona = Persona::where('identificacion', $user_login_identificacion)->get();
        foreach ($persona as $key => $value) {
            $id_persona = $value['id'];
            $nom_conductor = $value['nombres'];
            $apellidos = $value['apellidos'];
            $conductor = $nom_conductor.' '.$apellidos;
        }
        if(count($persona) == 0 || count($persona) == ''){
            $usuario = \Illuminate\Support\Facades\Auth::user()->name;
            return view('planillas.creada', compact('usuario'));
        }
       
        //optenemos el numero interno del vehiculo que maneja la persona
        $vehiculo = Vehiculos::where('id_conductor', $id_persona)->get();
        foreach ($vehiculo as $key => $value) {
            $num_interno = $value['num_interno'];
        }
        
        \DB::enableQueryLog(); //habilita el log de sql

        //verificamos si el vehiculo ya tiene una planilla creada para el dia actual
        $verifica_planilla = Planilla::where('numero_interno', $num_interno)->where('fecha','like', $today)->get();


        //***************************************************************************para los vencimientos de documentos conductor y vehiculo***********************************************************
        $vencimientos = array();
        $venc_docts = Vehiculos::select('fec_venc_SOAT', 'fec_venc_RTM', 'fec_venc_TOP', 'id_conductor', 'fec_venc_mto')->where('num_interno', $num_interno)->get();
        foreach ($venc_docts as $key => $value) {
            $fec_venc_SOAT = $value['fec_venc_SOAT'];
            $fec_venc_RTM  = $value['fec_venc_RTM'];
            $fec_venc_TOP  = $value['fec_venc_TOP'];
            $id_conductor  = $value['id_conductor'];
            $fec_venc_mto  = $value['fec_venc_mto'];
        }
        $ven_lic_cond = Persona::select('fec_venc_licencia')->where('id', $id_conductor)->get();
        foreach ($ven_lic_cond as $key => $value) {
            $fec_venc_licencia = $value['fec_venc_licencia'];
        }
        $vencimientos = array('fec_venc_SOAT'=>$fec_venc_SOAT, 'fec_venc_RTM'=> $fec_venc_RTM, 'fec_venc_TOP'=> $fec_venc_TOP, 'fec_venc_licencia'=> $fec_venc_licencia, 'fec_venc_mto'=> $fec_venc_mto );
        //*************************************************************************************************************************************************************************************************


       
        // dd($verifica_planilla);
        // dd(\DB::getQueryLog());

        $verifica_planilla = count($verifica_planilla);

        // dd($verifica_planilla);
       
        if ($verifica_planilla == 0) {
           return view('planillas.crear', compact('vehiculo', 'num_interno', 'conductor', 'verifica_planilla', 'vencimientos' ));
        }else if($verifica_planilla == 1){
            return view('planillas.creada', compact('num_interno', 'hoy', 'vencimientos'));
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $regplanilla = new Planilla();
        
        //validamos la entrada de los campos del formulario de creacion de nuevo regpasajero
        request()->validate(
            [   
                'num_interno'             => 'required',
                'fecha_registro'          => 'required',
                'nombre_conductor'        => 'required|min:3|max:50|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
            ]
           
        );

        date_default_timezone_set('America/Bogota');
        $time = time();
        $horaRegistro = date("H:i:s", $time);
        $fecha_registro = $request->fecha_registro.' '.$horaRegistro;

      
        $regplanilla->numero_interno         = $request->num_interno;
        $regplanilla->conductor              = $request->nombre_conductor;
        $regplanilla->fecha                  = $fecha_registro;
        $regplanilla->presion                = $request->presion;     
        $regplanilla->labrado                = $request->labrado;
        $regplanilla->tuercas                = $request->tuercas;
        $regplanilla->rines                  = $request->rines;
        $regplanilla->repuesto               = $request->repuesto;
        $regplanilla->freno_parqueo          = $request->freno_parqueo;
        $regplanilla->sistema_frenos         = $request->sistema_frenos;
        $regplanilla->liquido_frenos         = $request->liquido_frenos;
        $regplanilla->luz_reversa            = $request->luz_reversa;
        $regplanilla->luces_bajas            = $request->luces_bajas;
        $regplanilla->luces_altas            = $request->luces_altas;
        $regplanilla->cucuyos                = $request->cucuyos;
        $regplanilla->luces_freno            = $request->luces_freno;      
        $regplanilla->direccionales          = $request->direccionales;    
        $regplanilla->nivel_conbustible      = $request->nivel_conbustible;
        $regplanilla->presion_aceite         = $request->presion_aceite;        
        $regplanilla->nivel_bateria          = $request->nivel_bateria;         
        $regplanilla->nivel_temperatura      = $request->nivel_temperatura;     
        $regplanilla->retrovisores           = $request->retrovisores;          
        $regplanilla->puertas                = $request->puertas;               
        $regplanilla->nivel_aceite           = $request->nivel_aceite;
        
        $regplanilla->fugas_motor            = $request->fugas_motor;
        $regplanilla->ajuste_bornes          = $request->ajuste_bornes;
        $regplanilla->transmision            = $request->transmision;
        $regplanilla->filtros_hys            = $request->filtros_hys;

        $regplanilla->nivel_direccion        = $request->nivel_direccion;       
        $regplanilla->nivel_refrigerante     = $request->nivel_refrigerante;    
        $regplanilla->nivel_limpiabrisas     = $request->nivel_limpiabrisas;    
        $regplanilla->pito                   = $request->pito;                 
        $regplanilla->limpiabrisas           = $request->limpiabrisas;          
        $regplanilla->tapa_radiador          = $request->tapa_radiador;         
        $regplanilla->correa_ventilador      = $request->correa_ventilador;     
        $regplanilla->bateria                = $request->bateria;               
        $regplanilla->conos_triangulos_tacos = $request->conos_triangulos_tacos;
        $regplanilla->herramientas           = $request->herramientas;          
        $regplanilla->linterna_gato          = $request->linterna_gato;         
        $regplanilla->cruceta_llave_pernos   = $request->cruceta_llave_pernos; 
        $regplanilla->extintor               = $request->extintor;              
        $regplanilla->salida_emergencia      = $request->salida_emergencia;    
        $regplanilla->botiquin               = $request->botiquin;              
        $regplanilla->cinturones             = $request->cinturones;            
        $regplanilla->velocimetro            = $request->velocimetro;           
        $regplanilla->aseo_general           = $request->aseo_general;          
        $regplanilla->conductor_uniformado   = $request->conductor_uniformado;  
        $regplanilla->conductor_carnet       = $request->conductor_carnet;      
        $regplanilla->usr_crea               = $request->usr_crea;             
        $regplanilla->observaciones          = $request->observaciones;        
   
        $regplanilla->save();

        return redirect()->route('planillas.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Planilla $planilla)
    {
        //
        $Numerosinternos = Numerosinternos::pluck('num_interno', 'num_interno');
        return view('planillas.editar', compact('planilla', 'Numerosinternos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planilla $planilla)
    {
        //
        $id = $request->id; 
        $registro = Planilla::find($id);
        
       
        date_default_timezone_set('America/Bogota');
        $time = time();
        $horaSupervision = date("H:i:s", $time);

        $estado_vehiculo = $request->estado_vehiculo; // desaprobado= 0 Aprobado = 1
        
        if (isset($estado_vehiculo )) {

            $num_interno = $request->num_interno;
            
            $vehiculo = Vehiculos::where('num_interno', $num_interno)->get();
            
            
            foreach ($vehiculo as $key => $value) {
                $id_vehiculo = $value['id'];
            }
            
            $registro = Vehiculos::find($id_vehiculo);
            
           
            $registro->estado = $estado_vehiculo;
            $registro->save();
            
        }

        $planilla->usr_supervisa       =  $request->usr_supervisa; 
        $planilla->fecha_supervision   =  $request->fecha_supervision.' '.$horaSupervision;
        $planilla->presion             =  $request->presion;
        $planilla->labrado             =  $request->labrado; 
        $planilla->tuercas             =  $request->tuercas;
        $planilla->rines               =  $request->rines;
        $planilla->repuesto            =  $request->repuesto;
        $planilla->freno_parqueo       =  $request->freno_parqueo;
        $planilla->sistema_frenos      =  $request->sistema_frenos;
        $planilla->liquido_frenos      =  $request->liquido_frenos; 
        $planilla->luz_reversa         =  $request->luz_reversa; 
        $planilla->luces_bajas         =  $request->luces_bajas; 
        $planilla->luces_altas         =  $request->luces_altas; 
        $planilla->cucuyos             =  $request->cucuyos; 
        $planilla->luces_freno         =  $request->luces_freno; 
        $planilla->nivel_conbustible   =  $request->nivel_conbustible; 
        $planilla->presion_aceite      =  $request->presion_aceite; 
        $planilla->nivel_bateria       =  $request->nivel_bateria; 
        $planilla->nivel_temperatura   =  $request->nivel_temperatura; 
        $planilla->retrovisores        =  $request->retrovisores; 
        $planilla->puertas             =  $request->puertas; 
        $planilla->nivel_aceite        =  $request->nivel_aceite;
        
        $planilla->fugas_motor         = $request->fugas_motor;
        $planilla->ajuste_bornes       = $request->ajuste_bornes;
        $planilla->transmision         = $request->transmision;
        $planilla->filtros_hys         = $request->filtros_hys;
        
        $planilla->nivel_direccion     =  $request->nivel_direccion; 
        $planilla->nivel_refrigerante  =  $request->nivel_refrigerante; 
        $planilla->nivel_limpiabrisas  =  $request->nivel_limpiabrisas; 
        $planilla->pito                =  $request->pito; 
        $planilla->limpiabrisas        =  $request->limpiabrisas; 
        $planilla->tapa_radiador       =  $request->tapa_radiador; 
        $planilla->correa_ventilador   =  $request->correa_ventilador; 
        $planilla->bateria             =  $request->bateria; 
        $planilla->conos_triangulos_tacos  =  $request->conos_triangulos_tacos; 
        $planilla->herramientas            =  $request->herramientas; 
        $planilla->linterna_gato           =  $request->linterna_gato; 
        $planilla->cruceta_llave_pernos    =  $request->cruceta_llave_pernos; 
        $planilla->extintor                =  $request->extintor;
        $planilla->salida_emergencia       =  $request->salida_emergencia; 
        $planilla->botiquin                =  $request->botiquin; 
        $planilla->cinturones              =  $request->cinturones; 
        $planilla->velocimetro             =  $request->velocimetro; 
        $planilla->aseo_general            =  $request->aseo_general; 
        $planilla->conductor_uniformado    =  $request->conductor_uniformado; 
        $planilla->conductor_carnet        =  $request->conductor_carnet;
        $planilla->estado_vehiculo         =  $request->estado_vehiculo; 
        $planilla->obs_supervisor          =  $request->observaciones;
        $planilla->usr_crea                =  $request->usr_crea; 
        $planilla->numero_interno          = $request->num_interno;
        $planilla->estado_planilla         =  1;

        $planilla->save();

         return redirect()->route('planillas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
