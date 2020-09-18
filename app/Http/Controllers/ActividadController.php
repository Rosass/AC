<?php

namespace App\Http\Controllers;

use App\Area;
use App\Periodo;
use App\Actividad;
use App\Responsable;
use Illuminate\Http\Request;

class ActividadController extends Controller
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

        $actividades =  Actividad::orwhere('nombre_actividad','like','%'. $busquedas . '%')
        ->orwhere('numero_dictamen','like','%'. $busquedas . '%')
        ->orderBy('id_actividad_pk','asc')->paginate(5);
        $actividades->appends(['buscar' =>$busquedas]);

        return view('actividad.index', compact('actividades','busquedas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periodos = Periodo::all();
        $areas = Area::all();
        $responsables = Responsable::all();

        return view('actividad.create',['periodos'=> $periodos,'areas' => $areas,'responsables' => $responsables]);
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
            'id_actividad'=>'required|min:1',
            'nombre'=>'required',
            'numero_dictamen'=>'required',
            'creditos'=>'required',
            'capacidad_alumnos' => 'required',
            'id_area'=> 'required',
            'id_periodo'=> 'required',
            'responsable'=> '',

        ]);

          Actividad::create ([

            'id_actividad_pk'=>$data ['id_actividad'],
            'nombre_actividad'=>$data ['nombre'],
            'numero_dictamen'=>$data ['numero_dictamen'],
            'creditos'=>$data ['creditos'],
            'capacidad_alumnos'=>$data ['capacidad_alumnos'],
            'id_area_fk'=>$data ['id_area'],
            'id_periodo_fk'=>$data ['id_periodo'],
            'rfc_responsable_fk'=>$data ['responsable'],

        ]);
        return redirect()->action('ActividadController@index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function edit(Actividad $actividad)
    {
        $areas = Area::all(['id_area_pk', 'nombre_area']);
        $periodos = Periodo::all(['id_periodo_pk', 'nombre_periodo']);
        $responsables = Responsable::all(['rfc_responsable_pk', 'nombre_responsable']);

        return view('actividad.edit' , compact('actividad','areas','periodos','responsables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividad $actividad)
    {
        //
        $data=$request->validate([
            'nombre'=>'required',
            'numero_dictamen'=>'required',
            'creditos'=>'required',
            'capacidad_alumnos' => 'required',
            'id_area'=> 'required',
            'id_periodo'=> 'required',
            'responsable'=> '',
        ]);
        $actividad->nombre_actividad=$data['nombre'];
        $actividad->numero_dictamen=$data['numero_dictamen'];
        $actividad->creditos=$data['creditos'];
        $actividad->capacidad_alumnos=$data['capacidad_alumnos'];
        $actividad->id_area_fk=$data['id_area'];
        $actividad->id_periodo_fk=$data['id_periodo'];
        $actividad->rfc_responsable_fk=$data['responsable'];


        $actividad->save();

        return redirect()->action('ActividadController@index');
    }
}
