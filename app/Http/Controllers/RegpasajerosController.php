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
         $this->middleware('permission:ver-regpasajero|crear-regpasajero|editar-regpasajero|borrar-regpasajero')->only('index');
         $this->middleware('permission:ver-regpasajero', ['only' => ['show']]);
         $this->middleware('permission:crear-regpasajero', ['only' => ['create','store']]);
         $this->middleware('permission:editar-regpasajero', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-regpasajero', ['only' => ['destroy']]);

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

            // if (  ( $request->has('num_interno') && !empty($request->get('num_interno') ) ) ) {
            //         $estado    = $request->get('status_id');
            //         $estado = $request->get('status_id') == '' ? $estado = 1 : $estado = $estado;
                    
            //         $regpasajeros = Regpasajeros::All()->where('estado', $estado)->where('num_interno', $num_interno);
            //         return DataTables::of($regpasajeros)
            //                 ->addColumn('actions', 'regpasajeros.actions')
            //                 ->rawColumns(['actions'])
            //                 ->make(true);
                   
            // }

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

            $regpasajeros = Regpasajeros::where('estado', 1)->orderBy('num_interno', 'asc')->get(); 
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
                'num_interno'      => 'required',
                'fecha_registro' => 'required',
                'cant_pasajeros' => 'required',
            ],
           
        );

        $regpasajero->num_interno     = $request->num_interno     ;
        $regpasajero->fecha_registro  = $request->fecha_registro  ;
        $regpasajero->cant_pasajeros  = $request->cant_pasajeros  ;
        $regpasajero->usr_crea        = $request->usr_crea        ;
        $regpasajero->total_cuadre    = $request->cant_pasajeros*2000;
   
        $regpasajero->save();

        return redirect()->route('regpasajeros.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
