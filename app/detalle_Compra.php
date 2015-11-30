<?php

namespace Oral_Plus;

use Illuminate\Database\Eloquent\Model;

class detalle_Compra extends Model
{
    //
    protected $table = 'detalle_compras';

    protected $fillable = ['id', 'id_factura', 'id_insumo', 'cantidad', 'precio'];


    public function factura()
    {
        return $this->belongsTo('Oral_Plus\Factura', 'id_factura', 'id');
    }


    public function insumo()
    {
        return $this->belongsTo('Oral_Plus\Insumo', 'id_insumo', 'id');
    }
}
