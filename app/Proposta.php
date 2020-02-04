<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
{
    protected $guarded = [];

    protected $table = "TB_Proposta";
    
    protected $primaryKey = 'cd_Proposta';

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
