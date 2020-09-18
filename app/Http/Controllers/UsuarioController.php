<?php

namespace App\Http\Controllers;

use App\Area;
use App\TipoUsuario;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
   // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios =  Usuario::orderBy('usuario_pk')->paginate(5);

        return view('usuario.index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoUsuario::all();
        $areas = Area::all();

        return view('usuario.create',['tipos'=> $tipos,'areas' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =$request ->validate([
            'usuario_pk'=>['required','string', 'max:20', 'unique:usuario'],
            'password'=>['required','min:8'],
            'id_tipo'=>['required'],
            'id_area'=>['required'],

        ]);

        Usuario::create([
            'usuario_pk'=>$data['usuario_pk'],
            'password'=>Hash::make($data['password']),
            'id_tipo_fk'=>$data['id_tipo'],
            'id_area_fk'=>$data['id_area'],
        ]);

        return redirect()->action('UsuarioController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
