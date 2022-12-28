<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Persona;
use App\Models\Ciudades;



class PersonaController extends Controller
{


    function __construct()
    {
         $this->middleware('permission:ver-persona|crear-persona|editar-persona|borrar-persona')->only('index');
         $this->middleware('permission:ver-persona', ['only' => ['show']]);
         $this->middleware('permission:crear-persona', ['only' => ['create','store']]);
         $this->middleware('permission:editar-persona', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-persona', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         //Con paginación
         $personas = Persona::All();
         return view('personas.index',compact('personas'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $ciudades = Ciudades::All();
        $ciudades = Ciudades::pluck('municipio', 'municipio');
        return view('personas.crear', compact('ciudades') );
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
      
    
        Persona::create($request->all());
    
        return redirect()->route('personas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
        return view('personas.ver', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
        // dd('edit persona');die();
        $ciudades = Ciudades::pluck('municipio', 'municipio');
        return view('personas.editar', compact('persona', 'ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Persona $persona)
    {
        //
        //  request()->validate([
        //     'num_interno' => 'required',
        //     'placa' => 'required',
        // ]);
    
        $persona->update($request->all());
    
        return redirect()->route('personas.index');
    }
    public function updateEstado($persona, $estado)
    {
        $persona = Persona::find($persona);

        // dd($vehiculo, $estado); die();
        if ($persona == null) {
            return redirect()->route('personas.index')->with('encontrado', 'error');
        }
        $persona->update(["estado"=>$estado]);
        //
        //  request()->validate([
        //     'num_interno' => 'required',
        //     'placa' => 'required',
        // ]);
    
        // $vehiculo->update($request->all());
    
        return redirect()->route('personas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
        return redirect()->route('personas.index')->with('eliminar', 'ok');
    }
}
