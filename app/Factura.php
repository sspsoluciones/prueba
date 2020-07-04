<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    //

    protected $fillable = [
    	'empresa_id', 'cliente_id', 'num_fact', 'num_control', 'transaccion', 'fecha_fact', 'monto', 'iva', 'exento', 'monto_total', 'cod_retencion', 'monto_retencion', 'fecha_apli_retencion',
    ];

    public function client(){
        return $this->belongsTo('App\Client');
        return $this->hasMany("App\Client");
    }


    public function provider(){
        return $this->belongsTo('App\Provider');
        return $this->hasMany("App\Provider");
    }




}
