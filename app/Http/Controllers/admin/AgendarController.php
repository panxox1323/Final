<?php

namespace Oral_Plus\Http\Controllers\admin;

use DB;
use Illuminate\Http\Request;

use Oral_Plus\Consulta;
use Oral_Plus\Hora;
use Oral_Plus\Horas_agendadas as HorasAgendadas;
use Oral_Plus\Http\Requests;
use Oral_Plus\Http\Controllers\Controller;
use Oral_Plus\Listado_horas;
use Oral_Plus\User;


class AgendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $listado      = Hora::orderBy('hora', 'asc')->get();
        $especialista = User::where('type', 'Especialista')->get(['first_name', 'last_name', 'id']);
        $paciente     = User::where('type', '!=', 'Especialista')->get(['first_name', 'last_name', 'id']);
        $disponibles  = Hora::orderBy('hora', 'asc')->get();

        return view('admin.citas.cita', compact('listado', 'especialista', 'paciente', 'disponibles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateCitaRequest $request)
    {
        $datos = new Consulta($request->all());
        dd($datos);
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

    /**
     * Funcion para regenerar el arreglo de las citas asignadas a un arreglo valido
     * para la funcion whereNotIn de SQLBuilder.
     *
     * @param $arreglo
     * @return array
     */
    protected function renovarArreglo($arreglo)
    {
        $newArray = [];
        foreach($arreglo as $item)
        {
            array_push($newArray, $item['id_horas']);
        }
        return $newArray;
    }

    /**
     * Funcion para obtener las horas asignadas en un dia especificado
     *
     * @param $id Identificador del especialista
     * @param $date Fecha en que se va a agendar la cita
     */
    public function obtenerHorasAsignadasPDia($id, $date)
    {
        $result = HorasAgendadas::where('id_especialista', $id)
            ->where('fecha', $date)
            ->get(['id_especialista', 'id_horas'])
            ->toArray();
        $newArray = $this->renovarArreglo($result);
        \Debugbar::info($newArray);
        $horas = $this->obtenerTodasHoras($newArray);

        return response()->json([
            'horas_disponibles' => $horas['disponibles'],
            'horas_todas' => $horas['todas']
        ]);
    }

    /**
     * Obtiene todas las horas Libres y Reservadas asi como también solo las Libres
     *
     * @param $arrayAsignadas
     * @return array
     */
    protected function obtenerTodasHoras($arrayAsignadas)
    {
        /**
         * @var $array_horas Esta contiene las horas libres/disponibles
         */
        $array_horas = Hora::whereNotIn('id', $arrayAsignadas)
            ->select(['id', 'hora', DB::raw('0 as active')]); // 0 es Libre

        /**
         * @var $array_asignadas Esta contiene solo las horas reservadas
         */
        $array_asignadas = Hora::whereIn('id', $arrayAsignadas)
            ->select(['id', 'hora', DB::raw('1 as active')]); // 1 es Reservada

        /**
         * @var $disponibles Contiene todas las horas disponibles listas para mostrarlas en la vista
         */
        $disponibles = $array_horas->get()->toArray();

        /**
         * @var $all Esta contiene las horas asignadas y no asignadas
         */
        $all = $array_horas
            ->unionAll($array_asignadas)
            ->orderBy('id', 'asc')
            ->get()
            ->toArray();

        \Debugbar::info($all);

        return array(
            'todas' => $all,
            'disponibles' => $disponibles
        );

    }

}
