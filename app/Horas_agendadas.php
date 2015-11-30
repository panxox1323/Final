<?php

namespace Oral_Plus;

use Illuminate\Database\Eloquent\Model;

class Horas_agendadas extends Model
{
    protected $table    = 'horas_agendadas';

    protected $fillable = ['hora'];




    public function detalle_consulta()
    {
        return $this->hasMany('Oral_Plus\Detalle_consulta');
    }

    public function user()
    {
        return $this->belongsTo('Oral_Plus\Users', 'id_users', 'id');
    }

    public function hora()
    {
        return $this->belongsTo('Oral_Plus\Hora', 'id_horas', 'id');
    }

}
