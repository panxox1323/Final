@extends('secretaria.layout')

@section('content')
    <div class="container navbaar">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center"><h4><strong>Mantenedor de Proveedores</strong></h4></div>

                    @if(Session::has('message'))

                        <p class="alert alert-danger">{{ Session::get('message') }}</p>

                    @endif

                    <div class="panel-body">
                        <div class="col-md-3">
                            <p>
                                <a href="{{ route('secretaria.proveedor.create') }}" role="button" class="btn btn-info"><span class="icon-add-user"></span> Crear Proveedor</a>
                            </p>

                        </div>
                        <div class="col-md-7 col-md-offset-2">
                            {!! Form::model(Request::all(),['route' => 'secretaria.proveedor.index', 'method' => 'GET' , 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
                            <div class="form-group">

                                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de proveedor']) !!}
                                {!! Form::select('giro', config('options.tipoGiroProveedor'), null, ['class' => 'form-control']) !!}
                            </div>

                            <button type="submit" class="btn btn-info"><span class="icon-magnifier"></span></span> <strong>Buscar</strong></button>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-4 pull-left">
                            <p class="text-primary">Hay {{ $proveedores->total() }} Registros</p>
                        </div>

                        @include('secretaria.proveedores.partials.table')
                        {!! $proveedores->appends(Request::only(['name', 'type']))->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => ['secretaria.proveedor.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}



    {!! Form::close() !!}
@endsection



@section('scripts')
    <script>
        $(document).ready(function(){
            $('.btn-delete').click(function(e){

                e.preventDefault();
                var row  = $(this).parents('tr');
                var id   = row.data('id');
                var form = $('#form-delete');
                var url  = form.attr('action').replace(':USER_ID', id);
                var data = form.serialize();

                $.post(url, data, function(result){
                    alert(result.message);
                    row.fadeOut();
                }).fail(function (){
                    alert('El usuario no pudo ser borrado')
                });
            });
        });
    </script>
@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      