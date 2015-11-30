@extends('layout.admin')

@section('content')

    <div class="panel panel-info">
        <div class="panel-heading text-center"><h5 class="porte"><strong>Mantenedor de Citas</strong></h5></div>
        @include('admin.partials.mensaje')
        <div class="panel-body">
            <div class="container">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                    {!! Form::open(['route' => 'admin.agendar.store', 'method' => 'POST', 'id' => 'form', 'role' => 'form', 'autocomplete' => 'off']) !!}
                        <div class="row ajuste-seleccione">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <h4 class="text-center color-subtitulo">Seleccione Especialista</h4>
                                <select name="id_especialista" id="" class="form-control">
                                    @foreach($especialista as $esp)
                                        <option value="{{ $esp->id }}" >{{ $esp->first_name.' '.$esp->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                                <h4 class="text-center color-subtitulo">Seleccione un Paciente</h4>

                                <select name="id_usuario" class="form-control">
                                    @foreach($paciente as $pac)
                                        <option value="{{ $pac->id }}">{{ $pac->first_name.' '.$pac->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                                <h4 class="text-center color-subtitulo">Valor de la Consulta</h4>
                                {!! Form::select('valor_consulta', config('opciones.valoresConsulta'),null, ['class' => 'form-control', 'id' => 'selector'] ) !!}
                            </div>
                        </div>
                        <div class="row ajuste11">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <h4 class="text-center color-subtitulo">Seleccione una Fecha</h4>

                                <div style="overflow:hidden;">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div id="datetimepicker12"></div>
                                                {!! Form::text('fecha', null, ['class' => '', 'id' => 'fechaOculta']) !!}
                                                @if($errors->all())
                                                    <div class="" role="alert">
                                                        <strong><p class="porte2 pull-right">{{ $errors->first('fecha') }}</p></strong>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" >
                                <h4 class="text-center color-subtitulo">Seleccione una Hora</h4>
                                <div id="acordion"  class="horario">
                                    @foreach($listado as $lista)

                                        <h3><span class="icon-chevron-right" style="color: green; font-size: 20px;"></span>  {{ $lista->hora_inicio }}</h3>

                                        <div>
                                            <p class="text-green"></p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <select name="hora" class="form-control">
                                    @foreach($disponibles as $disponible)
                                        <option value="{{ $disponible->id }}">{{$disponible->hora }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" onclick="funcionAgendar()" class="btn btn-info btn-block btn-lg "><span class="icon-calendar"></span></span> <strong>Agendar</strong></button>
                            </div>
                        </div>




                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@endsection