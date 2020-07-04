<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = [
        'nombre', 'val_nombre', 'empresa_id', 'rif', 'val_rif',
    ];


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
