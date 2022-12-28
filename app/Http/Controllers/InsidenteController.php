<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vehiculos;
use App\Models\Insidente;
use App\Models\Ciudades;

class InsidenteController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-insidente|crear-insidente|editar-insidente|borrar-insidente')->only('index');
         $this->middleware('permission:ver-insidente', ['only' => ['show']]);
         $this->middleware('permission:crear-insidente', ['only' => ['create','store']]);
         $this->middleware('permission:editar-insidente', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-insidente', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $insidentes = Insidente::orderBy('id', 'DESC')->limit(50)->get();

        return view('insidentes.index',compact('insidentes'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $ciudades = Ciudades::pluck('municipio', 'municipio');
        $vehiculos = Vehiculos::pluck('placa', 'placa');
        $numerosInternos = Vehiculos::pluck('num_interno', 'num_interno');

        return view('insidentes.crear', compact('vehiculos', 'numerosInternos') );
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validamos la entrada de los campos del formulario de creacion de nuevo vehiculo
        request()->validate(
            [   'placa' => 'required',
                'fecha' => 'required',
                'tipo' => 'required',
                'descripcion' => 'required'
            ]
            
        );
    
        Insidente::create($request->all());
    
        return redirect()->route('insidentes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Insidente $insidente)
    {
        //
        return view('insidentes.ver', compact('insidente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Insidente $insidente)
    {
        //
        // return view('insidentes.update', compact('insidente') );
        return view('insidentes.editar', compact('insidente') );
    }

    public function duracion(Insidente $insidente)
    {

        return view('insidentes.update', compact('insidente') );
        
    }

    public function getPlaca(Request $request){

        dd('holi'); die();
            
            // $num_interno = $request->num_interno;    

            // if ($request->ajax()) {
            //     $vehiculos = Insidente::All();
            //     foreach($vehiculos as $vehiculo) {
            //         $placasArray[$vehiculo->num_interno] = $vehiculo->placa;
            //     } 
            //     return response()->json($placasArray);
                
            // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insidente $insidente)
    {
        //
        //  request()->validate([
        //     'tipo' => 'required',
        //     'descripcion' => 'required',
        //     'fecha' => 'required'
        // ]);
    
        $insidente->update($request->all());
    
        return redirect()->route('insidentes.index');
    }

    public function actualizar(Request $request, Insidente $insidente)
    {
       
        // request()->validate([
        //     'solucion' => 'required',
        //     'duracion' => 'required'
        // ]);
        // dd('entre en actualizar');
    
        $insidente->update($request->all());
    
        return redirect()->route('insidentes.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insidente $insidente)
    {
        $insidente->delete();
        return redirect()->route('incidentes.index')->with('eliminar', 'ok');
    }

    public function updateEstado($insidente, $estado)
    {
        $insidente = Insidente::find($insidente);

        // dd($vehiculo, $estado); die();
        if ($insidente == null) {
            return redirect()->route('insidentes.index')->with('encontrado', 'error');
        }
        $insidente->update(["estado"=>$estado]);

        return redirect()->route('insidentes.index');
    }


}
