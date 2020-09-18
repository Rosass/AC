<?php

namespace App\Http\Controllers;

use App\Periodo;
use App\Actividad;
use App\Inscripcion;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $busquedas =$request->get('buscar');

        $inscripciones =  Inscripcion::orwhere('num_control','like','%'. $busquedas . '%')
        ->orwhere('id_actividad_fk','like','%'. $busquedas . '%')
        ->orderBy('id_inscripcion_pk','asc')->paginate(5);
        $inscripciones->appends(['buscar' =>$busquedas]);

        return view('inscripcion.index', compact('inscripciones','busquedas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periodos = Periodo::all();
        $actividades = Actividad::all();


        return view('inscripcion.create',['periodos'=> $periodos,'actividades' => $actividades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_inscripcion'=>'required|min:1',
            'num_control'=>'',
            'fecha_inscripcion'=>'required',
            'id_periodo'=>'required',
            'id_actividad' => 'required',
        ]);

          Inscripcion::create ([

            'id_inscripcion_pk'=>$data ['id_inscripcion'],
            'num_control'=>$data ['num_control'],
            'fecha_inscripcion'=>$data ['fecha_inscripcion'],
            'id_periodo_fk'=>$data ['id_periodo'],
            'id_actividad_fk'=>$data ['id_actividad'],


        ]);
        return redirect()->action('InscripcionController@index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscripcion $inscripcion)
    {
        $actividades = Actividad::all(['id_actividad_pk', 'nombre_actividad']);
        $periodos = Periodo::all(['id_periodo_pk', 'nombre_periodo']);


        return view('inscripcion.edit' , compact('actividades','periodos','inscripcion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscripcion $inscripcion)
    {
        //
        $data=$request->validate([
            'id_inscripcion'=>'required',
            'num_control'=>'',
            'fecha_inscripcion'=>'required',
            'id_periodo' => 'required',
            'id_actividad'=> 'required',
        ]);
        $inscripcion->id_inscripcion_pk=$data['id_inscripcion'];
        $inscripcion->num_control=$data['num_control'];
        $inscripcion->fecha_inscripcion=$data['fecha_inscripcion'];
        $inscripcion->id_periodo_fk=$data['id_periodo'];
        $$inscripcio->id_actividad_fk=$data['id_actividad'];



        $inscripcion->save();

        return redirect()->action('InscripcionController@index');
    }
}
