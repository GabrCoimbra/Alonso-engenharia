<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
{
    protected $guarded = [];

    protected $table = "TB_Proposta";
    
    protected $primaryKey = 'cd_Proposta';

    
    const CREATED_AT = 'dt_Registro';
    const UPDATED_AT = 'dt_Modificacao';

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
