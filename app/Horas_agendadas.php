<?php

namespace Oral_Plus;

use Illuminate\Database\Eloquent\Model;

class Horas_agendadas extends Model
{
    protected $table    = 'horas_agendadas';

    protected $fillable = ['id_especialista', 'id_usuario', 'id_horas', 'fecha', 'id_det_diagnostico'];




    public function detalle_diagnostico()
    {
        return $this->belongsTo('Oral_Plus\Detalle_diagnosticoo', 'id_det_diagnostico', 'id');
    }

    public function userUsuario()
    {
        return $this->belongsTo('Oral_Plus\User', 'id_usuario', 'id');
    }

    public function obtenerHora()
    {
        return $this->belongsTo('Oral_Plus\Hora', 'id_horas', 'id');
    }

    public function userEspecialista()
    {
        return $this->belongsTo('Oral_Plus\User', 'id_especialista', 'id');
    }


    public function scopeName($query, $name)
    {
        if (trim($name) != "") {

            $query->where('id_usuario', $name)->get();

        }
    }

}
