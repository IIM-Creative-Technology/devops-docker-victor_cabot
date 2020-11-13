<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $fillable = [
        'name', 'nombre_de_joueurs'
    ];

    public function match(){
        return $this->hasMany('App\Match');
    }

}
