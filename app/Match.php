<?php

namespace App;
use App\Equipe;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable =   ['id_equipeA', 'id_equipeB'];
    public function equipeA(){
        return $this->belongsTo('App\Equipe', 'id_equipeA');
     }
     public function equipeB(){
        return $this->belongsTo('App\Equipe', 'id_equipeB');
     }
}
