
<table class="table table-striped table-bordered table-hover">
    <tr class="info">
        <th class="text-center">N° Diagnóstico</th>
        <th class="text-center">Paciente</th>
        <th class="text-center">Especialista</th>
        <th class="text-center">Fecha</th>
        <th class="text-center">Acciones</th>
    </tr>
    @foreach($diagnosticos as $diagnostico)
        <tr data-id="{{ $diagnostico->id }}">
            <td class="text-center">{{ $diagnostico->id }}</td>
            <td class="text-center">{{ $diagnostico->userUsuario->first_name }} {{ $diagnostico->userUsuario->last_name }}</td>
            <td class="text-center">{{ $diagnostico->userEspecialista->first_name }} {{ $diagnostico->userEspecialista->last_name }}</td>
            <td class="text-center">{{ $diagnostico->fecha }}</td>
            <td class="text-center">
                <a href="{{ route('admin.diagnostico.edit', $diagnostico) }}" class="btn btn-success btn-xs" title="Editar usuario" target=""><span class="icon-pencil2"></span></a>
            </td>
        </tr>
    @endforeach
</table>

