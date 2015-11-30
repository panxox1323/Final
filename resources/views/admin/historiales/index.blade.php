@extends('layout.admin')


@section('content')

    <div class="panel panel-info">
        <div class="panel-heading text-center"><h5 class="porte"><strong>Mantenedor de Historiales</strong></h5></div>
        @include('admin.partials.mensaje')

        <div class="panel-body">
            <div class="container">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <p>
                            <a href="{{ route('admin.historial.create') }}" role="button" class="btn btn-info"><span class="icon-add-user"></span> Crear Usuario</a>
                        </p>

                        <p class="text-primary">Hay {{ $historial->total() }} Registros</p>
                    </div>

                    <div class="col-md-7 col-sm-12 col-xs-12 col-md-offset-2 ">
                        {!! Form::model(Request::all(),['route' => 'admin.historial.index', 'method' => 'GET' , 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
                        <div class="form-group">

                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de usuario']) !!}
                            <strong><span class="icon-circle-with-plus"></span></strong>
                            {!! Form::select('type', config('opciones.types'), null, ['class' => 'form-control']) !!}
                        </div>

                        <button type="submit" class="btn btn-info"><span class="icon-magnifier"></span></span> <strong>Buscar</strong></button>
                        {!! Form::close() !!}
                    </div>

                    @include('admin.users.partials.table')
                    <div class="paginacion">
                        {!! $historial->appends(Request::only(['name', 'type']))->render() !!}
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection

