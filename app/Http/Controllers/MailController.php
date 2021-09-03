<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Mail;

class MailController extends Controller
{
    protected  $items_per_page = 8; //global con la cantidad de itemns por pagina para paginador

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->rol == 'Administrador')
        {
            $mail = Mail::paginate($this->items_per_page);
        }

        if(Auth::user()->rol == 'Usuario')
        {
            $mail = Mail::where('user_id', Auth::user()->id)->paginate($this->items_per_page);
        }

        return view('mails.index', compact('mail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'asunto' => 'required' ,
            'destinatario' => 'required | email'  ,
            'cuerpo' => 'required',
        ]);

        Mail::create([
            'user_id' => Auth::user()->id ,
            'estado' => 'No Enviado' ,
            'asunto' => $request->asunto ,
            'destino' => $request-> destinatario  ,
            'cuerpo' => $request->cuerpo ,
        ]);

        return redirect()->route('mail.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
