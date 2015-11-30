<?php

namespace Oral_Plus\Http\Controllers\admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Oral_Plus\detalle_Compra;
use Oral_Plus\Factura;
use Oral_Plus\Http\Requests;
use Oral_Plus\Http\Controllers\Controller;
use Oral_Plus\Http\Requests\CreateFacturaRequest;
use Oral_Plus\Insumo;

class FacturarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $detalleFactura;

    function __construct()
    {
        $this->detalleFactura = array();
    }

    public function agregarDetalle($id_insumo, $cantidad, $precio)
    {
        $this->detalleFactura[] = array(
            'id_insumo'   => $id_insumo,
            'cantidad'    => $cantidad,
            'precio'      => $precio,
        );
    }


    public function index(Request $request)
    {

        $facturas = Factura::name($request->get('name'))->nombre($request->get('proveedor'))->OrderBy('created_at', 'Desc')->paginate(8);

        return view('admin.factura.index')->with('facturas', $facturas);

    }


    public function create()
    {
        $data =   DB::table('proveedors')->orderBy('nombre', 'asc')->lists('nombre','id');
        $insumo = DB::table('insumos')->orderBy('nombre', 'asc')->lists('nombre', 'id');

        return view('admin.factura.create', compact('data', 'insumo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateFacturaRequest $request, Requests\CreateDetalle_FacturaRequest $request2)
    {
        $fac = new Factura($request->all());

        $this->cantidad = count($this->detalleFactura);
        //dd($insumos->attributesToArray());



        if($fac->numero_factura > 0)
        {
            $factura = Factura::create($request->all());






            $message = 'La factura '.$factura->numero_factura. ' fue ingresada en el sistema';
            Session::flash('message', $message);

            return redirect()->route('admin.factura.index');


        }

        else{

            $message = 'El n&uacute;mero de la f&aacute;tura debe ser mayor a 0';
            Session::flash('message', $message);
            return redirect()->route('admin.factura.index');

                    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return "123";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
