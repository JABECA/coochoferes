<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Regpasajeros;
use App\Models\Numerosinternos;

class RegpasajerosController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:ver-regpasajeros|crear-regpasajeros|editar-regpasajeros|borrar-regpasajeros')->only('index');
         $this->middleware('permission:ver-regpasajeros', ['only' => ['show']]);
         $this->middleware('permission:crear-regpasajeros', ['only' => ['create','store']]);
         $this->middleware('permission:editar-regpasajeros', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-regpasajeros', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $fecini      = $request->get('fecha_ini');
            $fecfin      = $request->get('fecha_fin');
            $num_interno = $request->get('num_interno');
            $userName = \Illuminate\Support\Facades\Auth::user()->name;

            if (  
                  ( $request->has('fecha_ini') && !empty($request->get('fecha_ini')) ) &&
                  ( $request->has('fecha_fin')  && !empty($request->get('fecha_fin')) ) &&
                  ( $request->has('num_interno')  && !empty($request->get('num_interno')) )
               ) {
                   
                    $documento    = 'fecha_registro';                   
                    $fecIni       = $request->get('fecha_ini');
                    $fecFin       = $request->get('fecha_fin');
                    $num_interno  = $request->get('num_interno');
                    
                    $condicion1 = '"'.$documento.'", ["'.$fecIni.'", "'.$fecFin.'"]';
                
                    // echo $condicion1 ; die();  //whereBetween("fec_venc_SOAT", ["2022-12-26 ", "2022-12-31"])

                    $regpasajeros = Regpasajeros::whereBetween($documento, [$fecini, $fecfin] )
                                            ->where('num_interno' , $num_interno)
                                            ->get();
                    
                    return DataTables::of($regpasajeros)
                            ->addColumn('actions', 'regpasajeros.actions')
                            ->rawColumns(['actions'])
                            ->make(true);
                   
            }
            
            // $numerosInternos = Numerosinternos::All(); 
            $regpasajeros = Regpasajeros::where('estado', 1)->orderBy('id', 'desc')->get(); 
            // $regpasajeros = Regpasajeros::where('usr_crea', $userName)where('estado', 1)->->orderBy('id', 'desc')->get(); 
            // dd($regpasajeros); die();
            // $vehiculos = [];
            return DataTables::of($regpasajeros)
                    ->addColumn('actions', 'regpasajeros.actions')
                    ->rawColumns(['actions'])
                    ->make(true);
            
        }

        $Numerosinternos = Numerosinternos::pluck('num_interno', 'num_interno');
       
        return view('regpasajeros.index', compact('Numerosinternos'));
         // $vehiculos = Vehiculos::All();
         // return view('vehiculos.index',compact('vehiculos'));
         // //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    public function admrecaudo(Request $request) {

       // dd('hola entre'); die();
        if ($request->ajax()) {

            $fecini      = $request->get('fecha_ini');
            $fecfin      = $request->get('fecha_fin');
            $num_interno = $request->get('num_interno');
            $userName = \Illuminate\Support\Facades\Auth::user()->name;

            if (  
                  ( $request->has('fecha_ini') && !empty($request->get('fecha_ini')) ) &&
                  ( $request->has('fecha_fin')  && !empty($request->get('fecha_fin')) ) &&
                  ( $request->has('num_interno')  && !empty($request->get('num_interno')) )
               ) {
                   
                    $documento    = 'fecha_registro';                   
                    $fecIni       = $request->get('fecha_ini');
                    $fecFin       = $request->get('fecha_fin');
                    $num_interno  = $request->get('num_interno');
                    
                    $condicion1 = '"'.$documento.'", ["'.$fecIni.'", "'.$fecFin.'"]';
                
                    // echo $condicion1 ; die();  //whereBetween("fec_venc_SOAT", ["2022-12-26 ", "2022-12-31"])

                    $regpasajeros = Regpasajeros::whereBetween($documento, [$fecini, $fecfin] )
                                            ->where('num_interno' , $num_interno)
                                            ->get();
                    
                    return DataTables::of($regpasajeros)
                            ->addColumn('actions', 'regpasajeros.actions')
                            ->rawColumns(['actions'])
                            ->make(true);
                   
            }

            if (  
                  ( $request->has('fecha_ini') && !empty($request->get('fecha_ini')) ) &&
                  ( $request->has('fecha_fin')  && !empty($request->get('fecha_fin')) ) 
                  
               ) {
                   
                    $documento    = 'fecha_registro';                   
                    $fecIni       = $request->get('fecha_ini');
                    $fecFin       = $request->get('fecha_fin');
                  
                    
                    $condicion1 = '"'.$documento.'", ["'.$fecIni.'", "'.$fecFin.'"]';
                
                    // echo $condicion1 ; die();  //whereBetween("fec_venc_SOAT", ["2022-12-26 ", "2022-12-31"])

                    $regpasajeros = Regpasajeros::whereBetween($documento, [$fecini, $fecfin] )
                                            ->orderBy('id', 'desc')
                                            ->get();
                    
                    return DataTables::of($regpasajeros)
                            ->addColumn('actions', 'regpasajeros.actions')
                            ->rawColumns(['actions'])
                            ->make(true);
                   
            }
            
            // $numerosInternos = Numerosinternos::All(); 
            $regpasajeros = Regpasajeros::orderBy('id', 'desc')->get(); 
            // $regpasajeros = Regpasajeros::where('usr_crea', $userName)->orderBy('id', 'desc')->get(); 
            // dd($regpasajeros); die();
            // $vehiculos = [];
            return DataTables::of($regpasajeros)
                    ->addColumn('actions', 'regpasajeros.actions')
                    ->rawColumns(['actions'])
                    ->make(true);
            
        }

        $Numerosinternos = Numerosinternos::pluck('num_interno', 'num_interno');
       
        return view('regpasajeros.admrecaudo', compact('Numerosinternos'));
         // $vehiculos = Vehiculos::All();
         // return view('vehiculos.index',compact('vehiculos'));
         // //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        if ($request->ajax()) {

            $userName = \Illuminate\Support\Facades\Auth::user()->name;
            
        
            $regpasajeros = Regpasajeros::where('estado', 1)->where('usr_crea', $userName)->orderBy('id', 'desc')->get(); 

            return DataTables::of($regpasajeros)
                    ->addColumn('actions', 'regpasajeros.actions')
                    ->rawColumns(['actions'])
                    ->make(true);
            
        }

        $Numerosinternos = Numerosinternos::pluck('num_interno', 'num_interno');
       
        return view('regpasajeros.crear', compact('Numerosinternos') );
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
        $regpasajero = new Regpasajeros();
        
        //validamos la entrada de los campos del formulario de creacion de nuevo regpasajero
        request()->validate(
            [   
                'num_interno'             => 'required',
                'fecha_registro'          => 'required',
                'cant_pasajeros'          => 'required',
                'cant_pasajeros_terminal' => 'required|max:19',
                'ruta'                    => 'required',
                'nombre_conductor'        => 'required|min:3|max:50|regex:/^[A-Za-z ]+$/i',
            ],
           
        );

        if ($request->ruta == 'Virginia') {
            $tarifa = 2000;
        }else if($request->ruta == 'Cartago'){
            $tarifa = 2000;
            $tarifa2 = 5500;
        }else if($request->ruta == 'Armenia'){
            $tarifa = 7000;
        }else{
            $tarifa = 2000;
        }

        $regpasajero->num_interno              = $request->num_interno;
        $regpasajero->nombre_conductor         = $request->nombre_conductor;
        $regpasajero->cant_pasajeros           = $request->cant_pasajeros;
        $regpasajero->cant_pasajeros_terminal  = $request->cant_pasajeros_terminal;
        $regpasajero->ruta                     = $request->ruta;
        $regpasajero->fecha_registro           = $request->fecha_registro;
        $regpasajero->hora_registro            = $request->hora_registro;
        $regpasajero->valor_pasaje             = $tarifa;

        if ($request->ruta == 'Cartago') {
            $regpasajero->total_cuadre = ($request->cant_pasajeros*$tarifa)+($regpasajero->cant_pasajeros_terminal*$tarifa2);
        }else{
            $regpasajero->total_cuadre             = $request->cant_pasajeros*$tarifa;
        }
        
        $regpasajero->usr_crea                 = $request->usr_crea;
        $regpasajero->observaciones            = $request->observaciones;
   
        $regpasajero->save();

        return redirect()->route('regpasajeros.create');
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
    public function edit(Regpasajeros $regpasajero)
    {
        //
        $Numerosinternos = Numerosinternos::pluck('num_interno', 'num_interno');
        return view('regpasajeros.editar', compact('regpasajero', 'Numerosinternos'));
    }

    public function liquidar(Regpasajeros $regpasajero)
    {
        //
        // dd($regpasajero); die();

        return view('regpasajeros.liquidar', compact('regpasajero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regpasajeros $regpasajero)
    {
      
         request()->validate([
            'num_interno' => 'required',
            'cant_pasajeros_terminal' => 'required',
            'cant_pasajeros' => 'required',
        ]);

       
        $regpasajero->update($request->all());
        return redirect()->route('admrecaudos.admrecaudo');
    }

    public function updateLiquidacion(Request $request, Regpasajeros $regpasajero)
    {
        //
        $regpasajero->update($request->all());
        // dd($regpasajero); die();

        // $regpasajero->$id = $request->id;
        // $regpasajero->$num_interno = $request->num_interno; 
        // $regpasajero->$cod_recaudo = $request->cod_recaudo;
        // $regpasajero->$usr_recaudo = $request->usr_recaudo;
        // $regpasajero->$fecha_recaudo = $request->fecha_recaudo;

        // // dd($id, $num_interno, $cod_recaudo, $usr_recaudo, $fecha_recaudo); die();


        // $regpasajero->save();
        return redirect()->route('regpasajeros.index');
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
