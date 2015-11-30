@extends('pdf.partials.master')
@section('titulo')
    <title>Factura Numero</title>
@endsection
@section('icono')
    <link rel="shortcut icon" href="img/favicon.ico">
@endsection

@section('content')

    <div class="logo">
        <div class="pull-left">
            <img src="img/logo2.jpg" alt="Logo Institucional" class="imagen">
        </div>
        <div class="poner">
            <div class="poner"><p>Fecha {!! $factura->fecha !!}</p></div>
        </div>

    </div>
    <div class="titulo">Factura de Compras {!! $factura->numero_factura !!}</div>
    <table>
        <tr>
            <th>
                <table border="1">
                    <tr class="color-letra-factura">
                        <th width="10%" class="color-factura" scope="col"><div align="left">Proveedor:</div></th>
                        <th scope="col" class="color-factura"><div align="left">{!! $factura->proveedor->nombre !!}</div></th>
                        <th scope="col" class="color-factura">
                            Factura:
                        </th>
                        <th scope="col" class="color-factura">
                            {!! $factura->numero_factura !!}
                        </th>
                    </tr>
                    <tr class="color-letra-factura">
                        <th width="10%" class="color-factura" scope="col"><div align="left">Fecha:</div></th>
                        <th scope="col" class="color-factura"><div align="left">{!! $factura->fecha!!}</div></th>
                        <th scope="col" class="color-factura">
                            Forma de Pago:
                        </th>
                        <th scope="col" class="color-factura">
                            {!! $factura->forma_pago !!}
                        </th>
                    </tr>
                </table>
            </th>
        </tr>
    </table>

@endsection