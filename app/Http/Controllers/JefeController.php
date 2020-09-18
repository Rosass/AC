<?php

namespace App\Http\Controllers;

use App\Jefe;
use Illuminate\Http\Request;

class JefeController extends Controller
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

        $jefes =  Jefe::orwhere('rfc_jefe_pk','like','%'. $busquedas . '%')
        ->orwhere('nombre_jefe','like','%'. $busquedas . '%')
        ->orderBy('rfc_jefe_pk','asc')->paginate(5);
        $jefes->appends(['buscar' =>$busquedas]);

        return view('jefe.index', compact('jefes','busquedas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jefe.create');
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
            'rfc'=>'required|min:13|size:13',
            'nombre'=>'required',
            'apaterno'=>'required',
            'amaterno'=>'',
            'telefono' => ['required', 'size:10', ],['numeric'],
            'correo'=> 'required|email',
        ]);

          Jefe::create ([

            'rfc_jefe_pk'=>$data ['rfc'],
            'nombre_jefe'=>$data ['nombre'],
            'apaterno_jefe'=>$data ['apaterno'],
            'amaterno_jefe'=>$data ['amaterno'],
            'telefono_jefe'=>$data ['telefono'],
            'correo_jefe'=>$data ['correo'],
        ]);
        return redirect()->action('JefeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function show(Jefe $jefe)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function edit(Jefe $jefe)
    {
        return view('jefe.edit' , compact('jefe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jefe $jefe)
    {
        //
        $data=$request->validate([
            'rfc'=>'required|min:13|size:13',
            'nombre'=>'required',
            'apaterno'=>'required',
            'amaterno'=>'',
            'telefono' => ['required', 'size:10', ],['numeric'],
            'correo'=> 'required|email',
        ]);

        $jefe->rfc_jefe_pk=$data['rfc'];
        $jefe->nombre_jefe=$data['nombre'];
        $jefe->apaterno_jefe=$data['apaterno'];
        $jefe->amaterno_jefe=$data['amaterno'];
        $jefe->telefono_jefe=$data['telefono'];
        $jefe->correo_jefe=$data['correo'];

        $jefe->save();

        return redirect()->action('JefeController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jefe $jefe)
    {
        //
    }
}
