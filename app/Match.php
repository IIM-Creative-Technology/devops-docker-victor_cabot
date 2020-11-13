<?php

namespace App;
use App\Equipe;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function equipeA(){
        return $this->hasOne('App\Equipe', 'id_equipeA');
     }
     public function equipeB(){
        return $this->hasOne('App\Equipe', 'id_equipeB');
     }
}
