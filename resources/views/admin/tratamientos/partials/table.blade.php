
<table class="table table-striped table-bordered table-hover">
    <tr class="info">
        <th class="text-center">Tratamiento</th>
        <th class="text-center">Valor</th>
        <th class="text-center">Duraci&oacute;n</th>
        <th class="text-center">Acciones</th>
    </tr>
    @foreach($tratamientos as $tratamiento)
        <tr data-id="{{ $tratamiento->id }}">
            <td class="text-center">{{ $tratamiento->nombre_tratamiento }}</td>
            <td class="text-center">$ {{ number_format($tratamiento->valor_tratamiento) }}</td>
            <td class="text-center">{{ $tratamiento->duracion}} Sesiones</td>
            <td class="text-center">
                <a href="{{ route('admin.tratamiento.edit', $tratamiento) }}" class="btn btn-success btn-xs" title="Editar tratamiento" target=""><span class="icon-pencil2"></span></a>

            </td>
        </tr>
    @endforeach
</table>

