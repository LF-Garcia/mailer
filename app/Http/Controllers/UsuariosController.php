<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsuariosController extends Controller
{

    protected  $items_per_page = 8; //global con la cantidad de itemns por pagina para paginador
    
    // public function __construct()
    // {
    //     $this->middleware(['auth','rol:Administrador']); // cree un middleware para asegurarme de que solo puede ser accedido por rol Administrador
    // }
    
    
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

    public function search(Request $request)
    {
        $usuarios = User::where('nombre', 'ILIKE', '%'.$request->search.'%')
                        ->orWhere('cedula', 'ILIKE', '%'.$request->search.'%')
                        ->orWhere('email', 'ILIKE', '%'.$request->search.'%')
                        ->orWhere('celular', 'ILIKE', '%'.$request->search.'%')
                        ->orderBy('nombre')
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
       return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dt = new Carbon();
        $before = $dt->subYears(18)->format('Y-m-d'); // se obtiene la maxima fecha donde el usuario tendra 18 anos


        $request->validate([
            'identificador' => 'required | numeric' ,
            'nombre' => 'required | max:100' ,
            'celular' => 'size:10',
            'cedula' => 'required | size:10',
            'fecha_nacimiento' => 'required | date | before:'.$before,
            'rol' => 'required',
            'password' => 'required | confirmed',
        ]);

        User::create([
            'ciudad_id'=> 1,
            'cedula' => $request->cedula,
            'email' => $request->email,
            'identificador' => $request->identificador,
            'nombre' => $request->nombre,
            'celular' => $request->celular,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'rol' => $request->rol,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $respuesta = User::where('id', $request->id)->get();
        return response()->json($respuesta);
    }

    public function getUsers()
    {
        $respuesta = User::get();
        return response()->json($respuesta);
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
        $before = $dt->subYears(18)->format('Y-m-d'); // se obtiene la maxima fecha donde el usuario tendra 18 anos


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
    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index');
    }
}
