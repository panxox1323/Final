@extends('layout.admin')

@section('content')

    <div class="container principal">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 ajuste4">

            <div class="panel panel-danger">
                <div class="panel-heading">Consultas Agendadas para Hoy</div>
                <div class="panel-body">
                    <table style="margin-top: 5px;" class="table table-striped table-bordered table-hover">
                        <tr class="info">
                            <th class="text-center">Hora</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Paciente</th>
                            <th class="text-center">Especialista</th>
                            <th class="text-center">Edad</th>
                            <th class="text-center">Tel&eacute;fono</th>
                            <th class="text-center">Acciones</th>

                        </tr>

                        @foreach($consultas as $consulta)
                            <tr data-id="{{ $consulta->id }}">
                                <td class="text-center">{{date("H:i",$hora=strtotime($consulta->hora)) }}</td>
                                <td class="text-center">{{ $consulta->fecha }}</td>
                                <td class="text-center">{{ $consulta->user->first_name }} {{ $consulta->user->last_name }}</td>
                                <td class="text-center">{{ $consulta->especialista->first_name }} {{ $consulta->especialista->last_name }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($consulta->user->fecha_nacimiento)->age}} a&ntilde;os</td>
                                <td class="text-center">{{ $consulta->user->telefono }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.consultas.index', $consulta) }}" class="btn btn-success btn-sm" title="Ver Consulta" target=""><span class="icon-next"></span></a>

                                </td>

                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div style="text-align:center;width:350px;padding:0.5em 0;">

                <iframe src="http://www.zeitverschiebung.net/clock-widget-iframe?language=es&timezone=America%2FSantiago" width="100%" height="130" frameborder="0" seamless></iframe>

            </div>
        </div>

    </div>


@endsection
