<?php

namespace Oral_Plus\Http\Controllers\admin;

use Illuminate\Http\Request;

use Oral_Plus\Detalle_diagnostico;
use Oral_Plus\Diagnostico;
use Oral_Plus\Http\Requests;
use Oral_Plus\Http\Controllers\Controller;
use Oral_Plus\Tratamiento;
use Oral_Plus\User;

class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $requests)
    {
        $diagnosticos = Diagnostico::name($requests->get('id_usuario'))->orderBy('created_at', 'asc')->paginate(8);

        return view('admin.diagnostico.index', compact('diagnosticos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes     = User::where('type','!=', 'Especialista')->get(['first_name', 'last_name', 'id']);
        $especialistas = User::where('type', 'Especialista')->get(['first_name', 'last_name', 'id']);
        $tratamientos  = Tratamiento::all();

        return view('admin.diagnostico.create', compact('pacientes', 'especialistas', 'tratamientos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $diagnostico = new Diagnostico($request->all());
        $detalle_diagnostico = new Detalle_diagnostico($request->all());
        dd($diagnostico, $detalle_diagnostico);
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
