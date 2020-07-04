<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //

    protected $fillable = [
        'nombre', 'val_nombre', 'logo', 'rif', 'val_rif',
    ];

    public function firma(){
        return $this->belongsTo('App\Firma');
    }



    //scope
    public function scopeNombre($query, $nombre){
        if($nombre)
            return $query->where('nombre', 'LIKE', "%$nombre%");
    }

    public function scopeRIF($query, $rif){
        if($rif)
            return $query->where('rif', 'LIKE', "%$rif%");
    }



    
}
