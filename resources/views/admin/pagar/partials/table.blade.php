
<table class="table table-striped table-bordered table-hover">
    <tr class="info">
        <th class="text-center">D&iacute;a</th>
        <th class="text-center">Hora</th>
        <th class="text-center">Estado</th>
        <th class="text-center">Especialista</th>
        <th class="text-center">Valor</th>
    </tr>
    @foreach($consultas as $consulta)
        <tr data-id="{{ $consulta->id }}">
            <td class="text-center">{{ $consulta->fecha }}</td>
            <td class="text-center">{{ $consulta->hora }}</td>
            <td class="text-center">{{ $consulta->estado}}</td>
            <td class="text-center">{{ $consulta->user->first_name }} {!! $consulta->user->last_name !!}</td>
            <td class="text-center">${{ number_format($consulta->valor_consulta)  }}</td>
        </tr>
    @endforeach
</table>

