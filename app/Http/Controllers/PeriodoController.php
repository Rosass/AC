<?php

namespace App\Http\Controllers;
use App\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
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

        $periodos =  Periodo::orwhere('nombre_periodo','like','%'. $busquedas . '%')
        ->orwhere('id_periodo_pk','like','%'. $busquedas . '%')
        ->orderBy('id_periodo_pk','asc')->paginate(5);
        $periodos->appends(['buscar' =>$busquedas]);

        return view('periodo.index', compact('periodos','busquedas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodo.create');
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
            'id_periodo'=>'required',
            'nombre'=>'required',
            'fecha_inicio'=>'required',
            'fecha_final'=>'required',
        ]);
          Periodo::create ([

            'id_periodo_pk'=>$data ['id_periodo'],
            'nombre_periodo'=>$data ['nombre'],
            'fecha_inicio'=>$data ['fecha_inicio'],
            'fecha_final'=>$data ['fecha_final'],

        ]);
        return redirect()->action('PeriodoController@index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodo $periodo)
    {
        return view('periodo.edit' , compact('periodo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periodo $periodo)
    {
        $data=$request->validate([
            'nombre'=>'required',
            'fecha_inicio'=>'required',
            'fecha_final'=>'required',
        ]);

        $periodo->nombre_periodo=$data['nombre'];
        $periodo->fecha_inicio=$data['fecha_inicio'];
        $periodo->fecha_final=$data['fecha_final'];

        $periodo->save();

        return redirect()->action('PeriodoController@index');
    }

}
