<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ciudades;
use App\Models\Persona;
use App\Models\Exam;

class ExamController extends Controller
{
     function __construct()
    {
         $this->middleware('permission:ver-exam|crear-exam|editar-exam|borrar-exam')->only('index');
         $this->middleware('permission:ver-exam', ['only' => ['show']]);
         $this->middleware('permission:crear-exam', ['only' => ['create','store']]);
         $this->middleware('permission:editar-exam', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-exam', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //Con paginación
        // SELECT e.id, p.nombres, p.apellidos, e.tipo, e.descripcion, e.fecha, e.vigencia, e.usr_crea, e.estado FROM exams e, personas p where e.id_conductor = p.id;
         // $exams = Exam::paginate(4);

         $exams = Exam::join("personas","personas.id","exams.id_conductor")
                ->select("exams.id","personas.nombres","personas.apellidos","exams.tipo","exams.descripcion","exams.fecha_ini", "exams.fecha_fin", "exams.vigencia","exams.usr_crea","exams.estado")
                ->get();

        return view('exams.index',compact('exams'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $conductores = Persona::All()->where('conductor', 'Si')->where('estado', '1');
        return view('exams.crear', compact('conductores') );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request); die();
        //validamos la entrada de los campos del formulario de creacion de nuevo vehiculo
        request()->validate(
            [   'id_conductor' => 'required | numeric ',
                'tipo' => 'required',
                'descripcion' => 'required',
                'fecha_ini' => 'required',
                'fecha_fin' => 'required',
                'vigencia' => 'required',
                'usr_crea' => 'required ',
            ]
           
        );
        // dd($request->all()); die();
        Exam::create($request->all());
    
        return redirect()->route('exams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $exams = Exam::All()->where('id_conductor', $id);

        if (sizeof($exams) == 0) {
            $personas = Persona::paginate(4);
            
            return redirect()->route('personas.index')->with('examenes', 'error');
        }

        $driver = Exam::join("personas","personas.id","exams.id_conductor")
                ->select("exams.id","personas.nombres","personas.apellidos","exams.tipo","exams.descripcion","exams.fecha_ini", "exams.fecha_fin" ,"exams.vigencia","exams.usr_crea","exams.estado")
                ->where('id_conductor', $id)
                ->get();
        $driver = $driver[0]['nombres'].' '.$driver[0]['apellidos'];
        return view('exams.examenes', compact('exams', 'driver'));
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        $id_conductor =  $exam->id_conductor;

        $driver = Exam::join("personas","personas.id","exams.id_conductor")
                ->select("exams.id","personas.nombres","personas.apellidos","exams.tipo","exams.descripcion","exams.fecha","exams.vigencia","exams.usr_crea","exams.estado")
                ->where('id_conductor', $id_conductor)
                ->get();
        $driver = $driver[0]['nombres'].' '.$driver[0]['apellidos'];

        $conductores = Persona::All()->where('conductor', 'Si')->where('estado', '1');

        return view('exams.editar', compact('exam', 'conductores', 'driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
         request()->validate([
           
            'tipo' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'vigencia' => 'required',
        ]);
    
        $exam->update($request->all());
    
        return redirect()->route('exams.index');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function updateEstado($exam, $estado)
    {
        $exam = Exam::find($exam);
        
        if ($exam == null) {
            return redirect()->route('exams.index')->with('encontrado', 'error');
        }
        $exam->update(["estado"=>$estado]);
    
        return redirect()->route('exams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return redirect()->route('exams.index')->with('eliminar', 'ok');
    }
}
?>
