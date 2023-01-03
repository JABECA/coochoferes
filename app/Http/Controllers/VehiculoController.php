<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vehiculos;
use App\Models\Ciudades;
use App\Models\Persona;
use App\Models\Insidente;
use Yajra\DataTables\DataTables;

class VehiculoController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:ver-vehiculo|crear-vehiculo|editar-vehiculo|borrar-vehiculo')->only('index');
         $this->middleware('permission:ver-vehiculo', ['only' => ['show']]);
         $this->middleware('permission:crear-vehiculo', ['only' => ['create','store']]);
         $this->middleware('permission:editar-vehiculo', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-vehiculo', ['only' => ['destroy']]);

    }

    public function byInsidencias($num_interno){
        return Vehiculos::where('num_interno', $num_interno)->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $fecini      = $request->get('start_date');
            $fecfin      = $request->get('end_date');
            $documento   = $request->get('documento');
            $num_interno = $request->get('num_interno');

            // if (  ( $request->has('status_id') && !empty($request->get('status_id') ) ) ) {
            //         $estado    = $request->get('status_id');
            //         $estado = $request->get('status_id') == 2 ? $estado = 0 : $estado = $estado;
            //         $vehiculos = Vehiculos::All()->where('estado', $estado);
            //         return DataTables::of($vehiculos)
            //                 ->addColumn('actions', 'vehiculos.actions')
            //                 ->rawColumns(['actions'])
            //                 ->make(true);
                   
            // }

            if (  ( $request->has('num_interno') && !empty($request->get('num_interno') ) ) ) {
                    $estado    = $request->get('status_id');
                    $estado = $request->get('status_id') == '' ? $estado = 1 : $estado = $estado;
                    
                    $vehiculos = Vehiculos::All()->where('estado', $estado)->where('num_interno', $num_interno);
                    return DataTables::of($vehiculos)
                            ->addColumn('actions', 'vehiculos.actions')
                            ->rawColumns(['actions'])
                            ->make(true);
                   
            }

            if (  ( $request->has('documento')  && !empty($request->get('documento')) ) &&
                  ( $request->has('start_date') && !empty($request->get('start_date')) ) &&
                  ( $request->has('documento')  && !empty($request->get('end_date')) )
               ) {
                    $documento    = $request->get('documento');
                    $fecIni       = $request->get('start_date');
                    $fecFin       = $request->get('end_date');
                    
                   
                        $condicion1 = '"'.$documento.'", ["'.$fecIni.'", "'.$fecFin.'"]';
                
                     // echo $condicion1 ; die();  //whereBetween("fec_venc_SOAT", ["2022-12-26 ", "2022-12-31"])

                    $vehiculos = Vehiculos::whereBetween($documento, [$fecini, $fecfin])
                                            // ->orderBy($documento ,'ASC')
                                            ->get();
                    
                    return DataTables::of($vehiculos)
                            ->addColumn('actions', 'vehiculos.actions')
                            ->rawColumns(['actions'])
                            ->make(true);
                   
            }
             
            $vehiculos = Vehiculos::where('estado', 1)->orderBy('num_interno', 'asc')->get();    
            // $vehiculos = [];
            return DataTables::of($vehiculos)
                    ->addColumn('actions', 'vehiculos.actions')
                    ->rawColumns(['actions'])
                    ->make(true);
            
        }

        return view('vehiculos.index');
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
        // $ciudades = Ciudades::All();
       
        $ciudades = Ciudades::pluck('municipio', 'municipio');
        $propietarios = Persona::All()->where('propietario', 'Si')->where('estado', '1');
        // $conductores = Persona::where('conductor', 'Si')->pluck('nombres', 'id');
        $conductores = Persona::All()->where('conductor', 'Si')->where('estado', '1');
        return view('vehiculos.crear', compact('ciudades', 'propietarios', 'conductores') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehiculo = new Vehiculos();
        
        //validamos la entrada de los campos del formulario de creacion de nuevo vehiculo
        request()->validate(
            [   
                'num_interno'      => 'required',
                // 'num_interno'      => 'required | numeric | unique:vehiculos',
                'placa'            => 'required | unique:vehiculos',
                'chasis'           => 'required',
                'carroceria'       => 'required',
                'modelo'           => 'required',
                'marca'            => 'required',
                'cant_pasajeros'   => 'required',
                'motor'            => 'required',
                'tipo_combustible' => 'required',
                'num_SOAT'         => 'required',
                'fec_venc_SOAT'    => 'required',
                'num_RTM'          => 'required',
                'fec_venc_RTM'     => 'required',
                'num_TOP'          => 'required',
                'fec_venc_TOP'     => 'required',
                'ciudad_TOP'       => 'required',
                'id_propietario'   => 'required',
                'id_conductor'     => 'required',
                'observaciones'    => 'required',
                'usr_crea'         => 'required ',
                'img_frontal'      => 'mimes:jpeg,bmp,png'
            ],
            [
                'placa.unique'     => 'Ya existe un vehiculo con la placa ingresada'
            ]
        );

        $vehiculo->num_interno     = $request->num_interno     ;
        $vehiculo->placa           = $request->placa           ;
        $vehiculo->chasis          = $request->chasis          ;
        $vehiculo->carroceria      = $request->carroceria      ;
        $vehiculo->modelo          = $request->modelo          ;
        $vehiculo->marca           = $request->marca           ;
        $vehiculo->cant_pasajeros  = $request->cant_pasajeros  ;
        $vehiculo->motor           = $request->motor           ;
        $vehiculo->tipo_combustible= $request->tipo_combustible;
        $vehiculo->num_SOAT        = $request->num_SOAT        ;
        $vehiculo->fec_venc_SOAT   = $request->fec_venc_SOAT   ;
        $vehiculo->num_RTM         = $request->num_RTM         ;
        $vehiculo->fec_venc_RTM    = $request->fec_venc_RTM    ;
        $vehiculo->num_TOP         = $request->num_TOP         ;
        $vehiculo->fec_venc_TOP    = $request->fec_venc_TOP    ;
        $vehiculo->ciudad_TOP      = $request->ciudad_TOP      ;
        $vehiculo->id_propietario  = $request->id_propietario  ;
        $vehiculo->id_conductor    = $request->id_conductor    ;
        $vehiculo->observaciones   = $request->observaciones   ;
        $vehiculo->usr_crea        = $request->usr_crea        ;
        // $vehiculo->img_frontal     = $request->img_frontal     ;

        // para subir la imagen frontal del vehiculo
        if ($request->has('img_frontal')) {

           $directorio = public_path().'/img/vehiculos/'.$request->placa;
           
           if (file_exists($directorio)) {
                
           }else{
               mkdir($directorio, 0755);
           }

           $file = $request->img_frontal;
           $placa = $request->placa;
           $file->move(public_path() . '/img/vehiculos/'.$request->placa, $placa.'_frontal.png');
           // $file->move(resources_path() . '/views/vehiculos/imagenes/'.$request->placa, $placa.'_frontal.png');
           $vehiculo->img_frontal = $placa.'_frontal.png';
           // $vehiculo->img_frontal = 'imagenes/'.$placa.'/'.$placa.'_frontal.png';
        }

        if ($request->has('img_posterior')) {

           $directorio = public_path().'/img/vehiculos/'.$request->placa;
           
           if (file_exists($directorio)) {
                
           }else{
               mkdir($directorio, 0755); 
           }

           //0755 permisos de lectura y escritura 
           $file = $request->img_posterior;
           $placa = $request->placa;
           $file->move(public_path() . '/img/vehiculos/'.$request->placa, $placa.'_posterior.png');
           $vehiculo->img_posterior = $placa.'img_posterior.png';
        }

        if ($request->has('img_laterald')) {

           $directorio = public_path().'/img/vehiculos/'.$request->placa;
           
           if (file_exists($directorio)) {
                
           }else{
               mkdir($directorio, 0755); 
           }

           //0755 permisos de lectura y escritura 
           $file = $request->img_laterald;
           $placa = $request->placa;
           $file->move(public_path() . '/img/vehiculos/'.$request->placa, $placa.'_laterald.png');
           $vehiculo->img_laterald = $placa.'img_laterald.png';
        }

           if ($request->has('img_laterali')) {

           $directorio = public_path().'/img/vehiculos/'.$request->placa;
           
           if (file_exists($directorio)) {
                
           }else{
               mkdir($directorio, 0755); 
           }

           //0755 permisos de lectura y escritura 
           $file = $request->img_laterali;
           $placa = $request->placa;
           $file->move(public_path() . '/img/vehiculos/'.$request->placa, $placa.'_laterali.png');
           $vehiculo->img_laterali = $placa.'img_laterali.png';
        }

        // dd($request->num_interno); die();
        $existeVehiculo = Vehiculos::where('num_interno', $request->num_interno)->where('estado', 1)->get();

         // dd($existeVehiculo); die();
        if (sizeof($existeVehiculo) > 0) {
            $num_interno_old = $existeVehiculo[0]->num_interno;
            $placa_old = $existeVehiculo[0]->placa;
            $id = $existeVehiculo[0]->id;
            // dd($num_interno, $placa); die();
            $vehiculo_old = Vehiculos::find($id);
            $vehiculo_old->estado = 0;
            $vehiculo_old->save();
        }
       
        $vehiculo->save();

        //a la creacion del vehiculo se le crea una novedad
        date_default_timezone_set('America/Bogota');
        $today = date("Y-m-d");
        $insidente = new Insidente();

        $insidente->num_interno     = $request->num_interno     ;
        $insidente->placa           = $request->placa           ;
        $insidente->tipo            = 'Creacion nuevo y/o Cambio placa';
        $insidente->descripcion     = 'Creacion de vehiculo o cambio de placa al numero interno';
        $insidente->fecha           = $today;
        $insidente->duracion        = '1';
        $insidente->solucion        = 'Se realiza el nuevo registro del vehiuculo y se asigna al numero interno'.$request->num_interno;
        $insidente->estado          = '1';
        $insidente->usr_crea        = $request->usr_crea;

        $insidente->save();
    
        return redirect()->route('vehiculos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculos $vehiculo)
    {
        //
        $id_propietario = $vehiculo->id_propietario;
        $id_conductor   = $vehiculo->id_conductor;
        $num_interno    = $vehiculo->num_interno;
        
        $insidentes = Insidente::All()->where('num_interno', $num_interno); 

        // dd($insidentes); die();

        $propietario = Persona::find($id_propietario);
        $propietario = $propietario->nombres.' '.$propietario->apellidos;

        $conductor = Persona::find($id_conductor);
        $conductor = $conductor->nombres.' '.$conductor->apellidos;
       
        return view('vehiculos.ver', compact('vehiculo', 'propietario', 'conductor', 'insidentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculos $vehiculo)
    {
        $id_propietario = $vehiculo->id_propietario;
        $id_conductor = $vehiculo->id_conductor;
        $propietarios = Persona::All()->where('propietario', 'Si')->where('estado', '1');
        $propietario = Persona::find($id_propietario);
        $conductores = Persona::All()->where('conductor', 'Si')->where('estado', '1');
        $conductor = Persona::find($id_conductor);
        $ciudades = Ciudades::pluck('municipio', 'municipio');
        return view('vehiculos.editar', compact('vehiculo', 'ciudades', 'propietario', 'propietarios', 'conductor', 'conductores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculos $vehiculo)
    {
        //
        // $vehiculo = new Vehiculos();
        $id = $request->id; 
        $app = Vehiculos::find($id);

        request()->validate([
            'num_interno' => 'required',
            'placa' => 'required',
        ]);

        $num_interno = $request->num_interno;
        $propietario = $request->id_propietario;
        $conductor   = $request->id_conductor;
        $placa       = $request->placa;       

        $existe = Vehiculos::where('id_propietario', $propietario)->where('num_interno', $num_interno)->get();
        $conductorCambio = Vehiculos::where('id_conductor', $conductor)->where('num_interno', $num_interno)->get();
        $placaCambio = Vehiculos::where('placa', $placa)->where('num_interno', $num_interno)->get();

        if ( sizeof($existe) > 0){
            $vehiculo->update($request->all());
        }else{
            $vehiculo->update($request->all());
            date_default_timezone_set('America/Bogota');
            $today = date("Y-m-d");

            $insidente = new Insidente();

            $insidente->num_interno     = $request->num_interno     ;
            $insidente->placa           = $request->placa           ;
            $insidente->tipo            = 'Cambio propietario';
            $insidente->descripcion     = 'Se vende el vehiculo';
            $insidente->fecha           = $today;
            $insidente->duracion        = '1';
            $insidente->solucion        = 'Se realiza registro del nuevo propietario';
            $insidente->estado          = '1';
            $insidente->usr_crea        = $request->usr_crea;

            $insidente->save();

        }

         if ( sizeof($conductorCambio) > 0){
            $vehiculo->update($request->all());
        }else{
            $vehiculo->update($request->all());
            date_default_timezone_set('America/Bogota');
            $today = date("Y-m-d");

            $insidente = new Insidente();

            $insidente->num_interno     = $request->num_interno     ;
            $insidente->placa           = $request->placa           ;
            $insidente->tipo            = 'Cambio conductor';
            $insidente->descripcion     = 'Se cambia el conductor del vehiculo';
            $insidente->fecha           = $today;
            $insidente->duracion        = '1';
            $insidente->solucion        = 'Se realiza registro del nuevo conductor para el vehiculo con numero interno '.$request->num_interno;
            $insidente->estado          = '1';
            $insidente->usr_crea        = $request->usr_crea;

            $insidente->save();

        }  

        if ( sizeof($placaCambio) > 0){
            $vehiculo->update($request->all());
        }else{
            $vehiculo->update($request->all());
            
            date_default_timezone_set('America/Bogota');
            $today = date("Y-m-d");

            $insidente = new Insidente();

            $insidente->num_interno     = $request->num_interno     ;
            $insidente->placa           = $request->placa           ;
            $insidente->tipo            = 'Cambio De placa ';
            $insidente->descripcion     = 'Se da de baja el vehiculo';
            $insidente->fecha           = $today;
            $insidente->duracion        = '1';
            $insidente->solucion        = 'Se realiza registro de la nueva placa al vehiuculo '.$num_interno;
            $insidente->estado          = '1';
            $insidente->usr_crea        = $request->usr_crea;

            $insidente->save();

        } 


        $vehiculo->num_interno     = $request->num_interno     ;
        $vehiculo->placa           = $request->placa           ;
        $vehiculo->chasis          = $request->chasis          ;
        $vehiculo->carroceria      = $request->carroceria      ;
        $vehiculo->modelo          = $request->modelo          ;
        $vehiculo->marca           = $request->marca           ;
        $vehiculo->cant_pasajeros  = $request->cant_pasajeros  ;
        $vehiculo->motor           = $request->motor           ;
        $vehiculo->tipo_combustible= $request->tipo_combustible;
        $vehiculo->num_SOAT        = $request->num_SOAT        ;
        $vehiculo->fec_venc_SOAT   = $request->fec_venc_SOAT   ;
        $vehiculo->num_RTM         = $request->num_RTM         ;
        $vehiculo->fec_venc_RTM    = $request->fec_venc_RTM    ;
        $vehiculo->num_TOP         = $request->num_TOP         ;
        $vehiculo->fec_venc_TOP    = $request->fec_venc_TOP    ;
        $vehiculo->ciudad_TOP      = $request->ciudad_TOP      ;
        $vehiculo->id_propietario  = $request->id_propietario  ;
        $vehiculo->id_conductor    = $request->id_conductor    ;
        $vehiculo->observaciones   = $request->observaciones   ;
        $vehiculo->usr_crea        = $request->usr_crea        ;
        

        if ($request->has('img_frontal')) {

           $directorio = public_path().'/img/vehiculos/'.$request->placa;
           $archivo = public_path().'/img/vehiculos/'.$request->placa.'/'.$request->placa.'_frontal.png';
           
           if (file_exists($directorio)) {
                
           }else{
               mkdir($directorio, 0755);
           }

           if (file_exists($archivo)) {
                unlink($archivo)   ;
           }

           $file = $request->img_frontal;
           $placa = $request->placa;
           $file->move(public_path() . '/img/vehiculos/'.$request->placa, $placa.'_frontal.png');
           // $file->move(resources_path() . '/views/vehiculos/imagenes/'.$request->placa, $placa.'_frontal.png');
           $vehiculo->img_frontal = $placa.'_frontal.png';
           // $vehiculo->img_frontal = 'imagenes/'.$placa.'/'.$placa.'_frontal.png';
        }

        if ($request->has('img_posterior')) {

           $directorio = public_path().'/img/vehiculos/'.$request->placa;
           $archivo = public_path().'/img/vehiculos/'.$request->placa.'/'.$request->placa.'_posterior.png';
           
           if (file_exists($directorio)) {
                
           }else{
               mkdir($directorio, 0755); 
           }
           if (file_exists($archivo)) {
                unlink($archivo)   ;
           }

           //0755 permisos de lectura y escritura 
           $file = $request->img_posterior;
           $placa = $request->placa;
           $file->move(public_path() . '/img/vehiculos/'.$request->placa, $placa.'_posterior.png');
           $vehiculo->img_posterior = $placa.'img_posterior.png';
        }

        if ($request->has('img_laterald')) {

           $directorio = public_path().'/img/vehiculos/'.$request->placa;
           $archivo = public_path().'/img/vehiculos/'.$request->placa.'/'.$request->placa.'_laterald.png';

           if (file_exists($directorio)) {
                
           }else{
               mkdir($directorio, 0755); 
           }

           if (file_exists($archivo)) {
                unlink($archivo)   ;
           }

           //0755 permisos de lectura y escritura 
           $file = $request->img_laterald;
           $placa = $request->placa;
           $file->move(public_path() . '/img/vehiculos/'.$request->placa, $placa.'_laterald.png');
           $vehiculo->img_laterald = $placa.'img_laterald.png';
        }

           if ($request->has('img_laterali')) {

           $directorio = public_path().'/img/vehiculos/'.$request->placa;
           $archivo = public_path().'/img/vehiculos/'.$request->placa.'/'.$request->placa.'_laterali.png';
           
           if (file_exists($directorio)) {
                
           }else{
               mkdir($directorio, 0755); 
           }

           if (file_exists($archivo)) {
                unlink($archivo)   ;
           }

           //0755 permisos de lectura y escritura 
           $file = $request->img_laterali;
           $placa = $request->placa;
           $file->move(public_path() . '/img/vehiculos/'.$request->placa, $placa.'_laterali.png');
           $vehiculo->img_laterali = $placa.'img_laterali.png';
        }

        $vehiculo->img_frontal = $vehiculo->img_frontal;
        $vehiculo->img_posterior = $vehiculo->img_posterior;
        $vehiculo->img_laterald = $vehiculo->img_laterald;
        $vehiculo->img_laterali = $vehiculo->img_laterali;

        $vehiculo->save();
    
        // $vehiculo->update($request->all());
    
        return redirect()->route('vehiculos.index');
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function updateEstado($vehiculo,$estado)
    {
        $vehiculo = Vehiculos::find($vehiculo);

        // dd($vehiculo, $estado); die();
        if ($vehiculo == null) {
            return redirect()->route('vehiculos.index')->with('encontrado', 'error');
        }
        $vehiculo->update(["estado"=>$estado]);
        //
        //  request()->validate([
        //     'num_interno' => 'required',
        //     'placa' => 'required',
        // ]);
    
        // $vehiculo->update($request->all());
    
        return redirect()->route('vehiculos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculos $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('eliminar', 'ok');
    }
}
