@extends('layout.admin')

@section('content')

        <div class="panel panel-info">
            <div class="panel-heading text-center"><h5 class="porte"><strong>Mantenedor de Horas Agendadas</strong></h5></div>
            @include('admin.partials.mensaje')

            <div class="panel-body">
                <div class="container">
                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <p>
                                    <a href="/admin/agendar/{{ Carbon\Carbon::now()->toDateString() }}" role="button" class="btn btn-info"><span class="icon-alarm"></span> Ingresar Cita</a>
                                </p>

                                <p class="text-primary">Hay {{ $horas->total() }} Registros</p>
                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12 col-md-offset-2 ">
                                {!! Form::model(Request::all(),['route' => 'horas-agendadas', 'method' => 'GET' , 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
                                    <div class="form-group">

                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de usuario']) !!}
                                        <strong><span class="icon-circle-with-plus"></span></strong>

                                    </div>

                                    <button type="submit" class="btn btn-info"><span class="icon-magnifier"></span></span> <strong>Buscar</strong></button>
                                {!! Form::close() !!}
                            </div>
                        </div>

                        @include('admin.citas.partials.table')
                        <div class="paginacion">
                            {!! $horas->appends(Request::only(['name', 'type']))->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!!  Form::open(['route' => ['admin.agendar.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}

        {!!  Form::close() !!}
@endsection


@section('script')

    <script>
        $(document).ready(function (){

            $('.btn-delete').click(function (e){

                e.preventDefault()

                var row  = $(this).parents('tr');
                var id   = row.data('id');
                var form = $('#form-delete');
                var url  = form.attr('action').replace(':USER_ID', id);
                var data = form.serialize();
                row.fadeOut();

                $.post(url, data, function (result)
                {
                    alert(result.message);

                }).fail(function (){
                    alert("La Hora Agendad no pude ser Eliminada");
                    row.fadeIn();
                });

            });

        });
    </script>

@endsection