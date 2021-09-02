<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\User;

class UsuariosController extends Controller
{

    protected  $items_per_page = 8; //global con la cantidad de itemns por pagina para paginador
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::orderBy('nombre')
                            ->paginate($this->items_per_page);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dt = new Carbon\Carbon();
        $before = $dt->subYears(18)->format('Y-m-d');


        $request->validate([
            'identificador' => 'required | numeric' ,
            'nombre' => 'required | max:100' ,
            'celular' => 'size:10',
            'fecha_nacimiento' => 'required | date | before:'.$before,
            'rol' => 'required',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
        ]);
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
    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $usuario, Request $request)
    {
        $dt = new Carbon();
        $before = $dt->subYears(18)->format('Y-m-d'); // 


        $request->validate([
            'identificador' => 'required | numeric' ,
            'nombre' => 'required | max:100' ,
            'celular' => 'size:10',
            'fecha_nacimiento' => 'required | date | before:'.$before,
            'rol' => 'required',
        ]);


        $usuario->update([
            'identificador' => $request->identificador ,
            'nombre' => $request->nombre ,
            'celular' => $request->celular ,
            'fecha_nacimiento' => $request->fecha_nacimiento ,
            'rol' => $request->rol ,
           
        ]);

        return back();
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
