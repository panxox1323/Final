<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 form-group">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
            {!! Form::label('nombre_tratamiento', 'Nombre Tratamiento', ['class' => '']) !!}
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
            @if($errors->all('nombre_tratamiento'))
                <div class="" role="alert">
                    <strong><p class="porte2 pull-right">{{ $errors->first('nombre_tratamiento') }}</p></strong>
                </div>
            @endif
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <strong>{!! Form::text('nombre_tratamiento', null, ['class' => 'form-control'] ) !!}</strong>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 form-group">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            {!! Form::label('valor_tratamiento', 'Valor Tratamiento') !!}
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
            @if($errors->all('valor_tratamiento'))
                <div class="" role="alert">
                    <strong><p class="porte2 pull-right">{{ $errors->first('valor_tratamiento') }}</p></strong>
                </div>
            @endif
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <strong>{!! Form::text('valor_tratamiento', null, ['class' => 'form-control'] ) !!}</strong>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 form-group">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            {!! Form::label('duracion', 'Duraci&oacute;n en sesiones') !!}
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <strong>{!! Form::selectRange('duracion', 1,10, $tratamientos->duracion,  ['class' => 'form-control']) !!}</strong>
        </div>
    </div>

</div>