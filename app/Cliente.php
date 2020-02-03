<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $guarded = [];

    protected $table = "TB_Cliente";
    
    protected $primaryKey = 'cd_Cliente';

    public function propostas()
    {
        return $this->hasMany(Proposta::class);
    }
}