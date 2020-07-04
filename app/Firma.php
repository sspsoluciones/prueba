<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
    //

	protected $fillable = [
        'nombre', 'slug', 'logo', 'rif',
    ];

    public function getRouteKeyName()
    {
    	return 'slug';
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

    public function scopeSlug($query, $slug){
        if($slug)
            return $query->where('slug', 'LIKE', "%$slug%");
    }




}
